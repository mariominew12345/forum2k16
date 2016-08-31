<header>
    <div id="nav-header">
        <div class="nav-wrapper">
            <h2>Menu</h2>
            <ul class="nav">
                <li><a href="./index.php?page=main">Home</a></li>
                <li><a href="./index.php?page=new-topic">Create topic</a></li>
                <li><a href="./index.php?page=allTopics">All topics</a></li>
                <li><input type="text" id="searchInput" placeholder="Search..."/></li>
            </ul>
            <ul class="user-options">
                <?php
                    if ($user){ ?>
                        <li><?php echo $user->getFirstName() . " " . $user->getLastName() . "(" . $user->getUsername() . ")"?></li>
                        <li class="drop-down-item">Options &#x25bc;
                            <ul class="drop-down-menu">
                                <li><a href="index.php?page=user">Profile</a></li>
                                <?php if ($user->isAdmin()) echo'<li><a href="index.php?page=admin">Admin panel</a></li>';?>
                                <li><a href="index.php?page=logout">Exit</a></li>
                            </ul>
                        </li>
                <?php
                    } else {?>
                        <li><a href="./index.php?page=login">Log in</a></li>
                <?php
                    }
                ?>

            </ul>
        </div>
    </div>
    <div class="preview-header">
        <div>
            <h2><b>Simple Forum Project 2k16</b></h2>
        </div>
    </div>
</header>