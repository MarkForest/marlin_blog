<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if (!empty($comments)):?>
        <table class="table">
            <thead>
            <tr>
                <td>#</td>
                <td>Author</td>
                <td>Text</td>
                <td>Date</td>
                <td>Action</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($comments as $comment):?>
            <tr>
                <td><?=$comment->id?></td>
                <td><?=$comment->user->name?></td>
                <td><?=$comment->text?></td>
                <td><?=$comment->date?></td>
                <td>

                    <a class="btn btn-danger" href="<?=Url::toRoute(['comment/delete','id'=>$comment->id])?>">Delete</a>
                <?php if ($comment->status==1):?>
                    <a class="btn btn-warning" href="<?=Url::toRoute(['comment/disallow','id'=>$comment->id])?>">Disallow</a>
                <?php else:?>
                    <a class="btn btn-success" href="<?=Url::toRoute(['comment/allow','id'=>$comment->id])?>">Allow</a>
                <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    <?php endif;?>
</div>
