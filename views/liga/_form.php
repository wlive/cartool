<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Liga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="liga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'qtde_participantes')->textInput() ?>

    <?= $form->field($model, 'participantes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mata_mata')->checkbox() ?>

    <?= $form->field($model, 'rodada_inicio')->textInput() ?>

    <?= $form->field($model, 'ativa')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
