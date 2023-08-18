<!DOCTYPE html>
<html>

<head>
    <title>Anxout</title>
    <?php include 'db/init.html'; ?>
</head>

<body onload="postsGen();">
    <div class="container">
        <div class="box left-box">
            <p>Buttons for publish, make friends or vote on a pole.</p>
            <a href="newPost.php">
                <div class="buttonMain" id="addPost">Create a post</div>
            </a>
        </div>

        <header>
            <div id="addPost-r">
                <a href="newPost.php">
                    <img src="img/add.png" alt="addPost">
                </a>

            </div>
            <div id="searchBar-r">
                <input type="search" name="searchBar" id="searchBar">
            </div>
            <div id="profile-r">
                <img class="post profilePic"
                    src="https://e7.pngegg.com/pngimages/753/432/png-clipart-user-profile-2018-in-sight-user-conference-expo-business-default-business-angle-service-thumbnail.png"
                    alt="Profile Picture">
            </div>
        </header>

        <!--div class="backTop" onclick="goTop();">
            <img src="img/topArrow.png" alt="topArrow">
        </div-->

        <div class="box middle-box">
            <div id="title">
                <img id="logo" src="img/anxtyLogo.png" alt="logo">
                <h1>Anxout</h1>
                <h3>You can do whatever you want, nobody's gonna judge you</h3>
            </div>

            <!--Post Template-->
        </div>

        <div class="respBottom">
            <a href="">
                <div id="respB-icon"><img src="img/icons8-casa.svg" alt=""></div>
            </a>
        </div>

        <div class="box right-box">
            Profile, settings and preferences. Maybe friends list or search profiles.
        </div>
    </div>
</body>

</html>