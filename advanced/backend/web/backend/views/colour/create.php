<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Colour */

$this->title = 'Create Colour';
$this->params['breadcrumbs'][] = ['label' => 'Colours', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colour-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
