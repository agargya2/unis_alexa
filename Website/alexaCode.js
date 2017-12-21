var http = require('http');

exports.handler = (event, context) => {
	try{
		// New Session
		if(event.session.new){
			console.log(`NEW SESSION`);
		}
		
		switch(event.request.type){
			//Launch Request
			case "LaunchRequest":
				console.log(`LAUNCH REQUEST`);
				context.succeed(
					generateResponse(
						buildSpeechletResponse("Welcome to Uni's Homework Planner", true), {}
		            )
				);
				break;
			//Intent Request
			case "IntentRequest":
				console.log(`INTENT REQUEST`);
				    switch(event.request.intent.name){
				        //First Intent
				        case "SignUp":
				            
				            context.succeed(
                                generateResponse(
                                    buildSpeechletResponseWithCard("To sign up, log in to the planner website, and click on the code button. It will display a number and tell me that number.", false), {}
                                )
                            );
				            
                            break;
                        
                        case "AMAZON.HelpIntent":
                            context.succeed(
                                generateResponse(
                                    buildSpeechletResponseWithCard("You can sign up by linking your account if you have not done so, or you can ask me what today's homework is.", false), {}
                                )
                            );
                            break;
                        
                        case "AMAZON.StopIntent":
                            context.succeed(
                                generateResponse(
                                    buildSpeechletResponseWithCard("Ok", true), {}
                                )
                            );
                            break;
                            
                        case "GiveUserId":
                            var IdGiven = event.request.intent.slots.UserId.value;
                            
                            var endpoint = "http://m.uploadedit.com/bbtc/1507044853235.txt";
                            var body = "";
                            http.get(endpoint, (response) => {
                                response.on('data', (chunk) => { body += chunk });
                                response.on('end', () => {
                                    var data = JSON.parse(body);
                                    
                                    context.succeed(
                                        generateResponse(
                                            buildSpeechletResponseWithCard(response, true, "Soccer Game", response), {}
                                        )
                                    );
                                });
                            });
                            break;
                            
                        case "GetHomework":
                            var endpoint = "http://graph.ifp.uiuc.edu/~parigarg/Programming/homework/resultsOfSearch.php?idRequested=1";
                            var body = "";
                            
                            http.get(endpoint, (response) => {
                                response.on('data', (chunk) => { body += chunk });
                                response.on('end', () => {
                                    var data = JSON.parse(body);
                                    var response = "Your home work is ";
                                    
                                    for(var i = 0; i < data.length; i++){
                                        if(i + 1 === data.length){
                                            response += "and "+ data[i];
                                        } else{
                                            response += data[i] + ", ";
                                        }
                                    }
                                    
                                    context.succeed(
                                        generateResponse(
                                            buildSpeechletResponseWithCard(response, true, "Soccer Game", response), {}
                                        )
                                    );
                                });
                            });
                            break;
                            
				        default:
				            context.succeed(
				            	generateResponse(
						               buildSpeechletResponse("I did not understand. Could you please repeat that?", false), {}
					            )
				            );
				            break;
				    }
				break;
			//Session Ended Request
			case "SessionEndedRequest":
				console.log(`SESSION ENDED REQUEST`);
				context.succeed(
					generateResponse(
						buildSpeechletResponse("Goodbye", true), {}
		            )
				);
				break;
			default:
				context.fail(`INVALID REQUEST TYPE: ${event.request.type}`);

		}
	}catch(error) {context.fail(`Exception: ${error}`)}
};

buildSpeechletResponse = (outputText, shouldEndSession) => {

  return {
    outputSpeech: {
      type: "PlainText",
      text: outputText
    },
    shouldEndSession: shouldEndSession
  };

};

buildSpeechletResponseWithCard = (outputText, shouldEndSession, title, text) => {

  return {
    outputSpeech: {
      type: "PlainText",
      text: outputText
    },
    shouldEndSession: shouldEndSession,
    card : {
        type : "Simple",
        title: title,
        content: text
    }
  };

};

generateResponse = (speechletResponse, sessionAttributes) => {

  return {
    version: "1.0",
    sessionAttributes: sessionAttributes,
    response: speechletResponse
  };
  
};