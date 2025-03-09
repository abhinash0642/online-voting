





//menu hover effect

let list= document.querySelectorAll('.navigation li');
function activelink(){
  list.forEach((item)=>
  item.classList.remove('hovered'));
  this.classList.add('hovered');
}
list.forEach((item)=>
item.addEventListener('mouseover',activelink));


// // sidebar toggle

let toggle= document.querySelector('.toggle');
let navigation= document.querySelector('.navigation');
let main= document.querySelector('.main');

toggle.onclick= function(){
  navigation.classList.toggle("active");
  main.classList.toggle("active");
}


// // Success / error message

var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function()
    { div.style.display = "none"; 
      
    }, 300);
  }
}


// Image Preview







    