<?php

if (isset($_GET['topic-id'])){
    $topic = $topicsService->getTopicById($_GET['topic-id']);

    if (!$topic){
        header("Location: index.php?page=error?error=The desired topic doesn't exist.");
        die();
    }

    $author = $userService->getUserById($topic->getAuthorId());
    $topicsService->increaseViews($topic->getId());

} else {
    header("Location: index.php?page=error?error=The desired topic doesn't exist.");
}

if (isset($_POST['like'])){
    $topicsService->increaseRating($topic->getId());
    echo "<script>window.location = window.location</script>";
} else if (isset($_POST['hate'])){
    $topicsService->decreaseRating($topic->getId());
    echo "<script>window.location = window.location</script>";
}

if (isset($_GET['deleteAnswer'])){
   if (($user && $user->isAdmin()) || ($user && $userService->getUserById($_GET['deleteAnswer'])->getId() == $user->getId())){
       $answerService->deleteAnswer($_GET['deleteAnswer']);
   }
}

?>

<link rel="stylesheet" href="./styles/topic.css"/>
<main id="wrapper">

    <section class="topic-wrapper">
        <section class="topic-post">
            <div class="post-header">
                <img src="<?php if ($author->getAvatar()) {echo $author->getAvatar();} else {echo './images/324.png';}?>" class="user-avatar"/>
                <div class="post-info">
                    <span class="post-title"><?php echo $topic->getTitle()?></span>
                    <span class="post-stats">By
                        <strong class="answer-username"><?php echo $author->getUsername()?></strong>
                        on <?php echo $topic->getDate()?>. Views:<strong><?php echo " " . $topic->getViews()?></strong>
                        <?php if (($user && $user->getId() == $author->getId()) || ($user && $user->isAdmin())) {
                            echo "<a style='margin-left:10px;' href='index.php?page=editTopic&topic-id=" .  $_GET['topic-id'] . "'>Edit</a>";
                            echo "<a style='margin-left:10px;' href='index.php?page=main&deleteTopic=" . $_GET['topic-id']. "'>Delete</a>";

                        }?>
                    </span>
                </div>
                <div class="vote-controls">
                    <form method="post">
                        <input type="submit" name="like" value="&#x25b2;" id="likeBtn"/>
                        <span><?php echo $topic->getRating()?></span>
                        <input type="submit" name="hate" value="&#x25bc;" id="hateBtn"/>
                    </form>
                </div>
            </div>
            <div class="post-content"><?php echo nl2br($topic->getContent())?></div>
        </section>

        <?php

        $answers = $answerService->getAnswersByTopicId($_GET['topic-id']);

        if ($answers){
            foreach ($answers as $curAnswer){ ?>

                <section class="topic-post">
                    <div class="post-header">
                        <img src="<?php if ($userService->getUserById($curAnswer['author_id'])->getAvatar()) {echo $userService->getUserById($curAnswer['author_id'])->getAvatar();} else {echo './images/default-user-avatar.png';}?>" class="user-avatar"/>
                        <div class="post-info">
                            <span class="post-title"><?php echo 'RE:' . $topic->getTitle() ?></span>
                            <span class="post-stats">
                                By <strong class="answer-username"><?php echo $userService->getUserById($curAnswer['author_id'])->getUsername()?></strong> on <?php echo $curAnswer['date']?>
                                <?php if (($user && $user->getId() == $curAnswer['author_id']) || ($user && $user->isAdmin())) {
                                    echo "<a style='margin-left:10px;' href='index.php?page=editAnswer&answer-id=" .  $curAnswer['id'] . "&topic-id=" . $_GET['topic-id'] . "'>Edit</a>";
                                    echo "<a style='margin-left:10px;' href='index.php?page=topic&topic-id=" . $_GET['topic-id'] . "&deleteAnswer=" .  $curAnswer['id'] . "&topic-id=" . $_GET['topic-id'] . "'>Delete</a>";
                                }?>

                            </span>
                        </div>
                    </div>
                    <div class="post-content"><?php echo nl2br($curAnswer['content']);?></div>
                </section>

        <?php
            }
        }?>

    </section>

    <?php

    if ($user){ ?>
        <span class="or-reg" style="border: none; padding: 0">Have anything to say? Add a new reply now</span>
        <section class="add-reply">
            <form method="post">
                <textarea name="content" id="userReply"></textarea>
                <input type="submit" value="Reply" id="replyBtn" name="addReply"/>
            </form>
        </section>
    <?php } else { ?>
        <span class="or-reg" style="border: none; padding: 0">Have anything to say? <a href="index.php?page=login" style="color: lightskyblue">Log in or register now</a> to add a reply</span>
    <?php }?>


</main>
<script>
    if (document.querySelector('#userReply'))
        CKEDITOR.replace('userReply');
</script>
