<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;
use yii\widgets\ActiveForm; 
use yii\web\YiiAsset;


$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/users.css', ['depends' => [\yii\bootstrap5\BootstrapAsset::class]]);
$this->registerJsFile('@web/js/yii-sweetalert-confirm.js', [
    'depends' => [YiiAsset::class],
]);

$tipoUsuario = Yii::$app->user->identity->tipo; 
?>

<div class="user-index">

    <h2 class="mb-4"><?= Html::encode($this->title) ?></h2>
    <div class="user-list-card mt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="col-md-4">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'], 
                    'method' => 'get',     
                    'options' => [
                        'class' => 'mb-0',
                    ],
                    'fieldConfig' => [
                        'template' => "{input}\n{error}",
                    ],
                ]); ?>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <?= $form->field($searchModel, 'nome', [ 
                        'inputOptions' => [
                            'class' => 'form-control',
                            'placeholder' => 'Pesquisar por nome',
                            'value' => $searchModel->nome
                        ],
                    ])->label(false) 
                    ?>
                </div>
                <?php
                ActiveForm:
                ActiveForm::end();
                ?>
            </div>

            <div class="text-end">
                <?= Html::a('<i class="fas fa-plus"></i> Cadastrar Usuário', ['create'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProvider->models as $index => $usuario): ?>
                        <tr>
                            <td><?= $index + ($dataProvider->pagination->page * $dataProvider->pagination->pageSize) + 1 ?></td>
                            <td><?= Html::encode($usuario->nome) ?></td>
    
                            <td class="text-end"> <a href="<?= Url::to(['view', 'id' => $usuario->id]) ?>"
                                    class="btn btn-sm btn-outline-secondary" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <?php if ($tipoUsuario === 'admin'): ?>
                                    <a href="<?= Url::to(['update', 'id' => $usuario->id]) ?>"
                                        class="btn btn-sm btn-outline-success" title="Editar">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <?= Html::a(
                                        '<i class="fas fa-trash"></i>',
                                        ['delete', 'id' => $usuario->id], 
                                        [
                                            'class' => 'btn btn-sm btn-outline-danger',
                                            'title' => 'Excluir',
                                            'data' => [
                                                'confirm' => 'Tem certeza que deseja excluir o usuário ' . Html::encode($usuario->nome) . '?', // Mensagem de confirmação personalizada
                                                'method' => 'post',
                                            ],
                                            'data-user-name' => Html::encode($usuario->nome), 
                                        ]
                                    ) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($dataProvider->models)): ?>
                        <tr>
                            <td colspan="5" class="text-center">Nenhum usuário encontrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'options' => ['class' => 'pagination justify-content-center mt-4'],
            'linkContainerOptions' => ['class' => 'page-item'],
            'linkOptions' => ['class' => 'page-link'],
        ]) ?>
    </div>
</div>