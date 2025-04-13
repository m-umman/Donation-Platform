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




// for easypaisa and debit card showing on radio button state change
let radio = document.querySelectorAll("input[type='radio']");
let debit_card = document.querySelector('.debit_card');
let easypaisa = document.querySelector('.easypaisa');
radio[0].addEventListener("click", () => {

  debit_card.classList.remove('hide');
  easypaisa.classList.add('hide');
  
});

radio[1].addEventListener("click", () => {
 
  easypaisa.classList.remove('hide');
  debit_card.classList.add('hide');
  
});



//recevier show according to user select compagins or organizations 
let organization = document.querySelector('.organization');
let campaigns = document.querySelector('.campaigns');
radio[5].addEventListener("click", ()=>{
  organization.classList.remove('hide');
  campaigns.classList.add('hide');
});
radio[6].addEventListener("click", ()=>{
  campaigns.classList.remove('hide');
  organization.classList.add('hide');
});


//for amount calculation when differenct radio buttons are select 
showing_amount = document.querySelector('#showing_amount');
amount = document.querySelectorAll('.amount_input');
//store total amount from radio and custom input 
total = 0 ;
//last value selected by radio
last_radio_value = 0 ;
count = 0 ; 
//last value selected by custome input 
last_custome_value = 0 ;
count2 = 0 ; 


amount.forEach(element => {
  element.addEventListener("change",()=>{
    value1 = parseInt(element.value) ;
    if (count != 0 ){
      total -= last_radio_value;
    }
    total += value1 ; 
    last_radio_value = value1 ; 
    count++;
    showing_amount.innerText = "$" + total ; 
  });
});
//custome amount
custome_amount = document.querySelector('.custome_amount');

custome_amount.addEventListener("change",()=>{
    value2 = parseInt(custome_amount.value);
    //if user enter negative we will change it to zero
    if(value2<0){
      value2 = 0 ;
    }
  
    //this if condition for removing previuos input 
    if (count2 != 0 ){
      total -= last_custome_value;
    }

    //this if condition check value should not be empty before assigning total 
    //and if not emplty we assign value to last keeping record and if empty then we assign 
    //0 to last value so that at each empty input it not doing minus everytime
      if (value2){
        last_custome_value = value2; 
        total += value2 ; 
      }else {
        last_custome_value = 0 ; 
      }
      count2++;
    showing_amount.innerText = "$" + total ;
  });



