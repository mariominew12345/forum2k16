<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="utf-8"/>
        <link href="//fonts.googleapis.com/css?family=Asap:700" rel="stylesheet" type="text/css">
        <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="./styles/styles.css"/>
        <link rel="stylesheet" href="./styles/media-queries.css"/>
        <script src="./ckeditor/ckeditor.js"></script>

    </head>
    <body>

        <?php
        mb_internal_encoding("UTF-8");
        require_once('Controller/usersController.php');
        require_once('Controller/categoriesController.php');
        require_once('Controller/topicsController.php');
        require_once('Controller/answersController.php');

        include './views/header.php';


        if(isset($_GET['page'])){
            switch($_GET['page']){
                case "login":
                    include 'views/login.php';
                    break;
                case "topic":
                    include 'views/topic.php';
                    break;
                case "category":
                    include 'views/category.php';
                    break;
                case "allCategories":
                    include 'views/allCategories.php';
                    break;
                case "register":
                    include 'views/login.php';
                    break;
                case "user":
                    if(!$user){
                        include 'views/login.php';
                    } else {
                        include 'views/user.php';
                    }
                    break;
                case "editTopic":
                    include 'views/editTopic.php';
                    break;
                case "editAnswer":
                    include 'views/editAnswer.php';
                    break;
                case "allTopics":
                    include 'views/allTopics.php';
                    break;
                case "admin":
                 if(!$user || !$user->isAdmin()){
                    header('Location: index.php?page=main');
                 } else {
                     include 'views/admin.php';
                 }
                break;
                case "main":
                    include "views/main.php";
                    break;

                case "logout":
                    logoutUser($userService);
                    break;
                case "error":
                    include "views/error.php";
                    break;
                case "new-topic":
                    if(!$user){
                        include 'views/login.php';
                    } else {
                        include "views/newTopic.php";
                    }
                    break;
                case "search":
                    include "views/search.php";
                    break;
                default:
                    include "views/error.php";
            }
        }
        else{
            header('Location: index.php?page=main');
        }

        include 'views/footer.php';
        ?>

        <script src="./scripts/script.js"></script>
    </body>
</html>