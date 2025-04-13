// for navbar icons states change start code
let menu_icon = document.querySelectorAll('.menu_per_icon');
let menu_resp = document.querySelector('.menu_resp');


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




//login signup div order  change on clicking button 



let login_button = document.querySelector('.col_4_login_button');
let sign_up_button = document.querySelector('.col_4_signup_button');
let login = document.querySelector('.login');
let signUp = document.querySelector('.signUp');
let col_4_login = document.querySelector('.col_4_login');
let col_4_signup = document.querySelector('.col_4_signup');
let col_6_login = document.querySelector('.col_6_login');
let col_6_signup = document.querySelector('.col_6_signup');

// When login button is clicked, move login and sign-up smoothly
login_button.addEventListener("click", () => {
    login.classList.add('login_move_to_end');   // Move login to the right
    signUp.classList.add('signUp_move_to_start'); // Move sign-up to the left

    //text change 
    col_4_login.classList.add('hide');
    col_4_signup.classList.remove('hide');
    col_6_login.classList.remove('hide');
    col_6_signup.classList.add('hide');

    
});

             //if error message of loin have to shown after wrong user enter data so we want that when from php page it move toward main html page it will show login page after reloading 
             window.onload = function() {
                if (not_login == 1) {
                    login.classList.add('login_move_to_end');   // Move login to the right
                    signUp.classList.add('signUp_move_to_start'); // Move sign-up to the left
            
                    // Text change 
                    col_4_login.classList.add('hide');
                    col_4_signup.classList.remove('hide');
                    col_6_login.classList.remove('hide');
                    col_6_signup.classList.add('hide');
                }
            };
            
// When sign-up button is clicked, reset the positions
sign_up_button.addEventListener("click", () => {
    login.classList.remove('login_move_to_end');
    signUp.classList.remove('signUp_move_to_start');

        //text change 
        col_4_login.classList.remove('hide');
        col_4_signup.classList.add('hide');
        col_6_login.classList.add('hide');
        col_6_signup.classList.remove('hide');
});



//showing organinzation address fields if user pick radio button of organization 

let organinzation = document.querySelector('.organization_role');
let donor = document.querySelector('.donor_role');
let organinzation_address = document.querySelector('.organization_address');

organinzation.addEventListener("change",()=>{
        organinzation_address.classList.remove('hide');
    
   
});
donor.addEventListener("change",()=>{
        organinzation_address.classList.add('hide');
   
});


//showing error message throgh sessions storage if ser enter wrong email or password 

// window.onload(
//     <php? ?>
//     if ()
// );

