<?php
/**
 * Created by PhpStorm.
 * User: cerynna
 * Date: 10/12/17
 * Time: 19:45
 */

$request = file_get_contents("php://input");
$messages=[];
// Building Card
array_push($messages, array(
        "type"=> "basic_card",
        "platform"=> "google",
        "title"=> "Card title",
        "subtitle"=> "card subtitle",
        "image"=>[
            "url"=>'http://image-url',
            "accessibility_text"=>'image-alt'
        ],
        "formattedText"=> 'Text for card',
        "buttons"=> [
            [
                "title"=> "Button title",
                "openUrlAction"=> [
                    "url"=> "http://url redirect for button"
                ]
            ]
        ]
    )
);
// Adding simple response (mandatory)
array_push($messages, array(
        "type"=> "simple_response",
        "platform"=> "google",
        "textToSpeech"=> "Here is speech and additional msg for card"
    )
);
$response=array(
    "source" => $request["result"]["source"],
    "speech" => "Speech for response",
    "messages" => $messages,
    "contextOut" => array()
);
json_encode($response);