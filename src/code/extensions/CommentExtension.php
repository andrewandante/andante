<?php

use SilverStripe\Control\Cookie;
use SilverStripe\Core\Convert;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\ReadonlyField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Member;

class CommentExtension extends Extension {

	/**
	 * Update the comment form
	 * Remove the URL field
	 * @param Form $form
	 * @return Form
	 */
	public function alterCommentForm($form)
	{
		$form->Fields()->removeByName('URL');

		return $form;
	}

}
