<?php

namespace app\controllers;

use app\Entities\Entity\ImageLink;
use app\Entities\Forms\ImageLinkForm;
use app\Entities\Services\ImageLinkService;
use app\Exceptions\NotSaveException;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{

    private ImageLinkService $linkService;

    public function __construct($id, $module, ImageLinkService $linkService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->linkService = $linkService;
    }

    final public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    final public function actionIndex(): string
    {
        return $this->render('index',
            [
                'imageLink' => $this->linkService->getImage()
            ]);
    }


    final public function actionSolution(): string
    {
        $form = new ImageLinkForm();
        if($form->load(Yii::$app->request->post(),'') && $form->validate()) {
            try{
                $this->linkService->create($form);
            } catch (NotSaveException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return Json::encode(['url'=>$this->linkService->getImage()]);

    }
}
