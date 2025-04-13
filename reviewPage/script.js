// for navbar icons states change start code
let menu_icon = document.querySelectorAll('.menu_per_icon');
let menu_resp = document.querySelector('.menu_resp');
console.log(menu_icon);

menu_icon[0].addEventListener("click",()=>{
    menu_icon[0].classList.add('hide');
    menu_icon[1].classList.remove('hide');
    menu_resp.classList.add('menu_resp_show');
   
   
});
menu_icon[1].addEventListener("click",()=>{
    menu_icon[1].classList.add('hide');
    menu_icon[0].classList.remove('hide');
  
    menu_resp.classList.remove('menu_resp_show');
});

// for navbar icons states change end code