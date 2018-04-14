<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LigaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="liga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'qtde_participantes') ?>

    <?= $form->field($model, 'participantes') ?>

    <?php // echo $form->field($model, 'mata_mata')->checkbox() ?>

    <?php // echo $form->field($model, 'rodada_inicio') ?>

    <?php // echo $form->field($model, 'ativa')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
