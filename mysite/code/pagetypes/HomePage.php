<?php

use SilverStripe\Blog\Model\BlogPost;


class HomePage extends Page {

}

class HomePageController extends PageController {

	/**
	 * @return \SilverStripe\ORM\DataList of BlogPost objects
	 */
	public function getBlogPosts() {
		return BlogPost::get();
	}

	/**
	 * @return \SilverStripe\Blog\Model\Blog
	 */
	public function getFeaturePost() {
		if ($this->getBlogPosts()->filter('Tags.Title', 'feature')->count() > 0) {
			return $this->getBlogPosts()->filter('Tags.Title', 'feature')->sort('PublishDate', 'DESC')->first();
		} else {
			return $this->getMostRecentPost();
		}
	}

	/**
	 * @return \SilverStripe\Blog\Model\Blog
	 */
	public function getMostRecentPost() {
		return $this->getBlogPosts()->sort('PublishDate', 'DESC')->first();
	}
}
