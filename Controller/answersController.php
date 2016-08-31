<?php

require_once('Service/answersService.php');

$answerService = new AnswersService();

if (isset($_POST['addReply']) && isset($_GET['topic-id']) && $user){

    try{
        $answer = new Answer();
        $answer->setContent($_POST['content']);
        $answer->setTopicId($_GET['topic-id']);
        $answer->setAuthorId($user->getId());

        $answerService->createAnswer($_GET['topic-id'], $answer);

        $topicsService->increaseAnswers($_GET['topic-id']);
        header('Location: index.php?page=topic&topic-id=' . $_GET['topic-id']);
    }catch (Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }

}



if (isset($_POST['editAnswerBtn']) && $user){

    try{
        $answerService->editAnswer($_GET['answer-id'], $_POST['content']);

        header('Location: index.php?page=topic&topic-id=' . $_GET['topic-id']);
    }catch (Exception $ex){
        $error = $ex->getMessage();
        header("Location: index.php?page=error&error=".$error);
    }

}

?>