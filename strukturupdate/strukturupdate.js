// gallery add image
const editstrukturarea = document.getElementById("editstruktur-area");
const strukturgambar = document.getElementById("strukturgambar");
const gambarstrukturview = document.getElementById("gambarstruktur-view");

strukturgambar.addEventListener("change", uploadstrukturimage);

function uploadstrukturimage() {
  let imglink = URL.createObjectURL(strukturgambar.files[0]);
  gambarstrukturview.style.backgroundImage = `url(${imglink})`;
}

editstrukturarea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

editstrukturarea.addEventListener("drop", function (e) {
  e.preventDefault();
  strukturgambar.files = e.dataTransfer.files;
  uploadstrukturimage()
});