<?php

use yii\helpers\Html;

$this->title = 'Home';
?>

<div class="mt-4">
    <h1 class="fw-bold">Home</h1>
    <div class="bg-white rounded p-4 shadow-sm">
        <h2>Olá <?= Html::encode(Yii::$app->user->identity->nome ?? 'Usuário') ?>!</h2>
        <p><?= date('d, F Y') ?></p>

        <div class="text-center mt-4">
            <img src="<?= Yii::getAlias('@web') ?>/images/welcome.svg" alt="Welcome" class="img-fluid" style="45vh">

            <div class="mt-3 mb-lg-5">
                <button class="btn btn-outline-primary btn-lg" style="width: 50vh;height: 6vh;">Bem-vindo ao WenLock!</button>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    document.getElementById("toggleMenu").addEventListener("click", function() {
        var menu = document.getElementById("accessControlSubmenu");
        var icon = document.getElementById("icon");

        if (menu.classList.contains("show")) {
            menu.classList.remove("show");
            icon.innerHTML = "&#9660;";
        } else {
            menu.classList.add("show");
            icon.innerHTML = "&#9650;";
        }
    });
</script>