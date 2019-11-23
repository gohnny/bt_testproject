<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */

$this->title = 'Update User Address: ' . $addressForm->id;
$this->params['breadcrumbs'][] = ['label' => 'User Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $addressForm->id, 'url' => ['view', 'id' => $addressForm->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'addressForm' => $addressForm,
    ]) ?>

</div>
