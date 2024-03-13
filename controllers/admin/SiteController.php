<?php

namespace app\controllers\admin;

use app\Entities\Forms\ImageLinkSearch;
use app\Entities\Services\ImageLinkService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public $layout = 'admin';
    private ImageLinkService $imageLinkService;

    public function __construct($id, $module, ImageLinkService $imageLinkService, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->imageLinkService = $imageLinkService;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex(string $token = null)
    {
        if(!$token && 'xyz123' == $token) {
            //todo тут надо было бы какой нибудь exception выкинуть но в задании было упростить по этому redirect
            Yii::$app->session->setFlash('error', 'авторизируйтесь пожалуйста');
            return $this->redirect(['site']);
        }
        $searchModel = new ImageLinkSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelete($id): Response
    {
        try {
            $this->imageLinkService->imageLinkRepository->delete($id);
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }


}
