<?php

namespace Numbers\Communication\SMS\Controller;
class Templates extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Communication\SMS\Form\List2\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Communication\SMS\Form\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Communication\SMS\Form\Templates',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}