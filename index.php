<?php
require("/direct/path/to/twilio-php/library/hosted/on/your/site/Twilio.php"); // Edit this.
$account_sid = '[account id]'; // And this.
$auth_token = '[auth token]';  // And this.
$client = new Services_Twilio($account_sid, $auth_token); 
$myphone = '+18475551212'; // Change this to your Twilio phone number.
$phonenumbers = array( // Add all the numbers you want to call here, comma-delimited, in this format.
'+18475551212', // Joe Smith
'+13125551212' // Jane Adams
);

foreach ($phonenumbers as $theirphone) {
	try {
		$call = $client->account->calls->create( $myphone, $theirphone, '[URL to Porch Hangs XML]', array('ifmachine'=>'continue')); // Change this URL to the XML file pertaining to your announcement message.
		echo 'Started call: ' . $call->sid . ' for phone number ' . $theirphone;
		sleep(1);
	} catch (Exception $e) {
		echo 'Error: ' . $e->getMessage();
	}
	echo "<br>";
}
?>