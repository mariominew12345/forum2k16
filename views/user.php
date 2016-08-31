<link rel="stylesheet" href="./styles/profile.css"/>
<div id="wrapper">
    <section class="category-holder">
        <div class="category-title">Edit your profile</div>
        <div class="category-information">
            <div class="category">
                <form method="post">

                    <div class="profile-stat">
                        <img class="user-avatar" id="user-avatar" src="<?php if ($user->getAvatar()) {echo $user->getAvatar();} else {echo './images/324.png';}?>" alt=""/><br>
                        <input type="button" class="button" value="Choose new.." id="choseAvatar"/>
                        <input type="text" hidden="hidden" id="base64Avatar" name="avatar" value="<?php echo $user->getAvatar()?>"/>
                    </div>

                    <div class="profile-stat">
                        <span>Username</span> <input type="text" class="fancyInput" disabled value="<?php echo $user->getUsername()?>"/>
                        <span>First name</span> <input type="text" class="fancyInput" value="<?php echo $user->getFirstName()?>" name="firstName"/>
                        <span>Last name</span> <input type="text" class="fancyInput" value="<?php echo $user->getLastName()?>" name="lastName"/>
                    </div>
                    <div class="profile-stat" style="text-align: right; margin-top: -15px; padding-right: 8px;">
                        <input type="submit" class="button" style="" value="Edit profile" name="editProfile"/>
                    </div>
                </form>
            </div>
            <input type="file" id="avatarChooser" style="display: none"/>
        </div>
    </section>
</div>

<script>
    function el(id){return document.getElementById(id);} // Get elem by ID

    function readImage() {
        if ( this.files && this.files[0] ) {
            var FR= new FileReader();
            FR.onload = function(e) {
                el("user-avatar").src = e.target.result;
                el("base64Avatar").value = e.target.result;
            };
            FR.readAsDataURL( this.files[0] );
        }
    }

    document.querySelector("#avatarChooser").addEventListener("change", readImage, false);

    document.querySelector('#choseAvatar').onclick = function(){
        document.querySelector("#avatarChooser").click();
    }

</script>