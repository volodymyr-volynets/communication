<?php

namespace Numbers\Communication\Campaigns\Controller\Advertising;
class Codes extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Communication\Campaigns\Form\List2\Advertising\Codes([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Communication\Campaigns\Form\Advertising\Codes([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Communication\Campaigns\Form\Advertising\Codes',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}