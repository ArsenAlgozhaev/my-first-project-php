window.addEventListener('scroll', function(){
    if (this.scrollY > 45) {
        $('header').addClass('active')
        $('modal-menu').addClass('active')
    } else {
        $('header').removeClass('active')
        $('modal-menu').removeClass('active')
    }
})