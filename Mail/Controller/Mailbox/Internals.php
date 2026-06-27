<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Communication\Mail\Controller\Mailbox;

use Object\Controller\Permission;
use Object\Form\Wrapper\Import;

class Internals extends Permission
{
    public function actionIndex()
    {
        $form = new \Numbers\Communication\Mail\Form\List2\Mailbox\Internals([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionEdit()
    {
        $form = new \Numbers\Communication\Mail\Form\Mailbox\Internals([
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
    public function actionImport()
    {
        $form = new Import([
            'model' => '\Numbers\Communication\Mail\Form\Mailbox\Internals',
            'input' => \Request::input()
        ]);
        echo $form->render();
    }
}
