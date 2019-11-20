<?php

namespace app\controllers;

use app\models\UserRegistrationForm;
use Yii;
use app\models\UserRecord;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * UserController implements the CRUD actions for UserRecord model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all UserRecord models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserRecord::find(),
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserRecord model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the UserRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($userRecord = UserRecord::findOne($id)) !== null) {
            return $userRecord;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new UserRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $userRegistrationForm = new UserRegistrationForm();

        if ($userRegistrationForm->load(Yii::$app->request->post()))
            if ($userRegistrationForm->validate()) {
                $userRecord = new UserRecord();
                $userRecord->setUserRegistrationForm($userRegistrationForm);
                $userRecord->save();
                return $this->redirect(['view', 'id' => $userRecord->id]);
            }

        return $this->render('create', [
            'userRegistrationForm' => $userRegistrationForm,
        ]);
    }

    /**
     * Updates an existing UserRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $userRegistrationForm = $this->findModel($id);
        if ($userRegistrationForm->load(Yii::$app->request->post()))
            if ($userRegistrationForm->validate()) {
                $userRegistrationForm->save();
                return $this->redirect(['view', 'id' => $userRegistrationForm->id]);
            }


        return $this->render('update', ['userRegistrationForm' => $userRegistrationForm]);
    }

    /**
     * Deletes an existing UserRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
