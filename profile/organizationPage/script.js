let menu_icon = document.querySelectorAll('.menu_per_icon');
let menu_resp = document.querySelector('.menu_resp');
// console.log(menu_icon);

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


//update and delete record 

function update() {
    const record = document.querySelector('.record'); 
    record.style.setProperty('display', 'flex', 'important');
}

function deleteAccount() {
    const deleteRecord = document.querySelector('.deleteRecord'); 
    deleteRecord.style.setProperty('display', 'flex', 'important');
}


 
function hide(){
    record = document.querySelector('.record');
    record.style.setProperty('display', 'none', 'important');

    deleteRecord = document.querySelector('.deleteRecord');
    deleteRecord.style.setProperty('display', 'none', 'important');

}




//showing further fields according to selection by user which data 

const data = document.querySelector('#data');
data.addEventListener("change", () => {
    const inner = document.querySelector('#inner');
    // Clear the previous content
    inner.innerHTML = ''; 

    const value = data.value;
      // Initialize input field as empty
    let inputField = ''; 
  

    switch (value) {
        case '1': {
        // first Name
            inputField = `<input type="text" name="fname" class="mt-3 py-3 px-2 rounded-2 fw-bold text-black-50 w-100" placeholder="Enter First Name" required />`;
            break;
        }
        case '2': {
         // Second Name
         inputField = `<input type="text" name="sname" class="mt-3 py-3 px-2 rounded-2 fw-bold text-black-50 w-100" placeholder="Enter Second Name" required />`;
         break;
        }

        case '3': {
        // Email
        inputField = `<input type="email" name="email" class="mt-3 py-3 px-2 rounded-2 fw-bold text-black-50 w-100" placeholder="Enter Email" required />`;
        break;
        }
        case '4': {
       // Password
       inputField = `<input type="password" name="password" class="mt-3 py-3 px-2 rounded-2 fw-bold text-black-50 w-100" placeholder="Enter Password" required />`;
       break;
        }
        case '5': {
        // First Phone
        inputField = `<input type="tel" placeholder="First Phone Number..." name="fphone"  class="w-100 mt-3 py-3 px-2 mb-3 rounded-2 fw-bold" maxlength="11" pattern="[0-9]{11}" required>`;
        break;
        }
        case '6': {
        // Second Phone
        inputField = `<input type="tel" placeholder="Second Phone Number..." name="sphone"  class="w-100 mt-3 py-3 px-2 mb-3 rounded-2 fw-bold" maxlength="11" pattern="[0-9]{11}" required>`;
        break;
        }
        case '7': {
            // Second Phone
            inputField = `<input type="text" placeholder="Province..." name="province"  class="w-100 mt-3 py-3 px-2 mb-3 rounded-2 fw-bold" required>`;
            break;
        }
        case '8': {
            // Second Phone
            inputField = `<input type="text" placeholder="City..." name="city"  class="w-100 mt-3 py-3 px-2 mb-3 rounded-2 fw-bold" required>`;
            break;
            }
    
        default:{
            inputField = ''; 
        }
    }
     // Adding input field to the container
    inner.innerHTML = inputField;
});
