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



//second section code 

// Get elements by their ids
let missionBtn = document.getElementById('mission');
let visionBtn = document.getElementById('vision');
let goalBtn = document.getElementById('goal');
let para = document.getElementById('para');

// Add event listeners to each button
missionBtn.addEventListener('click', function() {
    para.textContent = 'Our mission is to empower individuals and communities through the power of donation, supporting vital causes like education, healthcare, and disaster relief. Together, we strive to create a positive impact and build a better, more compassionate world..';
});

visionBtn.addEventListener('click', function() {
    para.textContent = 'Our vision is a world where every individual has access to the opportunities and resources they need to thrive. We envision a global community driven by compassion, where together we can create lasting positive change and ensure a brighter future for all.';
});

goalBtn.addEventListener('click', function() {
    para.textContent = 'Our goal is to create lasting change by empowering individuals and communities through strategic donations. We aim to provide critical resources to those in need, foster education, and support sustainable development to build a brighter, more equitable future for all.';
});
