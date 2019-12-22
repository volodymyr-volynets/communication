<?php

namespace Numbers\Communication\Mail\Controller;
class Signatures extends \Object\Controller\Permission {
	public function actionIndex() {
		$form = new \Numbers\Communication\Mail\Form\List2\Signatures([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionEdit() {
		$form = new \Numbers\Communication\Mail\Form\Signatures([
			'input' => \Request::input()
		]);
		echo $form->render();
	}
	public function actionImport() {
		$form = new \Object\Form\Wrapper\Import([
			'model' => '\Numbers\Communication\Mail\Form\Signatures',
			'input' => \Request::input()
		]);
		echo $form->render();
	}
}