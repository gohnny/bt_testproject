<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'user_id',
            'postcode',
            'country',
            'city:ntext',
            'street:ntext',
            'house_number',
            'apart_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
