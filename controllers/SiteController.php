<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
        $model->scenario = 'login';

        if (Yii::$app->request->isPost) {
            $login = Yii::$app->request->post('login');
            $password = Yii::$app->request->post('password');

            $user = User::findByEmailOrMatricula($login);

            if ($user && $user->validatePassword($password)) {
                Yii::$app->user->login($user);
                Yii::$app->session->addFlash('success', 'Login realizado com sucesso!');
                return $this->goHome();
            } else {
                Yii::$app->session->addFlash('error', 'Email/matrícula ou senha inválidos.');
            }
        }

        return $this->render('login');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionRegister()
    {
        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->addFlash('success', 'Usuário criado com sucesso!');
                return $this->redirect(['login']);
            } else {
                Yii::$app->session->addFlash('error', 'Erro ao criar usuário.');
            }
        }

        return $this->render('register', ['model' => $model]);
    }
}
