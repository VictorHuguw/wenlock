<?php

use app\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use app\widgets\ToastrFlash;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<style>
    body {
        background-color: #F3F3F3;
    }
</style>

<body style="display: flex; flex-direction: row; height: 100vh;">
    <?php $this->beginBody() ?>

    <?php if (!Yii::$app->user->isGuest): ?>
        <nav id="sidebar" class="d-flex flex-column text-white p-3" style="width: 30vh; background-color: #0D1931; height: 100vh;">
            <h1 style="font-size: 50px;margin-left:40px"><b style="color: #00b4c0;">Wen</b><span style="color: white">Lock</span><span style="color: #00b4c0;font-size:80px">.</span></h1>

            <div class="menu-items flex-grow-1">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white active d-flex align-items-center mt-4" href="<?= Url::to(['/home']) ?>" style="font-size: 20px;">
                            <i class="fa-solid fa-house me-2"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active d-flex align-items-center mt-2" href="#" data-bs-toggle="collapse" data-bs-target="#accessControlSubmenu" style="font-size: 20px;">
                            <i class="fa-solid fa-address-card me-2"></i> Controle de Acesso <span class="ms-2">&#9660;</span>
                        </a>
                        <div class="collapse" id="accessControlSubmenu">
                            <ul class="nav flex-column ms-3">
                                <li class="nav-item">
                                    <a class="nav-link text-white active d-flex align-items-center" href="<?= Url::to(['/user/index']) ?>" style="font-size: 20px;">
                                        <i class="fa-solid fa-users me-2"></i>Usuários
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div></div>
            </div>
            
            <hr>
            <div class="mt-auto">
                <?= Html::beginForm(['/site/logout']) .
                    Html::submitButton(
                        'Sair (' . Yii::$app->user->identity->email . ')',
                        ['class' => 'btn btn-outline-light w-100 logout']
                    ) .
                    Html::endForm(); ?>
            </div>
        </nav>
    <?php endif; ?>

    <div class="flex-grow-1">
        <main class="p-4">
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= $content ?>
        </main>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="userOffcanvas" aria-labelledby="userOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="userOffcanvasLabel">Detalhes do Usuário</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex align-items-center mb-3 mt-0">
                <h6 class="text-muted text-uppercase mb-0 me-3">Dados do Usuário</h6>
                <hr class="flex-grow-1 my-0" style="border-top: 1px solid #e0e0e0;">
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <p class="text-muted mb-0">Nome</p>
                    <p class="fw-bold fs-5" id="userName">Carregando...</p>
                </div>
                <div class="col-6">
                    <p class="text-muted mb-0">Matrícula</p>
                    <p class="fw-bold fs-5" id="userMatricula">Carregando...</p>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <p class="text-muted mb-0">E-mail</p>
                    <p class="fw-bold fs-5" id="userEmail">Carregando...</p>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3 mt-4">
                <h6 class="text-muted text-uppercase mb-0 me-3">Detalhes</h6>
                <hr class="flex-grow-1 my-0" style="border-top: 1px solid #e0e0e0;">
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <p class="text-muted mb-0">Data de criação</p>
                    <p class="fw-bold fs-5" id="userDataCriacao">Carregando...</p>
                </div>
                <div class="col-6">
                    <p class="text-muted mb-0">Última edição</p>
                    <p class="fw-bold fs-5" id="userUltimaEdicao">Carregando...</p>
                </div>
            </div>
        </div>
        <div class="offcanvas-footer text-center py-3 border-top">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Fechar</button>
        </div>
    </div>

    <?= ToastrFlash::widget() ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>