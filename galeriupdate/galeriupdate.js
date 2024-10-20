// gallery add image
const editgaleriarea = document.getElementById("editgaleri-area");
const galerigambar = document.getElementById("galerigambar");
const gambargaleriview = document.getElementById("gambargaleri-view");

galerigambar.addEventListener("change", uploadgaleriimage);

function uploadgaleriimage() {
  let imglink = URL.createObjectURL(galerigambar.files[0]);
  gambargaleriview.style.backgroundImage = `url(${imglink})`;
  gambargaleriview.textContent = "";
  gambargaleriview.style.border = 0;
}

editgaleriarea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

editgaleriarea.addEventListener("drop", function (e) {
  e.preventDefault();
  galerigambar.files = e.dataTransfer.files;
  uploadgaleriimage()
});