<?php

global $project;
use SilverStripe\Control\Director;

$project = 'mysite';

global $database;
$database = '';

require_once('conf/ConfigureFromEnv.php');

\SilverStripe\ORM\Search\FulltextSearchable::enable();

if (Director::isLive()) {
	Director::forceSSL();
	Director::forceWWW();
}
