<?php
require "/inc/Services/Twilio.php";

//session_start();

$AccountSid = "ACaee908cf13d0dfd00c9792ceaa509e61";
$AuthToken = "390bad18e3057bccf1bdef9c73c4fb93";

$client = new Services_Twilio($AccountSid, $AuthToken);

try{
$client->account->messages->create(
	array("From" => "408-359-8875",
		"To" => "408-470-0974",
		"Body" => "Test Message ",)  );

} catch (Services_Twilio_RestException $e) {
    echo $e->getMessage();
}
echo "works";

?>