<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\YiiAsset;

$this->title = 'Cadastro de Usuário';
$this->registerCssFile('@web/css/create-user-form.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerJsFile('@web/js/validate-create-user-form.js', ['depends' => [YiiAsset::class],]);
?>

<div class="login-container row gx-5">
    <div class="left-side col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center">
        <h1 style="font-size: 115px !important;"><b>Wen</b><span style="color: white">Lock</span><span style="color: #00b4c0;">.</span></h1>
    </div>

    <div class="col-md-6">
        <div class="login-box">
            <h1 class="text-center mb-4" style="color: #0290A4;"><strong>Cadastro de Usuário</strong></h1>
            <p class="text-center mb-4"><strong>Preencha os dados para criar sua conta</strong></p>

            <?php $form = ActiveForm::begin(); ?>
            <div class="form-group mb-3">
                <?= $form->field($model, 'nome')->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Nome',
                    'pattern' => '[A-Za-zÀ-ÿ\s]+',
                ])->label(false) ?>
            </div>
            <div class="form-group mb-3">
                <?= $form->field($model, 'email')->input('email', [
                    'class' => 'form-control',
                    'placeholder' => 'E-mail',
                    'required' => true,
                    'title' => 'Digite um e-mail válido, como usuario@dominio.com',
                ])->label(false) ?>
            </div>
            <div class="form-group mb-3">
                <?= $form->field($model, 'senha')->passwordInput([
                    'autocomplete' => 'new-password',
                    'class' => 'form-control',
                    'placeholder' => 'Senha',
                    'pattern' => '[a-zA-Z0-9]{6,}',
                ])->label(false) ?>
            </div>
            <div class="form-group mb-3">
                <?= $form->field($model, 'password_repeat')->passwordInput([
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Confirmação da senha',
                    ])->label(false) ?>
            </div>

            <div class="form-group mb-3">
                <?= $form->field($model, 'matricula')->input('number', [
                    'class' => 'form-control',
                    'placeholder' => 'Matrícula'
                ])->label(false) ?>
            </div>
            <div class="form-group mb-4">
                <?= $form->field($model, 'tipo')->dropDownList(
                    [
                        'admin' => 'Admin',
                        'user' => 'User'
                    ],
                    [
                        'class' => 'form-control'
                    ]
                )->label(false) ?>
            </div>

            <div class="form-group d-grid mb-3">
                <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-primary btn-lg']) ?>
            </div>

            <div class="form-group text-center">
                <?= Html::a('Voltar para login', ['auth/login'], ['class' => 'btn btn-link']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
