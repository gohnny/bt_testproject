<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-record-form">
    <h1><?= Html::encode('User information') ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <!--    --><? //= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($userRegistrationForm, 'login') ?>

    <?= $form->field($userRegistrationForm, 'password')->passwordInput() ?>

    <?= $form->field($userRegistrationForm, 'name')->textInput() ?>

    <?= $form->field($userRegistrationForm, 'surename')->textInput() ?>

    <?= $form->field($userRegistrationForm, 'gender')->dropDownList(['no information' => 'no information', 'male' => 'male', 'female' => 'female']) ?>

    <?= $form->field($userRegistrationForm, 'email') ?>

</div>

<h1><?= Html::encode('User delivery address') ?></h1>
<div class="user-address-form">


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
