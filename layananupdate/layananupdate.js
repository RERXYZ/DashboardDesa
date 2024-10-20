// service edit image
const editservicearea = document.getElementById("editservice-area");
const servicelogo = document.getElementById("servicelogo");
const logoserviceview = document.getElementById("logoservice-view");

servicelogo.addEventListener("change", uploadlayananimage);

function uploadlayananimage() {
  let imglink = URL.createObjectURL(servicelogo.files[0]);
  logoserviceview.style.backgroundImage = `url(${imglink})`;
  logoserviceview.textContent = "";
  logoserviceview.style.border = 0;
  logoserviceview.style.boxShadow = "0 2px 10px #83aaab";
}

editservicearea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

editservicearea.addEventListener("drop", function (e) {
  e.preventDefault();
  servicelogo.files = e.dataTransfer.files;
  uploadlayananimage();
});
