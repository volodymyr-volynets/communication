<?php

namespace Numbers\Communication\News\Controller;
class News extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Communication\News\Form\List2\News([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Communication\News\Form\Collection\News\Collection([
			'input' => \Request::input(null, true, false, [
				'skip_xss_on_keys' => ['ns_nwslngcon_content'],
				'trim_empty_html_input' => true,
				'remove_script_tag' => true
			])
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Communication\News\Form\News',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}