<?php

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
		return $this->owner->Tags()->filter('Title:not', 'feature');
	}
}
