<?php

use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\CMS\Search\SearchForm;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\TextField;

class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class PageController extends ContentController {

	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
	}

	/**
	 * @return \SilverStripe\ORM\DataList of BlogPost objects
	 */
	public function getBlogPosts() {
		return BlogPost::get();
	}

	public function SearchForm() {
		$fields = FieldList::create(
			TextField::create('Search', '')->setAttribute('placeholder', 'Search')
		);

		return SearchForm::create($this, 'Searchform', $fields);
	}

}
