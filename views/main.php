<main id="wrapper">
    <section class="category-holder">
        <div class="category-title">Most popular topics</div>
        <div class="category-information">
            <div class="stat stat-title">Title</div>
            <div class="stat stat-info">Statistics</div>
            <div class="stat stat-activity">Latest answer</div>
            <?php foreach ($mostPopularTopics as $curTopic){ ?>

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

    <section class="category-holder">
        <div class="category-title">Latest questions</div>
        <div class="category-information">
            <div class="stat stat-title">Title</div>
            <div class="stat stat-info">Statistics</div>
            <div class="stat stat-activity">Latest post</div>
            <?php foreach ($latestTopics as $curTopic){ ?>

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

    <section class="category-holder">
        <div class="category-title"><a href="index.php?page=allCategories">Categories</a></div>
        <div class="category-information">
            <div class="stat stat-title">Title</div>

            <?php
            $categories = $categoryService->getCategories(3);

            foreach ($categories as $category){ ?>

                <div class="category">
                    <div class="cat cat-title">
                        <img src="./images/folder1.png" class="category-avatar"/>
                        <div class="cat-description">
                            <span><a href="index.php?page=category&categoryId=<?php echo $category['id']?>"><?php echo $category['name']?></a></span>
                            <span><?php echo $category['description']?></span>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </section>

</main>
