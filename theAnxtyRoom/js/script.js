//add fictional posts on middle box
function postsGen() {
    var num = 15;
    for (let i = 0; i < num; i++) {
        document.querySelector("div .middle-box").innerHTML += '<article class="postArticle" id="112"> <div class="userInfo"><img class="post UserPic" src="https://e7.pngegg.com/pngimages/753/432/png-clipart-user-profile-2018-in-sight-user-conference-expo-business-default-business-angle-service-thumbnail.png" alt="User Profile Picture"> <p>@usertag</p> <div class="react"><div class="reactLike" onclick="likePost("idPost");"><img src="https://images.emojiterra.com/twitter/v14.0/512px/1f90d.png" alt="Like Button"></div></div> </div> <h4>Title of the post</h4> <p>Description of the post. This is required. user could add image (it will appear in a symbol or icon telling that the user added an image)</p> </article>';
    }
}

//work-in-progress feature

//post like func
function likePost(id) {
    var postID = document.getElementById("'" + id + "'");
    if (document.querySelector(".reactLike img").src == "img/likeRed.png") {
        document.querySelector(".reactLike img").src = "img/likeWhite.png";
    }
    else {
        document.querySelector(".reactLike img").src = "img/likeRed.png";
    }
}

function topShow() {
    if (document.querySelector("div .middle-box").scrollTop > 350) {
        document.querySelector("div.backTop").style.transitionDuration = "600ms";
        document.querySelector("div.backTop").style.opacity = "1";
    }
    if (document.querySelector("div .middle-box").scrollTop < 350) {
        document.querySelector("div.backTop").style.transitionDuration = "20ms";
        document.querySelector("div.backTop").style.opacity = "0";
    }

}

function goTop() {
    var position =
        document.querySelector("div .middle-box").scrollTop;
    if (position) {
        window.scrollBy(0, -Math.max(1, Math.floor(position / 10)));
        scrollAnimation = setTimeout("goTop()", 30);
    } else clearTimeout(scrollAnimation);

}