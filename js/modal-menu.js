function modalMenu(btn) {
    btn.classList.toggle("change");
    
    if ($(btn).hasClass('change')) {
        $('.header.modal').addClass('open')
        $('.modal-menu').addClass('open')
    } else {
        $('.header.modal').removeClass('open')
        $('.modal-menu').removeClass('open')
    }
}


// user menu

$('.user-menu').click(function() {
    if ($('.user-menu').hasClass('change')) {
        $('.profile-nav').addClass('active')
        $('.user-menu').removeClass('change')
        $('.user-menu').addClass('active')
    } else {
        $('.user-menu').addClass('change')
        $('.user-menu').removeClass('active')
        $('.profile-nav').removeClass('active')
    }
})



// login-modal

$('.log-in').click(function() {
    $('.modal-window-log-in').addClass('active')
})

$('#close-btn-modal').click(function() {
    $('.modal-window-log-in').removeClass('active')
})



// register-modal

$('.btn-open-register').click(function() {
    $('.modal-window-log-in').removeClass('active')
    $('.modal-window-register').addClass('active')
})

$('#close-btn-modal-register').click(function() {
    $('.modal-window-register').removeClass('active')
})



// add new post modal

$('.btn-open-new-post').click(function() {
    $('.modal-window-new-post').addClass('active')
})

$('#close-btn-modal-new-post').click(function() {
    $('.modal-window-new-post').removeClass('active')
})


// edit post modal

$('#close-btn-modal-edit-post').click(function() {
    $('.modal-window-edit-post').removeClass('active')
})



// subscribe

$('#btn-open-subscribe').click(function() {
    $('.modal-window-subscribe').addClass('active')
})

$('#close-btn-modal-subscribe').click(function() {
    $('.modal-window-subscribe').removeClass('active')
})


// 


$('.likes-posts').click(function() {
    $('.likes-posts').addClass('active')
    $('.dislikes-posts').addClass('active')
    console.log("123")
})

$('.dislikes-posts').click(function() {
    $('.likes-posts').removeClass('active')
    $('.dislikes-posts').removeClass('active')
})