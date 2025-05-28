<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cadastro de Usuário';
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
    /* botão verde de cadastro para combinar */
    .btn-success {
        background-color: #00b4c0;
        border-color: #00b4c0;
        color: white;
    }
    .btn-success:hover {
        background-color: #009aa6;
        border-color: #009aa6;
        color: white;
    }
</style>

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
                    <?= $form->field($model, 'nome')->textInput(['class' => 'form-control', 'placeholder' => 'Nome'])->label(false) ?>
                </div>
                <div class="form-group mb-3">
                    <?= $form->field($model, 'email')->input('email', ['class' => 'form-control', 'placeholder' => 'Email'])->label(false) ?>
                </div>
                <div class="form-group mb-3">
                    <?= $form->field($model, 'senha')->passwordInput(['class' => 'form-control', 'placeholder' => 'Senha'])->label(false) ?>
                </div>
                <div class="form-group mb-3">
                    <?= $form->field($model, 'matricula')->textInput(['class' => 'form-control', 'placeholder' => 'Matrícula'])->label(false) ?>
                </div>
                <div class="form-group mb-4">
                    <?= $form->field($model, 'tipo')->dropDownList(['admin' => 'Admin', 'user' => 'User'], ['class' => 'form-control'])->label(false) ?>
                </div>

                <div class="form-group d-grid mb-3">
                    <?= Html::submitButton('Cadastrar', ['class' => 'btn btn-success btn-lg']) ?>
                </div>

                <div class="form-group text-center">
                    <?= Html::a('Voltar para login', ['auth/login'], ['class' => 'btn btn-link']) ?>
                </div>
            <?php ActiveForm::end(); ?>

            <?= $this->render('//layouts/toast') ?>
        </div>
    </div>
</div>

<script>
    const nome = document.getElementById('user-nome');      
    const email = document.getElementById('user-email');
    const matricula = document.getElementById('user-matricula');
    const senha = document.getElementById('user-senha');
    const btnSalvar = document.querySelector('button[type="submit"]');

    function validarNome(valor) {
        return /^[A-Za-zÀ-ÿ\s]+$/.test(valor.trim());
    }

    function validarEmail(valor) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor.trim());
    }

    function validarMatricula(valor) {
        return /^\d+$/.test(valor.trim());
    }

    function validarSenha(valor) {
        return /^[A-Za-z0-9]{6}$/.test(valor);
    }

    function validarTudo() {
        const nomeValido = validarNome(nome.value);
        const emailValido = validarEmail(email.value);
        const matriculaValida = validarMatricula(matricula.value);
        const senhaValida = validarSenha(senha.value);

        btnSalvar.disabled = !(nomeValido && emailValido && matriculaValida && senhaValida);
    }

    nome.addEventListener('input', validarTudo);
    email.addEventListener('input', validarTudo);
    matricula.addEventListener('input', validarTudo);
    senha.addEventListener('input', validarTudo);

    btnSalvar.disabled = true;
</script>
