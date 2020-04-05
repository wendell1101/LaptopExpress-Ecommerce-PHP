
const btnBuy =  $('*.btn-buy');
btnBuy.on('mouseenter',function(){
    $(this).css({
        background:'rgb(235, 161, 23)',
        color: 'white',
        border: '1px solid #777676',
        transition:'1s ease-in',            
    });    
    $(this).text('Order Now').css({
        transition:'1s',    
    });
})
btnBuy.on('mouseleave',function(){
    $(this).css({
        background:'rgba(230, 226, 226, 0.795)',
        color: 'darkorange',
        border: '1px solid #777676',
        transition:'1s ease-in',
    });
    $(this).text('Buy Now').css({
        transition:'1s',textTransform:'none'    
    });
})
// $('.btn-submit').on('mouseenter', function(){
//     $('.btn-submit').css({
//         background:'rgba(55, 97, 238, 0.863)',
//         color: 'white',
//         border: '1px solid darkblue',              
//     });    
//     $('.btn-submit').text('Order')

// })
// $('.btn-submit').on('mouseleave', function(){
//     $('.btn-submit').css({
//         background:'rgba(230, 226, 226, 0.795) ',
//         color: 'darkblue',
//         border: '1px solid black',
//         transition:'1s ease-in',
//     });
//     $('.btn-submit').text('Submit').css({
//         transition:'2s',textTransform:'none'    
//     });
// })
