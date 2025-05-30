<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Atualizar dados de usuario ' ;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
?>
<style>
    body {
        background-color: #F3F3F3 !important;
    }
</style>
<div class="user-update">

     <h2 class="mb-4">
        <?= Html::a('<i class="fas fa-chevron-left"></i>', ['index'], ['class' => 'btn btn-link text-dark me-2', 'title' => 'Voltar para Usuários']) ?>
        <?= Html::encode($this->title) ?>
    </h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
