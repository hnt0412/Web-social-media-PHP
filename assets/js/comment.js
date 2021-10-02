const viewComment = document.querySelectorAll('.view__comment-content');

for(let i = 0 ;i < viewComment.length; i++){
    let postId     = viewComment[i].id;
    const viewList = document.querySelector(`.view__comment${postId}`);
    const url = "http://localhost/KIWI/api/comment/viewComment.php?post_comment_id="+postId;
    let body  = '';
    fetch(url)
    .then(res  => res.json())
    .then(data => {
        data.forEach(comment =>{
            body += `<div class="comment__view-div comment_view-div${postId}">
                    <div class="user__comment user__comment${postId}">
                    <img src="${comment.img_user}" alt="" class="user__comment-img user__comment-img${postId}">
                    <div class="user__comment-user user__comment-user${postId}">${comment.comment_by}</div>
                    </div>
                    <div class="view__comment-content-div  view__comment-content-div${postId}">
                    <div class="view__comment-content view__comment-content${postId}" id="">${comment.content}</div>
                    </div>
                    </div>`;
        });
        viewList.innerHTML = body;
    })
}
const formComment = document.querySelectorAll('.form__comment');
for(let i = 0; i < formComment.length; i++){
    formComment[i].addEventListener('submit',(e) => {
        e.preventDefault();
    let postId          = formComment[i].id;
    const valueUsername = document.querySelector(`.value_username${postId}`);
    const valuePostId   = document.querySelector(`.value_post-id${postId}`);
    const valueUserId   = document.querySelector(`.value_user-id${postId}`);
    let commentContent  = document.querySelector(`.comment__content${postId}`);
    const getUser       = document.querySelector('.get__user-comment').id;
    const getImg        = document.querySelector('.get__img-comment').id;
    const viewList      = document.querySelector(`.view__comment${postId}`);
        let body ='';
        fetch("http://localhost/KIWI/api/comment/addComment.php",{
        method:'POST',
        headers:{
            'content-Type' : 'application/json'
        },
        body:JSON.stringify({
            content:commentContent.value,
            post_id:valuePostId.id,
            comment_by:getUser,
            user_id:valueUserId.id,
            img_user:getImg
        })
        })
        .then(res  => res.json())
        .then(data => {
            data.forEach(comment =>{
                body += `<div class="comment__view-div comment__view-div${postId}">
                        <div class="user__comment user__comment${postId}">
                        <img src="${comment.img_user}" alt="" class="user__comment-img user__comment-img${postId}">
                        <div class="user__comment-user user__comment-user${postId}">${comment.comment_by}</div>
                        </div>
                        <div class="view__comment-content-div view__comment-content-div${postId}">
                        <div class="view__comment-content view__comment-content${postId}" id="<?php echo $post_id ?>">${comment.content}</div>
                        </div>
                        </div>`;            
                    });
            viewList.innerHTML = body;
        })

        })
}

const getUser     = document.querySelector('.get__user-comment').id;
const getImg      = document.querySelector('.get__img-comment').id;
const userComment = document.querySelectorAll('.user__comment-user');
const userImg     = document.querySelectorAll('.user__comment-img');
for(let i = 0; i < userComment.length;i++){
    userComment[i].textContent = getUser;
    userImg[i].src             = getImg;
}




// const content   = document.querySelector(`.comment__content${contentId}`);
// console.log(content);





 