<?php

class HomePage extends Page {

}

class HomePage_Controller extends Page_Controller {

	/**
	 * @return DataList of BlogPost objects
	 */
	public function getBlogPosts() {
		return $posts = BlogPost::get();
	}

	/**
	 * @return Blog
	 */
	public function getFeaturePost() {
		if ($this->getBlogPosts()->filter('Tags.Title', 'feature')->count() > 0) {
			return $this->getBlogPosts()->filter('Tags.Title', 'feature')->sort('PublishDate', 'DESC')->first();
		} else {
			return $this->getMostRecentPost();
		}
	}

	/**
	 * @return Blog
	 */
	public function getMostRecentPost() {
		return $this->getBlogPosts()->sort('PublishDate', 'DESC')->first();
	}
}
