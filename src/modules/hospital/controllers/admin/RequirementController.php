<?php

namespace app\modules\hospital\controllers\admin;

use app\modules\hospital\models\Hospital;
use app\modules\hospital\models\Requirement;
use app\modules\hospital\models\RequirementSearch;
use nullref\core\interfaces\IAdminController;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * RequirementController implements the CRUD actions for Requirement model.
 */
class RequirementController extends Controller implements IAdminController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
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
     * Displays a single Requirement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Requirement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Requirement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Requirement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Requirement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param null $hospital_id
     * @return string|\yii\web\Response
     */
    public function actionCreate($hospital_id = null)
    {
        $model = new Requirement([
            'hospital_id' => $hospital_id,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Requirement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Requirement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
