<?php

use SilverStripe\Control\Director;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\i18n\i18n;

i18n::set_locale('en_GB');

//\SilverStripe\ORM\Search\FulltextSearchable::enable();

TinyMCEConfig::get('cms')
	->setOptions([
		'content_style' => '@import url("//fonts.googleapis.com/css?family=Nixie+One"); .typography .nixieone {font-family: \'Nixie One\', cursive;}',
		'font_formats' => 'Nixie One=Nixie One,cursive;',
	])
	->enablePlugins(['textcolor', 'colorpicker'])
	->addButtonsToLine(2, ['forecolor', 'backcolor', 'fontselect']);
