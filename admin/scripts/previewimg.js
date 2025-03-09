
let imgcont = document.getElementById("input-imgpreview");
let imgpreview = document.getElementById("imgpreview");
let imginput = document.getElementById("uploadimg");
imginput.addEventListener("change", function(event) {
    if (event.target.files.length == 0) {
        return;
    }
    imgcont.style.display = "block";
    let tempurl = URL.createObjectURL(event.target.files[0]);
    //imgpreview.removeAttribute("src");
    imgpreview.setAttribute("src", tempurl);

});