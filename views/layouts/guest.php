<?php

use yii\bootstrap5\Html;
use app\assets\AppAsset;
use yii\web\JqueryAsset;
use app\widgets\ToastrFlash;

AppAsset::register($this);
JqueryAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <main id="main" class="flex-shrink-0" role="main">
        <?= $content ?>
    </main>

    <?= ToastrFlash::widget() ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>