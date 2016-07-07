<?php

namespace app\controllers;

use Yii;
use app\models\Ssusuario;
use app\models\SsusuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SsusuarioController implements the CRUD actions for Ssusuario model.
 */
class SsusuarioController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all Ssusuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SsusuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ssusuario model.
     * @param integer $idUsuario
     * @param integer $idUsuarioTipo
     * @return mixed
     */
    public function actionView($idUsuario, $idUsuarioTipo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUsuario, $idUsuarioTipo),
        ]);
    }

    /**
     * Creates a new Ssusuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ssusuario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUsuario' => $model->idUsuario, 'idUsuarioTipo' => $model->idUsuarioTipo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ssusuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idUsuario
     * @param integer $idUsuarioTipo
     * @return mixed
     */
    public function actionUpdate($idUsuario, $idUsuarioTipo)
    {
        $model = $this->findModel($idUsuario, $idUsuarioTipo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUsuario' => $model->idUsuario, 'idUsuarioTipo' => $model->idUsuarioTipo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ssusuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idUsuario
     * @param integer $idUsuarioTipo
     * @return mixed
     */
    public function actionDelete($idUsuario, $idUsuarioTipo)
    {
        $this->findModel($idUsuario, $idUsuarioTipo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ssusuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idUsuario
     * @param integer $idUsuarioTipo
     * @return Ssusuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUsuario, $idUsuarioTipo)
    {
        if (($model = Ssusuario::findOne(['idUsuario' => $idUsuario, 'idUsuarioTipo' => $idUsuarioTipo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
