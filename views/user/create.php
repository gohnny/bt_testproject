<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserRecord */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'User Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'userRegistrationForm' => $userRegistrationForm,
        'addressForm' => $addressForm
    ]) ?>

</div>
