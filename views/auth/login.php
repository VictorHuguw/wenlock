<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Login';
?>

<style>
    body {
        background-color: #0b1c36;
    }
    .login-container {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }
    .login-box {
        background-color: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 650px;
        height: 60vh;
    }
    .left-side {
        flex: 1;
        color: white;
        text-align: center;
    }
    .left-side h1 {
        font-size: 48px;
        color: #00b4c0;
    }
    .form-control:focus {
        border-color: #00b4c0;
        box-shadow: 0 0 0 0.25rem rgba(0, 180, 192, 0.25);
    }
    .btn-primary {
        background-color: #00b4c0;
        border-color: #00b4c0;
    }
    .btn-primary:hover {
        background-color: #009aa6;
        border-color: #009aa6;
    }
</style>

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

            <?= $this->render('//layouts/toast') ?>
            
        </div>
    </div>
</div>
