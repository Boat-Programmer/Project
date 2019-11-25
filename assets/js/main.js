// Function navbar 
$(window).scroll(function(){
    var scrollTop = $(this).scrollTop(); //! 
    if (scrollTop > 1){
        $('#navbar').css('padding','5px 25px') 
    } else {
        $('#navbar').css('padding','25px')
    }
})


$('.to-top').click(function (){
    $('html, body').animate({scrollTop: '0px'}, 800);
})