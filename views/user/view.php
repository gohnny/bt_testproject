<?php

use yii\helpers\Url;
use yii\web\UrlManager;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserRecord */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-record-view">

    <h1><?= Html::encode($this->title . ' ' . $model->surename) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'login',
            'name',
            'surename',
            'gender',
            'create_date:datetime',
            'email:email',
        ],
    ]) ?>

</div>
<div class="user-address-view">
    <h1><?= Html::encode($this->title . ' ' . $model->surename) . ' address delivery' ?></h1>

    <p>
        <?= Html::a('Create address', ['user-address/create', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'postcode',
            'country',
            'city:ntext',
            'street:ntext',
            'house_number',
            'apart_number',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to(['user-address/' . $action, 'id' => $model->id, 'user_id' => $model->user_id]);
                }
            ],
        ],
    ]); ?>
</div>