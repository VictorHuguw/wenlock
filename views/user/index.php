<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;

$tipoUsuario = Yii::$app->user->identity->tipo; // admin ou user
?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cadastrar usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Matrícula</th>
                <th style="text-align: right;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProvider->models as $index => $usuario): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= Html::encode($usuario->nome) ?></td>
                    <td><?= Html::encode($usuario->email) ?></td>
                    <td><?= Html::encode($usuario->matricula) ?></td>
                    <td style="text-align: right;">
                        <!-- Visualizar -->
                        <a href="<?= Url::to(['view', 'id' => $usuario->id]) ?>" 
                           class="btn btn-sm btn-outline-secondary" title="Visualizar">
                            <i class="fas fa-eye"></i>
                        </a>

                        <?php if ($tipoUsuario === 'admin'): ?>
                            <!-- Editar -->
                            <a href="<?= Url::to(['update', 'id' => $usuario->id]) ?>" 
                               class="btn btn-sm btn-outline-success" title="Editar">
                                <i class="fas fa-pen"></i>
                            </a>

                            <!-- Excluir -->
                            <?= Html::a('<i class="fas fa-trash"></i>', 
                                ['delete', 'id' => $usuario->id], [
                                    'class' => 'btn btn-sm btn-outline-danger',
                                    'title' => 'Excluir',
                                    'data' => [
                                        'confirm' => 'Tem certeza que deseja excluir este usuário?',
                                        'method' => 'post',
                                    ],
                                ])
                            ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= LinkPager::widget([
    'pagination' => $dataProvider->pagination,
    'options' => ['class' => 'pagination justify-content-center'],
    'linkContainerOptions' => ['class' => 'page-item'],
    'linkOptions' => ['class' => 'page-link'],
]) ?>

</div>
