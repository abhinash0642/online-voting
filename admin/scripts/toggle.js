let hideshowbtn = document.getElementById('dotprofilemenu');
console.log(hideshowbtn);
let dropdownnav = document.getElementById('dropdown');

hideshowbtn.addEventListener("click", function() {
  
    let check = dropdownnav.getAttribute('class');
    console.log(check);
   
    if (check == "check") {
        dropdownnav.setAttribute('class','active');
    }
    else{

        dropdownnav.setAttribute('class','check');
    }
})