<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Liga */

$this->title = 'Create Liga';
$this->params['breadcrumbs'][] = ['label' => 'Ligas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
