<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'postcode')->textInput()->hint('5 digit')->label('Post code') ?>

    <?= $form->field($model, 'country')->textInput()->hint('example: UA ') ?>

    <?= $form->field($model, 'city')->textInput() ?>

    <?= $form->field($model, 'street')->textInput() ?>

    <?= $form->field($model, 'house_number')->textInput() ?>

    <?= $form->field($model, 'apart_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
