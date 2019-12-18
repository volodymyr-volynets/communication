<?php

namespace Numbers\Communication\Mail\Controller;
class Templates extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Communication\Mail\Form\List2\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Communication\Mail\Form\Templates([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Communication\Mail\Form\Templates',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}