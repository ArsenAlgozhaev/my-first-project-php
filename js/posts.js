let category_id = 0
let like = 0
let searchVal = ''
let page = 1


function getPosts(search, page) {
    search = !search ? '' : search
    page = !page ? 1 : page
    $.ajax({
        url: `api/posts/get.php?s=${search}&page=${page}`
    }).done(function(data) {
        data = JSON.parse(data)
        console.log(data)
        setPages(data.totalPages)
        showPosts(data.posts)
    })
}

getPosts(searchVal)

function showPosts(posts) {

    const mainOutput = document.querySelector('.recipe')

    let output = ''

    for (const post of posts) {

        post.cover = !post.cover ? 'image/posts/template.png' : post.cover

        if (category_id == post.category_id) {

            output += `
        <div class="post block">
        <a href="detail.php?pid=${post.id}">
            <img src="${post.cover}" alt="">
        </a>
        <div class="post-recipe">
            <div class="about-posts">
                <div class="likes-posts">${post.likes}<i class="far fa-thumbs-up"></i></div>
                <div class="view-posts">${post.views}<i class="far fa-eye"></i></div>
            </div>
            <a href="detail.php?pid=${post.id}" class="heading-posts">
            ${post.title}
            </a>
            <div class="title-posts">
                <p>
                ${post.description.substring(0, 190)}...
                </p>
            </div>
            <div class="types-food">
                <h3>${post.category}</h3>
            </div>
        </div>
    </div>
    `
        }
        if (category_id == 0) {
            output += `
        <div class="post block">
        <a href="detail.php?pid=${post.id}">
            <img src="${post.cover}" alt="">
        </a>
        <div class="post-recipe">
            <div class="about-posts">
                <div class="likes-posts">${post.likes}<i class="far fa-thumbs-up"></i></div>
                <div class="view-posts">${post.views}<i class="far fa-eye"></i></div>
            </div>
            <a href="detail.php?pid=${post.id}" class="heading-posts">
            ${post.title}
            </a>
            <div class="title-posts">
                <p>
                ${post.description.substring(0, 190)}...
                </p>
            </div>
            <div class="types-food">
                <h3>${post.category}</h3>
            </div>
        </div>
    </div>
    `
        }
    }
    mainOutput.innerHTML = output
}


function addPost(e) {
    e.preventDefault()

    const title = document.querySelector('#addTitle')
    const description = document.querySelector('#addDescription')
    const recipe = document.querySelector('#addRecipe')
    const user = document.querySelector('#addUser')
    const postNum = document.querySelector('#addPostNum')
    const category = document.querySelector('#addCategory')
    const image = document.querySelector('#addImg')

    const fm = new FormData()

    fm.append('title', title.value)
    fm.append('description', description.value)
    fm.append('recipe', recipe.value)
    fm.append('uid', user.value)
    fm.append('postNum', postNum.value)
    fm.append('category', category.value)
    fm.append('post-img', image.files[0])

    $.ajax ({
        url: 'api/posts/save.php',
        method: 'POST',
        contentType: false,
        processData: false,
        data: fm
    }).done(function(data){
        data = JSON.parse(data)
        if (data.sucess) {
            $('.modal-window-new-post').removeClass('active')

            title.value = ''
            description.value = ''
            recipe.value = ''
            category.value = ''

            getPosts(searchVal)
        }
    })
}


getCategories()
function getCategories () {
    $.ajax({
        url: 'api/categories/get.php'
    }).done(function(data){
        data = JSON.parse(data)
        showCategories(data)
    })
}

function showCategories(categories) {

    const mainOutput = document.querySelector('.nav-recipe')

    let output = '<a href="#" onclick="setCategory(0)">All</a>'

    for (const category of categories) {
        output += `<a href="#" onclick="setCategory(${category.id})">${category.category}</a>`
    } 
    mainOutput.innerHTML = output
}

function setCategory(id) {
    category_id = id
    getPosts(searchVal)
}

getMainPost()
function getMainPost() {
    $.ajax({
        url: 'api/posts/get-main.php'
    }).done(function(data){
        data = JSON.parse(data)
        showMainPosts(data)
    })
}

function showMainPosts(mainPosts) {
    const mainOutput = document.querySelector('.top-posts')

    let output = ''

    for (const mainPost of mainPosts) {

        mainPost.cover = !mainPost.cover ? 'image/posts/template.png' : mainPost.cover

        if (category_id == mainPost.category_id) {
            output += `
        <div class="post block">
        <a href="detail.php?pid=${mainPost.id}">
            <img src="${mainPost.cover}" alt="">
        </a>
        <div class="post-recipe">
            <div class="about-posts">
                <div class="likes-posts">${mainPost.likes}<i class="far fa-thumbs-up"></i></div>
                <div class="view-posts">${mainPost.views}<i class="far fa-eye"></i></div>
            </div>
            <a href="detail.php?pid=${mainPost.id}" class="heading-posts">
            ${mainPost.title}
            </a>
            <div class="title-posts">
                <p>
                ${mainPost.description.substring(0, 190)}...
                </p>
            </div>
            <div class="types-food">
                <h3>${mainPost.category}</h3>
            </div>
        </div>
    </div>
    `
        }
        if (category_id == 0) {
            output += `
        <div class="post block">
        <a href="detail.php?pid=${mainPost.id}">
            <img src="${mainPost.cover}" alt="">
        </a>
        <div class="post-recipe">
            <div class="about-posts">
                <div class="likes-posts">${mainPost.likes}<i class="far fa-thumbs-up"></i></div>
                <div class="view-posts">${mainPost.views}<i class="far fa-eye"></i></div>
            </div>
            <a href="detail.php?pid=${mainPost.id}" class="heading-posts">
            ${mainPost.title}
            </a>
            <div class="title-posts">
                <p>
                ${mainPost.description.substring(0, 190)}...
                </p>
            </div>
            <div class="types-food">
                <h3>${mainPost.category}</h3>
            </div>
        </div>
    </div>
    `
        }
    }
    mainOutput.innerHTML = output
}

// function likePost(like) {

//     likes = like

//     $.ajax ({
//         url: 'api/posts/likes.php',
//         method: 'GET',
//         data: {
//             likePost: likes + 1
//         }
//     })
// }

function searchPosts(e) {
    e.preventDefault()
    const search = document.querySelector('#search')
    searchVal = search.value

    getPosts(search.value)
}

function setPages(pages) {
    const all = document.querySelector('#all_pages')
    let output = '' 
    for (let i = 1; i <= pages; i++) {
        output += `<li onclick="showNext(${i})">
                       <a href="#">${i}</a> 
                   </li>`
    }
    all.innerHTML = output 
}

function showNext(page) {
    getPosts(searchVal, page)
}