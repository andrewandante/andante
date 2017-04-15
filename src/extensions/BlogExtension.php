<?php

use SilverStripe\Blog\Model\Blog;
use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\DropdownField;

class BlogExtension extends Extension {

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
