<?php

namespace app\modules\admin\controllers;

use nullref\fulladmin\controllers\MainController as BaseMainController;

/**
 *
 */
class MainController extends BaseMainController
{
    public $viewPath = '@app/modules/admin/views/main';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
