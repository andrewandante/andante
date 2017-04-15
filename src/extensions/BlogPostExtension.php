<?php

use SilverStripe\Core\Extension;
use SilverStripe\Forms\CheckboxField_Readonly;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\SSViewer;

class BlogPostExtension extends Extension {

	private static $db = [
		'TrackEmbedLink' => 'HTMLText',
		'TrackBlurb' => 'Text',
		'HasBeenTweeted' => 'Boolean',
	];

	private static $defaults = [
		'HasBeenTweeted' => false,
	];

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldsToTab('Root.Main', [
			CheckboxField_Readonly::create('HasBeenTweeted', 'Has this been tweeted about?'),
			TextField::create('TrackEmbedLink', 'Featured Track')
				->setDescription('Paste Spotify/SoundCloud Embed Link here'),
			TextareaField::create('TrackBlurb', 'Blurb about the track')
		], 'FeaturedImage');
	}

	public function getTags() {
		return $this->owner->Tags()->exclude('Title', 'feature');
	}

	public function onBeforePublish() {
		$this->owner->onBeforePublish();
		if (!empty(SiteConfig::current_site_config()->TwitterUsername)
			&& !empty(SiteConfig::current_site_config()->TwitterAppAccessToken)
			&& !$this->owner->HasBeenTweeted
		) {
			$service = new \SilverStripe\Twitter\Services\TwitterService();
			$tweet = $service->updateStatus($this->owner->Title . " " . $this->owner->Link());
			if ($tweet->id) {
				$this->owner->HasBeenTweeted = true;
			}
		}
	}

	public function getBlogTheme() {
		return $this->owner->Parent()->BlogTheme;
	}

}
