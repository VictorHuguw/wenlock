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
        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">
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
                    <?= $form->field($searchModel, 'nome', [
                        'template' => '{input}',
                        'inputOptions' => [
                            'class' => 'form-control',
                            'placeholder' => 'Pesquisar por nome',
                            'value' => $searchModel->nome
                        ],
                    ])->label(false)
                    ?>
                    <button class="btn btn-primary" type="submit" title="Buscar" style="height: 38px;background:#0D1931">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>

            <?php if ($tipoUsuario === 'admin'): ?>
                <div class="text-end">
                    <?= Html::a('<i class="fas fa-plus"></i> Cadastrar Usuário', ['create'], ['class' => 'btn btn-info']) ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="table-responsive">
            <table class="table">
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

                            <td class="text-end">
                                <a href="javascript:void(0);"
                                    class="btn btn-sm btn-outline-secondary view-user-btn"
                                    title="Visualizar"
                                    data-user-id="<?= $usuario->id ?>">
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
                                                'confirm' => 'Tem certeza que deseja excluir o usuário ' . Html::encode($usuario->nome) . '?',
                                                'method' => 'post',
                                            ],
                                            'data-user-name' => Html::encode($usuario->nome),
                                        ]
                                    ) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php if (empty($dataProvider->models)): ?>
                <div class="text-center d-flex flex-column align-items-center justify-content-center" style="min-height: 400px; margin-top: 100px;">
                    <img src="<?= Yii::getAlias('@web') ?>/images/nothing-user.svg" alt="no result" class="img-fluid mb-4" style="height: 25vh;">
                    <h2>Nenhum resultado encontrado.</h2>
                    <p>Não foi possível achar nenhum resultado para sua busca.<br>Tente refazer a pesquisa para encontrar o que busca.</p>
                </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted">
                    Total de itens: <?= $dataProvider->totalCount ?>
                </div>
                <div>
                    <?= LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                        'options' => ['class' => 'pagination mb-0'],
                        'linkContainerOptions' => ['class' => 'page-item'],
                        'linkOptions' => ['class' => 'page-link'],
                    ]) ?>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="userOffcanvas" aria-labelledby="userOffcanvasLabel" style="
    width: 45vh;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="userOffcanvasLabel">Visualizar Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fechar"></button>
    </div>
    <div class="offcanvas-body">
        <div class="d-flex align-items-center mb-3 mt-0">
            <h6 class="text-muted text-uppercase mb-0 me-3">Dados do Usuário</h6>
            <hr class="flex-grow-1 my-0" >
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

        <div class="d-flex align-items-center mb-3 mt-0">
            <h6 class="text-muted text-uppercase mb-0 me-3">Detalhes</h6>
            <hr class="flex-grow-1 my-0" >
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

</div>
<?php
$this->registerJs(<<<JS
$(document).on('click', '.view-user-btn', function() {
    const userId = $(this).data('user-id');

    $.ajax({
        url: '/user/view-ajax',
        method: 'GET',
        data: { id: userId },
        success: function(response) {
            $('#userName').text(response.nome || '-');
            $('#userMatricula').text(response.matricula || '-');
            $('#userEmail').text(response.email || '-');
            $('#userDataCriacao').text(response.created_at || '-');
            $('#userUltimaEdicao').text(response.updated_at || '-');

            var myOffcanvas = new bootstrap.Offcanvas(document.getElementById('userOffcanvas'));
            myOffcanvas.show();
        },
        error: function() {
            Swal.fire('Erro', 'Não foi possível carregar os dados do usuário.', 'error');
        }
    });
});
JS);
?>