<?php

global $project;
$project = 'mysite';

global $database;
$database = '';

require_once('conf/ConfigureFromEnv.php');

\SilverStripe\ORM\Search\FulltextSearchable::enable();
