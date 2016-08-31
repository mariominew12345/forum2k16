<?php

if (!$user || !$user->isAdmin()){
    header("Location: index.php?page=main");
}

?>

<main id="wrapper">
    <section class="category-holder">
        <div class="category-title">Create category</div>
        <div class="category-information">
            <div class="category" style="height: auto; padding: 10px;">
                <form method="post">
                    <input type="text" class="fancyInput" placeholder="Category name" name="name" style="display:inline-block;width: 40%; height: 30px; margin: 0"/>
                    <input type="text" class="fancyInput" placeholder="Category description" name="description" style="display:inline-block;width: 40%; height: 30px; margin: 0"/>
                    <input type="submit" name="createCategory" value="Create" class="button" style="width: 17%; height: 30px;"/>
                </form>
            </div>
        </div>
    </section>

    <section class="category-holder">
        <div class="category-title">Delete category</div>
        <div class="category-information">
            <div class="category" style="height: auto; padding: 10px;">
                <form method="post">
                    <select class="fancySelect" name="categoryToDelete" style="display:inline-block;width: 80%; height: 30px; margin: 0;  padding: 0px 10px;">

                        <?php
                        $categories = $categoryService->getCategories(300);

                        foreach ($categories as $category){
                            echo "<option value=" .  $category['id'] . ">" . $category['name'] . "</option>";
                        }
                        ?>

                    </select>
                    <input type="submit" name="deleteCategory" value="Delete" class="button" style="width: 17%; height: 30px;"/>
                </form>
            </div>
        </div>
    </section>

    <section class="category-holder">
        <div class="category-title">Delete topics</div>
        <div class="category-information">

            <?php
            $topics = $topicsService->getTopics(5000);

            foreach ($topics as $curTopic){ ?>

                <div class="category">
                    <div class="cat cat-title">
                        <img src="./images/folder.png" class="category-avatar"/>
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
                        <span style="text-align: center; color:red"><?php echo "<a style='margin-left:10px;' href='index.php?page=admin&deleteTopic=" . $curTopic['id']. "'>Delete</a>";?></span>
                    </div>
                </div>

            <?php  }  ?>
        </div>
    </section>
</main>
