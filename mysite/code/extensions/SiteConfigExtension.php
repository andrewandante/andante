<?php

class SiteConfigExtension extends Extension {

	private static $db = [
		'TwitterURL' => 'Varchar(255)',
		'FacebookURL' => 'Varchar(255)',
		'InstagramURL' => 'Varchar(255)',
	];

	private static $has_one = [
		'SiteLogo' => 'Image',
		'SiteBanner' => 'Image'
	];

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldsToTab('Root.Main', [
			UploadField::create('SiteLogo', 'Site Logo')
				->setFolderName('Uploads/site-logos'),
			UploadField::create('SiteBanner', 'Site Banner')
				->setFolderName('Uploads/site-banners'),
		]);
		$fields->addFieldsToTab('Root.SocialMedia', [
			TextField::create('TwitterURL', 'URL for Twitter'),
			TextField::create('FacebookURL', 'URL for Facebook'),
			TextField::create('InstagramURL', 'URL for Instagram'),
		]);
	}
}
