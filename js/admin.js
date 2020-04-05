
$(document).ready(function(){
    //side panel buttons
    const btnOrder =  $('#side-panel ul #order-btn');
    const btnUser =  $('#side-panel ul #user-btn');
    const btnItems =  $('#side-panel ul #items-btn');
    const userTable = $('#table-users');
    const orderTable = $('#table-orders');
    const userTitle = $('.user-title');
    const orderTitle = $('.order-title');
    const orderDiv = $('#items');
    // orderTable.hide();
    // orderTitle.hide();
    // orderDiv.hide();
    // btnOrder.on('click',function(){
    //     userTable.hide();   
    //     userTitle.hide();
    //     orderTable.fadeIn();
    //     orderTitle.fadeIn();
    //     orderDiv.hide()
    // });
    // btnUser.on('click',function(){
    //     userTable.fadeIn();   
    //     userTitle.fadeIn();
    //     orderTable.hide();
    //     orderTitle.hide();
    //     orderDiv.hide()
    // });
    // btnItems.on('click',function(){
    //     userTable.hide();   
    //     userTitle.hide();
    //     orderTable.hide();
    //     orderTitle.hide();
    //     orderDiv.fadeIn();
    // });

    //side panel active button
   //  $(document).on('click','li',function(){
   //      $(this).addClass('active-btn').siblings().removeClass('active-btn');
   //  });

    //admin button
     const accountBtn = $('#accounts #account-title');
     const dropDown = $('#accounts #account-title ul');
   //   dropDown.hide();
     accountBtn.removeClass('active2');
     accountBtn.on('click',function(){
        dropDown.toggle();
        accountBtn.removeClass('active2');
     });

     const okayBtn = $('#okayBtn');
     const okayModal = $('#deleted-modal');
     const addModal = $('#add-modal');
     const deletedModal =$('#deleted-user-modal');
     const okay =$('#okay');
     okayBtn.on('click',function(){
        okayModal.hide();
        addModal.hide();
        deletedModal.hide();
        $('#order-modal').hide();
     })
     okay.on('click',function(){
         deletedModal.hide();
     })
});