//add fictional posts on middle box
function postsGen() {
    var num = 15;
    for (let i = 0; i < num; i++) {
        document.querySelector("div .middle-box").innerHTML += '<article class="postArticle" id="i' + i + '"> <div class="userInfo"><img class="post UserPic" src="https://e7.pngegg.com/pngimages/753/432/png-clipart-user-profile-2018-in-sight-user-conference-expo-business-default-business-angle-service-thumbnail.png" alt="User Profile Picture"> <p>@usertag</p> <div class="react"><div class="reactLike" id="i' + i + '" onclick="likePost(' + i + ');"><img src="https://images.emojiterra.com/twitter/v14.0/512px/1f90d.png" alt="Like Button"></div></div> </div> <h4>Title of the post</h4> <p class="descPost">Description of the post. This is required. user could add image (it will appear in a symbol or icon telling that the user added an image)</p> </article>';
    }
}

//work-in-progress feature

//post like func
function likePost(id) {
    const image = document.querySelector("div#i" + id + ".reactLike img");
    const src = image.src;

    // Check if the src attribute ends with the specified image file names
    if (src.endsWith("img/likeRed.png")) {
        image.src = "img/likeWhite.png";
    } else {
        image.src = "img/likeRed.png";
    }
}



/*function topShow() {
    if (document.querySelector("div .middle-box").scrollTop > 350) {
        document.querySelector("div.backTop").style.opacity = "1";
    }
    if (document.querySelector("div .middle-box").scrollTop < 350) {
        document.querySelector("div.backTop").style.opacity = "0";
    }

}*/

/*function goTop(){
    document.querySelector("body").animate({scrollTop: 0}, "slow");
}*/