<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="register__form">
        <div class="site-login">
            <h1><?= Html::encode($this->title) ?></h1>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                            'inputOptions' => ['class' => 'col-lg-3 form-control'],
                            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    ]) ?>

                    <div class="form-group">
                        <div>
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                            <a class="btn btn-primary" href="/user/create/">Регистрация</a>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
            </div>
    </div>
</div>

<style>
    .user-create {
        display: flex;
        justify-content: center;
    }
    .register__form {
        margin-top: 100px;
        width: 400px;
        padding: 20px;
        padding-right: 30px;
        padding-left: 30px;
        background: #FFFFFF;
        border-radius: 15px;
        box-shadow: 0 0 20px 7px rgba(0,0,0,0.1);
        position: fixed;
    }

    @media screen and (max-width: 768px) {
        .register__form {
            width: 300px;
        }
    }
</style>