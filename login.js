const toast = document.querySelector(".toast");
const closeicon = document.querySelector(".close");
const progress = document.querySelector(".progress");

setTimeout(() =>{
    toast.style.display = "none";
}, 5000);

closeicon.addEventListener("click", function() {
    toast.style.display = "none";
});