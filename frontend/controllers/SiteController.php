<?php
namespace frontend\controllers;

use Yii;
use common\con\FrontendController;
use common\models\LoginForm;
use common\models\Form;
use common\models\Scene;
use common\models\Trends;
use common\models\Qa;
use common\models\Package;
use common\models\Models;

use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\web\NotFoundHttpException;


/**
 * Site controller
 */
class SiteController extends FrontendController
{

    public function actionIndex(){
        #翻新套餐
        $package = Package::getRec(5);
        #佳园动态
        $trends_data = Trends::getData(3,3);
        #翻新问答
        $qa_data = Qa::getRec(3);
        return $this->render('index',['package'=>$package,'trends_data'=>$trends_data,'qa_data'=>$qa_data]);
    }

    public function actionSearch(){
        $type_list = [0=>'全部',1=>'翻新现场',2=>'翻新问答',3=>'佳园动态'];
        $type = Yii::$app->request->get('type','0');
        $keyword  = Yii::$app->request->get('keyword','');
        if(!$keyword){
            throw new NotFoundHttpException('请输入搜索词.');
        }
        $title = $type_list[$type];
        switch ($type) {
            case 1:
                $dataProvider = Scene::searchData($keyword);
                break;
            case 2:
                $dataProvider = Qa::searchData($keyword);
                break;
            case 3:
                $dataProvider = Trends::searchData($keyword);
                break;
            default:
                $dataProvider = Models::searchData($keyword);
        }

        Yii::$app->params['search']['type'] = $type;
        Yii::$app->params['search']['title'] = $title;
        Yii::$app->params['search']['keyword'] = $keyword;
        return $this->render('search',['title'=>$title,'dataProvider'=>$dataProvider]);
    }

    public function actionAboutus(){
        return $this->render('aboutus');
    }

    public function actionContactus(){
        return $this->render('contactus');
    }

    public function actionSuggest(){
        return $this->render('suggest');
    }

    public function actionHonor(){
        return $this->render('honor');
    }


    #登录
    public function actionLogin(){
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', ['model' => $model,]);
    }
    #登出
    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }
    #注册
    public function actionSignup(){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', ['model' => $model,]);
    }
    #密码重置
    public function actionRequestPasswordReset(){
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', ['model' => $model,]);
    }

    #密码回调修改
    public function actionResetPassword($token){
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', ['model' => $model]);
    }

    public function actionAjaxform(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if (!Yii::$app->request->isAjax) {
            return ['status' => 0, 'info' => '无效数据'];
        }
        $model = new Form();
        if ($model->load(Yii::$app->request->post())) {
            $model->ip = Yii::$app->request->userIP;
            if ($model->save()) {
                return ['status' => 1, 'info' => '提交成功'];
            }else{
                $error = $model->getErrors();
                if(!$error){
                    return ['status' => -1, 'info' => '未知错误'];
                }
                foreach($error as $value){
                    return ['status' => 0, 'info' => $value[0]];
                }
            }
        }
    }
}
