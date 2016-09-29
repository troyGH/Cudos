<?php
$from = "+14083598875";
$AccountSid = "MG3ce7a2d6cd47b0a4017082e14186c3f5";
$AuthToken = "390bad18e3057bccf1bdef9c73c4fb93";

require'twilio-php-master/Services/Twilio.php';

$client = new Services_Twilio($accountsid, $autotoken);

$people = array("+14084700974" => "Seung Joo");
foreach($people as $number => $name) {
    $sms = $client->account->sms_messages->create(
            $from,
            $number,
            "Hey $name, how's it going?"
            );
            echo "sent message to $name";
}
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

