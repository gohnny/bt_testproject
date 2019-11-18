<?php $this->beginPage();

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

?>
<html>
<head>
    <title>Test work</title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<?php
NavBar::begin([
    'brandLabel' => 'bintime-test',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top'
    ]
]);
$items = [
    ['label' => 'User list', 'url' => ['#']],
    ['label' => 'Add user', 'url' => ['#']],
    ['label' => 'User info', 'url' => ['#']],
];


echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $items
]);
NavBar::end();
?>
<div class="container" style="margin-top: 60px">
    <?= $content ?>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
