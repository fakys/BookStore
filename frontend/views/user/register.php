<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\Client $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Register';
?>
<div class="site-login">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>


        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'patronymic')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'passport_series')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'passport_number')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'password_confirm')->passwordInput() ?>


        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>
        <div class="p-3"><a href="<?=\yii\helpers\Url::to(['user/login'])?>">Вход</a> </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
