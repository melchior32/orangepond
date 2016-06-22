<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Colour;


/* @var $this yii\web\View */
/* @var $model common\models\Plant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'colour_id')->dropDownList(
        ArrayHelper::map(Colour::find()->orderBy('name')->all(), 'id', 'name'),
        ['prompt' => 'select ...']
    ); ?>

    <?//= $form->field($model, 'created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
