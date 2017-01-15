<?php

class CommentExtension extends Extension {

	/**
	 * Post a comment form
	 * Remove the URL field
	 *
	 * @return Form
	 */
	public function CommentsForm()
	{
		$usePreview = $this->getOption('use_preview');

		$nameRequired = _t('CommentInterface.YOURNAME_MESSAGE_REQUIRED', 'Please enter your name');
		$emailRequired = _t('CommentInterface.EMAILADDRESS_MESSAGE_REQUIRED', 'Please enter your email address');
		$emailInvalid = _t('CommentInterface.EMAILADDRESS_MESSAGE_EMAIL', 'Please enter a valid email address');
		$commentRequired = _t('CommentInterface.COMMENT_MESSAGE_REQUIRED', 'Please enter your comment');

		$fields = new FieldList(
			$dataFields = new CompositeField(
			// Name
				TextField::create("Name", _t('CommentInterface.YOURNAME', 'Your name'))
					->setCustomValidationMessage($nameRequired)
					->setAttribute('data-msg-required', $nameRequired),

				// Email
				EmailField::create(
					"Email",
					_t('CommentingController.EMAILADDRESS', "Your email address (will not be published)")
				)
					->setCustomValidationMessage($emailRequired)
					->setAttribute('data-msg-required', $emailRequired)
					->setAttribute('data-msg-email', $emailInvalid)
					->setAttribute('data-rule-email', true),

				// Comment
				TextareaField::create("Comment", _t('CommentingController.COMMENTS', "Comments"))
					->setCustomValidationMessage($commentRequired)
					->setAttribute('data-msg-required', $commentRequired)
			),
			HiddenField::create("ParentID"),
			HiddenField::create("ReturnURL"),
			HiddenField::create("ParentCommentID"),
			HiddenField::create("BaseClass")
		);

		// Preview formatted comment. Makes most sense when shortcodes or
		// limited HTML is allowed. Populated by JS/Ajax.
		if ($usePreview) {
			$fields->insertAfter(
				ReadonlyField::create('PreviewComment', _t('CommentInterface.PREVIEWLABEL', 'Preview'))
					->setAttribute('style', 'display: none'), // enable through JS
				'Comment'
			);
		}

		$dataFields->addExtraClass('data-fields');

		// save actions
		$actions = new FieldList(
			new FormAction("doPostComment", _t('CommentInterface.POST', 'Post'))
		);
		if ($usePreview) {
			$actions->push(
				FormAction::create('doPreviewComment', _t('CommentInterface.PREVIEW', 'Preview'))
					->addExtraClass('action-minor')
					->setAttribute('style', 'display: none') // enable through JS
			);
		}

		// required fields for server side
		$required = new RequiredFields($this->config()->required_fields);

		// create the comment form
		$form = new Form($this, 'CommentsForm', $fields, $actions, $required);

		// if the record exists load the extra required data
		if ($record = $this->getOwnerRecord()) {

			// Load member data
			$member = Member::currentUser();
			if (($record->CommentsRequireLogin || $record->PostingRequiredPermission) && $member) {
				$fields = $form->Fields();

				$fields->removeByName('Name');
				$fields->removeByName('Email');
				$fields->insertBefore(new ReadonlyField("NameView", _t('CommentInterface.YOURNAME', 'Your name'), $member->getName()), 'Comment');
				$fields->push(new HiddenField("Name", "", $member->getName()));
				$fields->push(new HiddenField("Email", "", $member->Email));
			}

			// we do not want to read a new URL when the form has already been submitted
			// which in here, it hasn't been.
			$form->loadDataFrom(array(
				'ParentID'      => $record->ID,
				'ReturnURL'     => $this->request->getURL(),
				'BaseClass'     => $this->getBaseClass()
			));
		}

		// Set it so the user gets redirected back down to the form upon form fail
		$form->setRedirectToFormOnValidationError(true);

		// load any data from the cookies
		if ($data = Cookie::get('CommentsForm_UserData')) {
			$data = Convert::json2array($data);

			$form->loadDataFrom(array(
				"Name"        => isset($data['Name']) ? $data['Name'] : '',
				"Email"        => isset($data['Email']) ? $data['Email'] : ''
			));
			// allow previous value to fill if comment not stored in cookie (i.e. validation error)
			$prevComment = Cookie::get('CommentsForm_Comment');
			if ($prevComment && $prevComment != '') {
				$form->loadDataFrom(array("Comment" => $prevComment));
			}
		}

		if (!empty($member)) {
			$form->loadDataFrom($member);
		}

		// hook to allow further extensions to alter the comments form
		$this->extend('alterCommentForm', $form);

		return $form;
	}

}
