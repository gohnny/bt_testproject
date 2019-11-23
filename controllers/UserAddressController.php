<?php

namespace app\controllers;

use app\models\AddressForm;
use Yii;
use app\models\UserRecord;
use app\models\UserAddress;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserAddressController implements the CRUD actions for UserAddress model.
 */
class UserAddressController extends Controller
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
     * Lists all UserAddress models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => UserAddress::find(),
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserAddress model.
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
     * Finds the UserAddress model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserAddress the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserAddress::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new UserAddress model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $addressForm = new AddressForm();
        $userRecord = UserRecord::findOne($id);
        if ($addressForm->load(Yii::$app->request->post()))
            if ($addressForm->validate()) {
                $userAddress = new UserAddress();
                $userAddress->addUserAddress($addressForm, $userRecord);
                $userAddress->save();
                return $this->redirect(['user/view', 'id' => $userRecord->id]);
            }

        return $this->render('create', [
            'addressForm' => $addressForm,

        ]);
    }

    /**
     * Updates an existing UserAddress model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $addressForm = $this->findModel($id);

        if ($addressForm->load(Yii::$app->request->post()))
            if ($addressForm->validate()) {
                $addressForm->save();
                return $this->redirect(['user/view', 'id' => $addressForm->user_id]);
        }

        return $this->render('update', [
            'addressForm' => $addressForm,
        ]);
    }

    /**
     * Deletes an existing UserAddress model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id, $user_id)
    {
        $userAddress = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $userAddress->delete();
        }

        return $this->redirect(['user/view', 'id' => $user_id]);
    }
}
