
const openSlide = $('#open-slide');
const closeSlide = $('#close-slide');
const sideNav = $('#side-nav');
const li = $('#list li');
const btnReadmoreAll = $('*#btn-readmore');
const btnReadmore = $('#btn-readmore');


//hamburger Toggle

openSlide.on('click',function(){
    sideNav.animate({
        left:'0',transition:'2s ease'
    });
    openSlide.css('opacity','0');
});
closeSlide.on('click',function(){
    sideNav.animate({
        left:'-250px',transition:'2s easein '
    });
    openSlide.css('opacity','1');
});
//btn -hover
btnReadmoreAll.on('mouseenter',function(){   
    $(this).css({
        background:'rgba(251, 179, 45,.9)',
        color: 'white',
        border: '1px solid white',              
    });    
    $(this).text('Go to shop').css({
        transition:'1s',    
    });
    
    // $(this).hoverwords({ delay:50 });
    $(this).siblings().text('Readmore');
});
btnReadmoreAll.on('mouseleave',function(){
  
    $(this).css({
        background:'rgba(230, 226, 226, 0.795) ',
        color: 'darkorange',
        border: '1px solid black',
        transition:'1s ease-in',
    });
    $(this).text('Readmore').css({
        transition:'1s',textTransform:'none'    
    });
   
    $(this).siblings().text('Readmore')
});
//btn about
const btnAbout = $('.btn-about');
btnAbout.on('mouseenter',function(){
    btnAbout.css({
        background:'rgb(235, 161, 23)',
        color: 'white',
        border: '1px solid #777676',
        transition:'1s ease-in',
    });
    btnAbout.text('Go to About'); 
});
btnAbout.on('mouseleave',function(){
    btnAbout.css({
        background:'rgba(230, 226, 226, 0.795)',
        color: 'darkorange',
        border: '1px solid #777676',
        transition:'1s ease-in',
    });
    btnAbout.text('View More'); 
});
//btn contact
const btnContact = $('#btn-contact');
btnContact.on('mouseenter',function(){
    btnContact.css({
        background:'rgb(235, 161, 23)',
        color: 'white',
        zIndex:'100',
        border: '1px solid darkblue',
        transition:'1s ease-in',
    });
    btnContact.text('Go to Contact'); 
});
btnContact.on('mouseleave',function(){
    btnContact.css({
        background:'rgba(230, 226, 226, 0.795) ',
        color: 'darkorange',
        border: '1px solid black',
        transition:'1s ease-in',
    });
    btnContact.text('View More'); 
});
//contact-title

//active list
$(document).on('click','li',function(){
    $(this).addClass('active').siblings().removeClass('active');
});
$(document).on('click','#side-list li',function(){
    $(this).addClass('active2').siblings().removeClass('active2');
});

$(document).on('click','#footer-links li',function(){
    $(this).addClass('active').siblings().removeClass('active');
});
//fixed nav
$(window).on('scroll',function(){
    var pos =$(window).scrollTop();
    if(pos >=200){
        $('#nav').addClass('sticky');
        $('#nav').css('background','rgb(243, 243, 243 )');
    }else{
        $('#nav').removeClass('sticky');
    }
});
//back to top icon
const toTop = $('#backtotop-icon');
toTop.hide();
$(window).on('scroll',function(){
    var pos =$(window).scrollTop();
    if(pos >300){
        toTop.fadeIn();
    }else{
        toTop.fadeOut();
    }
});
toTop.on('click',function(){
    $('html, body'  ).animate({scrollTop:'0'},'500');
});

const profile = $('.profile_container');
const child = $('#child');

profile.on('click',function(){
    child.toggle();
})




