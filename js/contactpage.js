
$(document).ready(function(){
    $('.next').on('click', function(){
      var currentImg = $('.active-img');
      var nextImg = currentImg.next();
      var currentDetails = $('.active-details')
      var nextDetails = currentDetails.next();
  
      if(nextImg.length && nextDetails.length){
        currentImg.removeClass('active-img').css('z-index', -10);
        nextImg.addClass('active-img').css('z-index', 10);
        currentDetails.removeClass('active-details').css('z-index', -10);
        nextDetails.addClass('active-details').css('z-index', 10);
      }
      
        
  
      
    });
  
    $('.prev').on('click', function(){
      var currentImg = $('.active-img');
      var prevImg = currentImg.prev();
      var currentDetails = $('.active-details')
      var prevDetails = currentDetails.prev();
     
  
      if(prevImg.length && currentDetails.length){
        currentImg.removeClass('active-img').css('z-index', -10);
        prevImg.addClass('active-img').css('z-index', 10);
        currentDetails.removeClass('active-details').css('z-index', -10);
        prevDetails.addClass('active-details').css('z-index', 10);
      }
      
  
      
  
    });
  });
  