
const iconClick = document.querySelector('.icon__link-click');
const changeSetting = document.querySelector('.change');

iconClick.addEventListener('click', function(){
    if(changeSetting.classList.contains('hidden')){
        changeSetting.classList.remove('hidden');
    }else if(!changeSetting.classList.contains('hidden')){
        changeSetting.classList.add('hidden');
    }
})



const changeTimeLine = document.querySelectorAll('.click__update');

console.log(changeTimeLine)
console.log(changeTimeLine.length)
for(let i = 0; i < changeTimeLine.length ;i++){
    changeTimeLine[i].addEventListener('click', function(e){
        e.preventDefault();
        let postId     = changeTimeLine[i].id;
        let changePost = document.querySelector(`.change__post-${postId}`);
        if(changePost.classList.contains('hidden')){
            changePost.classList.remove('hidden');
            
        }else if(!changePost.classList.contains('hidden')){
            changePost.classList.add('hidden');
        }
  })

}

const updatePost = document.querySelectorAll('.change__update-post');
const background = document.querySelector('.background__post');
console.log(background)
for(let i = 0; i < updatePost.length; i++){
    let postId     = updatePost[i].id;
    let postSubmit = document.querySelector(`.update__post${postId}`);
updatePost[i].addEventListener('click', function(e){
if(postSubmit.classList.contains('hidden')){
    e.preventDefault();
     postSubmit.classList.remove('hidden');
     background.classList.remove('hidden');

    
}
});
}

    
const closePost = document.querySelectorAll('.close__post-update');
console.log(closePost)
for(let j = 0 ; j < closePost.length; j++){
    // console.log(closePost[j])
    let postId2     = closePost[j].id;
    // console.log(postId2)
    let postSubmit2 = document.querySelector(`.update__post${postId2}`);
    console.log(postSubmit2)
    closePost[j].addEventListener("click", function(e){
        e.preventDefault();
     postSubmit2.classList.add("hidden");
     background.classList.add('hidden');
      
    });
}

function changeImg(fileInput){
    if(fileInput.files && fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function (e){
              $('#img__update-post').attr('src', e.target.result);
              reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

const commentClick = document.querySelectorAll('.likes-2');
console.log(commentClick)
for(let i = 0; i < commentClick.length; i++){
    commentClick[i].addEventListener('click', function(e){
        e.preventDefault();
        let idComment = commentClick[i].id;
        const comment = document.querySelector(`.comment${idComment}`);
        if(comment.classList.contains('hidden')){
            comment.classList.remove('hidden');
        }else if(!comment.classList.contains('hidden')){
            comment.classList.add('hidden');
        }
    })
}




