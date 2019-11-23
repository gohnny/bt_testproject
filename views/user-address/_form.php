<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserAddress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-address-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($addressForm, 'postcode')->textInput()->hint('5 digit')->label('Post code') ?>

    <?= $form->field($addressForm, 'country')->textInput()->hint('example: UA ') ?>

    <?= $form->field($addressForm, 'city')->textInput() ?>

    <?= $form->field($addressForm, 'street')->textInput() ?>

    <?= $form->field($addressForm, 'house_number')->textInput() ?>

    <?= $form->field($addressForm, 'apart_number')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
