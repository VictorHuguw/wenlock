<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $this->layout = 'guest';
        if (Yii::$app->request->isPost) {
            $email = Yii::$app->request->post('email');
            $senha = Yii::$app->request->post('senha');

            $user = User::findByEmail($email);

            if ($user && $user->validatePassword($senha)) {
                Yii::$app->user->login($user);
                Yii::$app->session->setFlash('success', 'Login realizado com sucesso!');
                return $this->redirect(['home/index']);
            } else {
                Yii::$app->session->setFlash('error', 'E-mail ou senha inválidos.');
            }
        }

        return $this->render('login');
    }

    public function actionCreate()
    {
        $model = new User();
        $this->layout = 'guest';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Usuário criado com sucesso.');
                return $this->redirect(['login']);
            } else {
                echo '<pre>';
                print_r($model->getErrors());
                echo '</pre>';
                exit;
            }
        }

        return $this->render('create', ['model' => $model]);
    }
}
