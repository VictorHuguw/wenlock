<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$this->registerCssFile("https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css");
$this->registerJsFile("https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js");

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body style="display: flex; flex-direction: row; height: 100vh;">
    <?php $this->beginBody() ?>

    <?php if (!Yii::$app->user->isGuest): ?>
        <nav id="sidebar" class="text-white p-3 vh-100" style="width: 250px; position: fixed; background-color: #0D1931;">
            <h1 class="text-center">WenLock.</h1>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white active d-flex align-items-center" href="/home">
                        <i class="fa-solid fa-house me-2"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active d-flex align-items-center" href="#" data-bs-toggle="collapse" data-bs-target="#accessControlSubmenu">
                        <i class="fa-solid fa-address-card me-2"></i> Controle de Acesso <span class="ms-2">&#9660;</span>
                    </a>
                    <div class="collapse" id="accessControlSubmenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link text-white active d-flex align-items-center" href="/user/list">
                                    <i class="fa-solid fa-users me-2"></i>Usuários
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>

            <div class="mt-auto">
                <?= Html::beginForm(['/site/logout']) .
                    Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->email . ')',
                        ['class' => 'btn btn-outline-light w-100 logout']
                    ) .
                    Html::endForm(); ?>
            </div>
        </nav>
    <?php endif; ?>

    <div class="flex-grow-1" style="<?= Yii::$app->user->isGuest ? '' : 'margin-left: 250px;' ?>">
        <main class="p-4">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </main>
    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>