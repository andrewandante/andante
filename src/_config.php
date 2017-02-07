<?php

global $project;
use SilverStripe\Control\Director;
use SilverStripe\i18n\i18n;

$project = 'mysite';

global $database;
$database = '';

i18n::set_locale('en_US');

require_once('conf/ConfigureFromEnv.php');

\SilverStripe\ORM\Search\FulltextSearchable::enable();

if (Director::isLive()) {
	Director::forceSSL();
	Director::forceWWW();
}
global $databaseConfig;

