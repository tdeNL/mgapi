<?php
/**
This Example shows how to smsCampaignBounces using the MGAPI.php class and do some basic error checking.
**/
require_once 'inc/MGAPI.class.php';
require_once 'inc/config.inc.php'; //contains apikey

$api = new MGAPI($apikey);

$cid = $smsCampaignId;
$start = 0;
$limit = 25;

$retval = $api->smsCampaignBounces($cid, $start, $limit);

header("Content-Type: text/plain");
if ($api->errorCode){
	echo "Unable to load smsCampaignBounces()!";
	echo "\tCode=".$api->errorCode."\n";
	echo "\tMsg=".$api->errorMessage."\n";
} else {
	echo "SMS not delivered: ". sizeof($retval). "\n";
	foreach($retval as $msg){
        echo $msg['phone']."\n";
        echo $msg['reason']."\n\n";
    }
}