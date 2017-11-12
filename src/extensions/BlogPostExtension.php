<?php

use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\CMS\Model\SiteTreeExtension;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\CheckboxField_Readonly;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\SSViewer;

class BlogPostExtension extends DataExtension {

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

	public function getBlogTheme() {
		return $this->owner->Parent()->BlogTheme;
	}

	public function onBeforePublish() {
		if (!$this->owner->HasBeenTweeted) {
			$service = new \SilverStripe\Twitter\Services\TwitterService();
			$tweet = $service->updateStatus($this->owner->Title . ": " . \SilverStripe\Control\Director::absoluteURL($this->owner->Link()));
			if ($tweet->id) {
				$this->owner->HasBeenTweeted = true;
			}
		}
	}

}
