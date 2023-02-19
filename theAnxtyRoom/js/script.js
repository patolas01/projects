//add fictional posts on middle box
function postsGen() {
    var num = 15;
    for (let i = 0; i < num; i++) {
        document.querySelector("div .middle-box").innerHTML += '<article class="postArticle" id="112"> <div class="userInfo"><img class="post UserPic" src="https://e7.pngegg.com/pngimages/753/432/png-clipart-user-profile-2018-in-sight-user-conference-expo-business-default-business-angle-service-thumbnail.png" alt="User Profile Picture"> <p>@usertag</p> <div class="react"><div class="reactLike" onclick="likePost("idPost");"><img src="https://images.emojiterra.com/twitter/v14.0/512px/1f90d.png" alt="Like Button"></div></div> </div> <h4>Title of the post</h4> <p>Description of the post. This is required. user could add image (it will appear in a symbol or icon telling that the user added an image)</p> </article>';
    }
}

//work-in-progress feature

//post like func
function likePost(id){
    var postID = document.getElementById("'"+id+"'");
    if (document.querySelector(".reactLike img").src == "img/likeRed.png") {
        document.querySelector(".reactLike img").src = "img/likeWhite.png";   
    }
    else{
        document.querySelector(".reactLike img").src = "img/likeRed.png";
    }
}