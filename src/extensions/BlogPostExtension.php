<?php

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class BlogPostExtension extends Extension {

	private static $db = [
		'TrackEmbedLink' => 'HTMLText',
		'TrackBlurb' => 'Text',
	];

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldsToTab('Root.Main', [
			TextField::create('TrackEmbedLink', 'Featured Track')
				->setDescription('Paste Spotify/SoundCloud Embed Link here'),
			TextareaField::create('TrackBlurb', 'Blurb about the track')
		], 'FeaturedImage');
	}

	public function getTags() {
		return $this->owner->Tags()->exclude('Title', 'feature');
	}
}
