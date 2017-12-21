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
                        buildSpeechletResponse("Ask me what games we have this week, or what we have on certain day.", false), {}
                    )
                );
                break;
            //Intent Request
            case "IntentRequest":
                console.log(`INTENT REQUEST`);
                    switch(event.request.intent.name){
                        case "AMAZON.StopIntent":
                            context.succeed(
                                generateResponse(
                                    buildSpeechletResponse("Ok", true), {}
                                )
                            );
                            break;
                        
                        case "AMAZON.HelpIntent":
                            context.succeed(
                                generateResponse(
                                    buildSpeechletResponse("You can ask me if we have a game on a certain day. Phrase it like this, what do I have on date. You can also ask me what we have the entire week. Just ask me what do I have this week.", false), {}
                                )
                            );
                            
                            break;
                        
                        case "GetWeeklySchedule":
                            
                            //today's date from request
                            var todayString = event.request.timestamp.substr(0, 10);

                            //date object for today
                            var today = new Date(todayString);
                            
                            //milliseconds from 1970 to today
                            var millisecondsOfToday = today.getTime();
                            
                            var endpoint = "http://m.uploadedit.com/bbtc/1507044853235.txt";
                            var body = "";
                            
                            var gamesThisWeek = [];
                            http.get(endpoint, (response) => {
                                response.on('data', (chunk) => { body += chunk });
                                response.on('end', () => {
                                    var data = JSON.parse(body);
                                    
                                    for(var i = 0; i < data.games.length; i++){
                                        //date object for game
                                        var dateOfGame = new Date(data.games[i].date);
                                        
                                        //milliseconds from 1970 to game
                                        var millisecondsOfGame = dateOfGame.getTime();
                                        
                                        if((millisecondsOfGame - millisecondsOfToday)/86400000 < 7 && (millisecondsOfGame - millisecondsOfToday)/86400000 >= 0){
                                            if(dateOfGame.getDay() >= today.getDay()){
                                                gamesThisWeek.push(i);
                                            }
                                        }
                                    }
                                    
                                    console.log(gamesThisWeek);
                                    
                                    var response = "";
                                    
                                    for(var j = 0; j < gamesThisWeek.length; j++){
                                        var requestedGame = data.games[gamesThisWeek[j]];
                                        response += "On " + requestedGame.day + ", ";
                                        
                                        if(requestedGame.teams === "both"){
                                            response += "there is a jv and varsity game against " + requestedGame.opponent;
                                        } else if(requestedGame.teams === "varsity"){
                                            response += "there is a varsity game against " + requestedGame.opponent;
                                        } else {
                                            response += "there is a jv game against " + requestedGame.opponent;
                                        }
                                        
                                        if(requestedGame.location === requestedGame.opponent){
                                            response += " at their field";
                                        } else if(requestedGame.location === "Home") {
                                            response += "at Home";
                                        } else{
                                            response += " at " + requestedGame.location;
                                        }
                                        
                                        if(requestedGame.teams === "both"){
                                            response += ". " + requestedGame.first + " will go first. ";
                                        } else{
                                            response += ". ";
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
                           
                        case "GetScheduleOfDate":
                            //requested date
                            var date = event.request.intent.slots.ofDate.value;
                            
                            var endpoint = "http://m.uploadedit.com/bbtc/1507044853235.txt";
                            var body = "";
                            http.get(endpoint, (response) => {
                                response.on('data', (chunk) => { body += chunk });
                                response.on('end', () => {
                                    var gameNumber = false;
                                    var data = JSON.parse(body);
                                    for(var i = 0; i < data.games.length; i++){
                                        if(data.games[i].date === date){
                                            gameNumber = i;
                                        }
                                    }
                                    if(gameNumber === false){
                                        context.succeed(
                                            generateResponse(
                                                buildSpeechletResponse("You don't have a game, but you have practice at Florida and Lincoln.", true), {}
                                            )
                                        );
                                    } else{
                                        var requestedGame = data.games[gameNumber];
                                        var response = "On " + requestedGame.day + ", ";
                                        
                                        if(requestedGame.teams === "both"){
                                            response += "there is a jv and varsity game against " + requestedGame.opponent;
                                        } else if(requestedGame.teams === "varsity"){
                                            response += "there is a varsity game against " + requestedGame.opponent;
                                        } else {
                                            response += "there is a jv game against " + requestedGame.opponent;
                                        }
                                        
                                        if(requestedGame.location === requestedGame.opponent){
                                            response += " at their field";
                                        } else if(requestedGame.location === "Home") {
                                            response += "at Home";
                                        } else{
                                            response += " at " + requestedGame.location;
                                        }
                                        
                                        response += ". " + requestedGame.first + " will go first.";
                                        
                                        context.succeed(
                                                generateResponse(
                                                    buildSpeechletResponseWithCard(response, true, "Soccer Game", response), {}
                                            )
                                        );
                                    }
                                });
                            });
                           break;
                           
                        default:
                            context.succeed(
                                generateResponse(
                                       buildSpeechletResponse("I did not understand.", true), {}
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