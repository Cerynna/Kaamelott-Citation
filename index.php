<?php
function sendMessage($parameters) {


}
header('Content-Type: application/json');
$json = '{
  "fulfillmentText": string,
  "fulfillmentMessages": [
    {
      object(Message)
    }
  ],
  "source": string,
  "payload": {
    object
  },
  "outputContexts": [
    {
      object(Context)
    }
  ],
  "followupEventInput": {
    object(EventInput)
  },
}';
echo $json;

