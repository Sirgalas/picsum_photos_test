<?php

use app\Entities\Entity\ImageLink;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\Entities\Forms\ImageLinkSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Admin Image Links';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-link-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url:url',
            'is_solution:boolean',
            [
                'class' => ActionColumn::class,
                'template' => '{delete}',
                'urlCreator' => function ($action, ImageLink $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
