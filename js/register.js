
const registerForm = $('.register');
const loginForm = $('.login-form');



// window.addEventListener('click', clearModal);

// function clearModal(e){
//    if(e.target === registerForm){
//       loginForm.style.display='none';
//    }
  
// }
const btnExit1 = $('#btn-exit');
const btnExit2 = $('#btn-exit2');

btnExit1.on('click',function(){
   registerForm.hide();
})
btnExit2.on('click',function(){
   loginForm.hide();
})