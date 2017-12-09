POST https://my-service.com/action

Headers:
//user defined headers
Content-type: application/json

POST body:

{
"lang": "en",
"status": {
"errorType": "success",
"code": 200
},
"timestamp": "2017-02-09T16:06:01.908Z",
"sessionId": "1486656220806",
"result": {
"parameters": {
"city": "Rome",
"name": "Ana"
},
"contexts": [],
"resolvedQuery": "my name is Ana and I live in Rome",
"source": "agent",
"score": 1.0,
"speech": "",
"fulfillment": {
"messages": [
{
"speech": "Hi Ana! Nice to meet you!",
"type": 0
}
],
"speech": "Hi Ana! Nice to meet you!"
},
"actionIncomplete": false,
"action": "greetings",
"metadata": {
"intentId": "9f41ef7c-82fa-42a7-9a30-49a93e2c14d0",
"webhookForSlotFillingUsed": "false",
"intentName": "greetings",
"webhookUsed": "true"
}
},
"id": "ab30d214-f4bb-4cdd-ae36-31caac7a6693",
"originalRequest": {
"source": "google",
"data": {
"inputs": [
{
"raw_inputs": [
{
"query": "my name is Ana and I live in Rome",
"input_type": 2
}
],
"intent": "assistant.intent.action.TEXT",
"arguments": [
{
"text_value": "my name is Ana and I live in Rome",
"raw_text": "my name is Ana and I live in Rome",
"name": "text"
}
]
}
],
"user": {
"user_id": "PuQndWs1OMjUYwVJMYqwJv0/KT8satJHAUQGiGPDQ7A="
},
"conversation": {
"conversation_id": "1486656220806",
"type": 2,
"conversation_token": "[]"
}
}
}
}
