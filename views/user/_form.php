<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--    --><? //= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($userRegistrationForm, 'login') ?>

    <?= $form->field($userRegistrationForm, 'password')->passwordInput() ?>

    <?= $form->field($userRegistrationForm, 'name')->textInput() ?>

    <?= $form->field($userRegistrationForm, 'surename')->textInput() ?>

    <?= $form->field($userRegistrationForm, 'gender')->dropDownList(['no information' => 'no information', 'male' => 'male', 'female' => 'female']) ?>

    <?= $form->field($userRegistrationForm, 'create_date') ?>

    <?= $form->field($userRegistrationForm, 'email') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
