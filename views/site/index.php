<?php

/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';

/** @var $imageLink string */
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12 row justify-content-md-center" >
                <div class="col-md-auto">
                    <?= Html::img($imageLink,['class' => 'image']) ?>
                </div>

            </div>
            <div class="row mt-2" >
                <div class="col-lg-6 text-end">
                    <?= Html::a(
                            'Отклонить',
                            Url::to('/site/solution'),
                            ["class"=>"btn btn-warning solution",'data-solution'=>0]
                    ) ?>
                </div>
                <div class="col-lg-5">
                    <?= Html::a(
                            'Подтвердить',
                            Url::to('/site/solution'),
                            ["class"=>"btn btn-primary solution",'data-solution'=>1]
                    ) ?>
                </div>
            </div>

        </div>

    </div>
</div>
