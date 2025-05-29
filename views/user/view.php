<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Dados de Usuário';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    body {
        background-color: #F3F3F3 !important;
    }
</style>
<div class="user-view">

     <h2 class="mb-4">
        <?= Html::a('<i class="fas fa-chevron-left"></i>', ['index'], ['class' => 'btn btn-link text-dark me-2', 'title' => 'Voltar para Usuários']) ?>
        <?= Html::encode($this->title) ?>
    </h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'email:email',
            'senha',
            'matricula',
            'tipo',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
