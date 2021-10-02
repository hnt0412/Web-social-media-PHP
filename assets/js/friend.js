const formFriend = document.querySelectorAll('.form__add-friend');

for(let i = 0; i < formFriend.length;i++  ){
const addFriend  = document.querySelector('.add__friend');
let friendId = addFriend.value;
const nameFriend   = document.querySelector('.value__friend-id').id;
let url = "http://localhost/KIWI/api/friend/add_friend.php/"+friendId;
console.log(nameFriend)
formFriend[i].addEventListener('submit', function(e){
    e.preventDefault();
    fetch(url,{
        method:'POST',
        headers:{
            'content-Type' : 'Application/json'
        },
        body:JSON.stringify({
            user_id:friendId,
            name_friend:nameFriend

        })
    })

})
}