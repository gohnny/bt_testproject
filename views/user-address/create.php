<?php


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */

$this->title = 'Create User Address';
$this->params['breadcrumbs'][] = ['label' => 'User Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'addressForm' => $addressForm,
    ]) ?>

</div>
