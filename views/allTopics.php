
<main id="wrapper">
    <section class="category-holder">
        <div class="category-title">All topics</div>
        <div class="category-information">

            <?php
            $topics = $topicsService->getTopics(5000);

            foreach ($topics as $curTopic){ ?>

                <div class="category">
                    <div class="cat cat-title">
                        <img src="./images/folder1.png" class="category-avatar"/>
                        <div class="cat-description">
                            <span><a href="index.php?page=topic&topic-id=<?php echo $curTopic["id"]?>"><?php echo $curTopic["title"]?></a></span>
                            <span style="padding-top: 3px"><?php echo substr($curTopic['content'], 0, 60) . "...";?></span>
                        </div>
                    </div>
                    <div class="cat cat-info">
                        <span><?php echo $curTopic['views'] . " Views" ?></span>
                        <span><?php echo $curTopic['answers'] . " Answers" ?></span>
                    </div>
                    <div class="cat cat-activity">
                        <span>by <span class="answer-username"><?php echo $userService->getUserById($curTopic['author_id'])->getUsername()?></span></span>
                        <span><?php echo $curTopic['date']?></span>
                    </div>
                </div>

            <?php  }  ?>
        </div>
    </section>
</main>
