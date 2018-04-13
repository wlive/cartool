<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LigaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ligas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="liga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Liga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome:ntext',
            'descricao:ntext',
            'qtde_participantes',
            'participantes:ntext',
            //'mata_mata:boolean',
            //'rodada_inicio',
            //'ativa:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
