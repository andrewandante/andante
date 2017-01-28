<?php

use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\CMS\Controllers\ContentController;

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

}
