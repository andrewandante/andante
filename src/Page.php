<?php

use SilverStripe\Blog\Model\Blog;
use SilverStripe\Blog\Model\BlogController;
use SilverStripe\Blog\Model\BlogPost;
use SilverStripe\Blog\Model\BlogPostController;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\CMS\Search\SearchForm;
use SilverStripe\Core\Config\Config;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\View\SSViewer;

class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class PageController extends ContentController {

	private static $allowed_actions = array (
	);

	protected function init() {
		parent::init();
//		$response = $this->postTweet("Testing2.", "https://www.atawalkingspeed.com/blog/by-way-of-introduction");
//		var_dump($response);
//		die();

		if ($this->nonDefaultTheme()) {
			SSViewer::set_themes([$this->nonDefaultTheme(), '$default']);
		}
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

	protected function nonDefaultTheme() {
		$theme = null;
		if (($this instanceof BlogController && $this->BlogTheme !== null) ||
			($this instanceof BlogPostController && $this->Parent()->BlogTheme !== null)) {
			$theme = Config::inst()->get(Blog::class, 'blog_themes')[$this->BlogTheme];
		}
		return $theme;
	}
}
