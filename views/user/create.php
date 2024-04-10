<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Регистрация';

?>
<div class="user-create">

    <div class="register__form">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
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
