<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\web\YiiAsset;

$this->registerJsFile('@web/js/showing-password.js', ['depends' => [YiiAsset::class]]);
$this->registerCssFile('@web/css/inputs.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$isCreate = $model->isNewRecord;

?>

<div class="card mt-3">
    <div class="card-body"> <?php $form = ActiveForm::begin(); ?>

        <h5 class="mb-3">Dados do Usuário</h5>
        <hr class="mb-4">

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $form->field($model, 'nome', [
                    'template' => "{label}\n{input}\n{hint}\n{error}",
                    'options' => ['class' => 'form-group']
                ])->textInput([
                    'maxlength' => 50,
                    'placeholder' => 'Insira o nome completo*',
                    'class' => 'form-control custom-input-style'
                ])->hint('Máx. 50 Caracteres')
                ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $form->field($model, 'matricula', [
                    'template' => "{label}\n{input}\n{hint}\n{error}",
                    'options' => ['class' => 'form-group']
                ])->input('number', [
                    'maxlength' => 10,
                    'placeholder' => 'Insira o Nº da matrícula',
                    'class' => 'form-control custom-input-style'
                ])->hint('Mín. 4 Letras | Máx. 10 Caracteres')
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <?= $form->field($model, 'email', [
                    'template' => "{label}\n{input}\n{hint}\n{error}",
                    'options' => ['class' => 'form-group']
                ])->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Insira o E-mail*',
                    'class' => 'form-control custom-input-style'
                ])->hint('Máx. 40 Caracteres')
                ?>
            </div>

        </div>

        <h5 class="mb-3">Dados de acesso</h5>
        <hr class="mb-4">

        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $form->field($model, 'senha', [
                    'template' => "{label}\n<div class='input-group'>{input}<span class='input-group-text' style='border:none'><i class='fas fa-eye'></i></span></div>\n{error}",
                    'options' => ['class' => 'form-group']
                ])->passwordInput([
                    'placeholder' => 'Senha',
                    'class' => 'form-control custom-input-style',
                    'pattern' => '[a-zA-Z0-9]{6,}',
                    'title' => 'A senha deve conter exatamente 6 caracteres alfanuméricos.'
                ])->label('Senha')
                ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $form->field($model, 'password_repeat', [
                    'template' => "{label}\n<div class='input-group'>{input}<span class='input-group-text' style='border:none'><i class='fas fa-eye'></i></span></div>\n{error}",
                    'options' => ['class' => 'form-group']
                ])->passwordInput([
                    'placeholder' => 'Repetir Senha',
                    'class' => 'form-control custom-input-style'
                ])->label('Repetir Senha')
                ?>
            </div>

            <div class="col-md-6 mb-3">
                <?= $form->field($model, 'tipo')->dropDownList(['admin' => 'Admin', 'user' => 'User'], ['class' => 'form-control custom-input-style'])->label('Selecione o tipo de usuario') ?>
            </div>

        </div>

        <div class="d-flex justify-content-end mt-4">
            <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-light me-2']) ?>
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-primary', 'id' => 'btnSalvar']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
