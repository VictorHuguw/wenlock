<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
$this->registerCssFile('@web/css/login-form.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);

?>

<div class="login-container row gx-5">
    <div class="left-side col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center">
        <h1 style="font-size: 115px !important;"><b>Wen</b><span style="color: white">Lock</span><span style="color: #00b4c0;">.</span></h1>
    </div>
    <div class="col-md-6">
        <div class="login-box">
            <h1 class="mb-4 mt-3" style="color: #0290A4;"><strong>Bem-vindo!</strong></h1>
            <p class="mb-4 "><strong>Entre com sua conta</strong></p>
            <?php $form = ActiveForm::begin(); ?>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control" required>
                </div>
                <div class="form-group d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                </div>
                <div class="form-group text-center" style="color: #0290A4;">
                    <?= Html::a('Criar Conta', ['auth/create'], ['class' => 'btn btn-link']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
