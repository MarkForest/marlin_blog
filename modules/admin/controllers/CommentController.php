<?php

namespace app\modules\admin\controllers;


use app\models\Comment;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {
        $comments = Comment::find()->orderBy('id desc')->all();
        return $this->render('index',[
            'comments'=>$comments,
        ]);
    }

    public function actionDelete($id){
        if(Comment::findOne($id)->delete())
        {
            return $this->redirect(['comment/index']);
        }
    }

    public function actionAllow($id){
        $comment =Comment::findOne($id);
        $comment->status = Comment::STATUS_ALLOW;
        if ($comment->save())
        {
            $this->redirect(['comment/index']);
        }

    }

    public function actionDisallow($id){
        $comment = Comment::findOne($id);
        $comment->status = Comment::STATUS_DISALLOW;
        if ($comment->save())
        {
            $this->redirect(['comment/index']);
        }
    }

}