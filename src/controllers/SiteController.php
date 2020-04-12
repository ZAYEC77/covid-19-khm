<?php

namespace app\controllers;

use app\models\RequirementSearch;
use app\models\SupplierSearch;
use app\modules\hospital\models\Hospital;
use app\modules\hr\enums\Status;
use app\modules\hr\models\Benefactor;
use app\modules\hr\models\Doctor;
use app\modules\hr\models\Supplier;
use app\modules\hr\models\Volunteer;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @param null $hospital_id
     * @return string
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function actionIndex($hospital_id = null)
    {
        $searchModel = new RequirementSearch();
        $params = Yii::$app->request->queryParams;

        $hospital = null;
        if ($hospital_id !== null && $hospital = Hospital::findOne($hospital_id)) {
            $params[$searchModel->formName()]['hospital_id'] = $hospital_id;
        }

        $dataProvider = $searchModel->search($params);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'hospital' => $hospital,
        ]);
    }

    /**
     * @return string
     */
    public function actionJoin()
    {
        return $this->render('join');
    }

    /**
     * @return string
     */
    public function actionInfo()
    {
        return $this->render('info');
    }

    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionSuppliers()
    {
        $searchModel = new SupplierSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('suppliers', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionRegisterSupplier()
    {
        $model = new Supplier([
            'status' => Status::ON_MODERATION,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('info', Yii::t('app', 'Your request has been processed successfully'));
            return $this->redirect('register-supplier');
        }

        return $this->render('register-supplier', [
            'model' => $model,
        ]);
    }

    /**
     * @return string
     */
    public function actionRegisterDoctor()
    {
        $model = new Doctor([
            'status' => Status::ON_MODERATION,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('info', Yii::t('app', 'Your request has been processed successfully'));
            return $this->redirect('register-doctor');
        }

        return $this->render('register-doctor', [
            'model' => $model,
        ]);
    }

    /**
     * @return string
     */
    public function actionRegisterVolunteer()
    {
        $model = new Volunteer([
            'status' => Status::ON_MODERATION,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('info', Yii::t('app', 'Your request has been processed successfully'));
            return $this->redirect('register-volunteer');
        }

        return $this->render('register-volunteer', [
            'model' => $model,
        ]);
    }

    /**
     * @return string
     */
    public function actionRegisterBenefactor()
    {
        $model = new Benefactor([
            'status' => Status::ON_MODERATION,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('info', Yii::t('app', 'Your request has been processed successfully'));
            return $this->redirect('register-benefactor');
        }

        return $this->render('register-benefactor', [
            'model' => $model,
        ]);
    }
}
