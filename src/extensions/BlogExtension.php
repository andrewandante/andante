<?php

use SilverStripe\Blog\Model\Blog;
use SilverStripe\CMS\Model\SiteTreeExtension;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataExtension;

class BlogExtension extends SiteTreeExtension {

	private static $blog_themes = [];

	private static $db = [
		'BlogTheme' => 'Varchar(64)',
	];

	public function updateSettingsFields($fields) {
		$fields->addFieldToTab('Root.Settings',
			DropdownField::create(
				'BlogTheme',
				'Blog theme',
				Config::inst()->get(Blog::class, 'blog_themes')
			)
		);

		return $fields;
	}
}
