// blog js
let postUl = document.getElementById("post-ul")

let posts;
if(JSON.parse(localStorage.getItem('posts')) ){
    posts = JSON.parse(localStorage.getItem('posts')) 
}else{
    posts =["no posts found"]
}

console.log(posts)

for(i = 0; i < posts.length; i++){
    let li = document.createElement('li')
    li.innerHTML = posts[i]
    postUl.appendChild(li)
    console.log(posts[i])
}