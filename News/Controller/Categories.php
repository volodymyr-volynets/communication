<?php

namespace Numbers\Communication\News\Controller;
class Categories extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Communication\News\Form\List2\Categories([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Communication\News\Form\Categories([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Communication\News\Form\Categories',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}