<?php

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class BlogPostExtension extends Extension {

	private static $db = [
		'SpotifyTrackURL' => 'Varchar(128)'
	];

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldsToTab('Root.Main', [
			TextField::create('SpotifyTrackURL', 'Featured Track')
				->setDescription('Paste Spotify URL here')
		], 'FeaturedImage');
	}

	public function getTags() {
		return $this->owner->Tags()->exclude('Title', 'feature');
	}
}
