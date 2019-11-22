<?php

namespace app\controllers;

use app\models\AddressForm;
use app\models\UserRegistrationForm;
use Yii;
use app\models\UserRecord;
use app\models\UserAddress;
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
        $dataProvider = new ActiveDataProvider([
            'query' => UserAddress::find()->andWhere(['user_id' => $id]),
            'pagination' => [
                'pageSize' => 5,
            ]
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
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
        $addressForm = new AddressForm();

        if ($userRegistrationForm->load(Yii::$app->request->post()) && $addressForm->load(Yii::$app->request->post()))
            if ($userRegistrationForm->validate() && $addressForm->validate()) {
                $userRecord = new UserRecord();
                $userAddress = new UserAddress();
                $userRecord->setUserRegistrationForm($userRegistrationForm);
                $userRecord->save();
                $userAddress->setUserAddress($addressForm, $userRecord);
                $userAddress->save();

                return $this->redirect(['view', 'id' => $userRecord->id]);
            }

        return $this->render('create', [
            'userRegistrationForm' => $userRegistrationForm,
            'addressForm' => $addressForm
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
        $userRecord = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $userRecord->delete();
        }
        return $this->redirect(['user/index']);
    }
}
