// blog edit image
const editblogarea = document.getElementById("editblog-area");
const bloggambar = document.getElementById("bloggambar");
const gambarblogview = document.getElementById("gambarblog-view");

bloggambar.addEventListener("change", uploadblogimage);

function uploadblogimage() {
  let imglink = URL.createObjectURL(bloggambar.files[0]);
  gambarblogview.style.backgroundImage = `url(${imglink})`;
  gambarblogview.textContent = "";
  gambarblogview.style.border = 0;
  gambarblogview.style.boxShadow = "0 2px 10px #83aaab";
}

editblogarea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

editblogarea.addEventListener("drop", function (e) {
  e.preventDefault();
  bloggambar.files = e.dataTransfer.files;
  uploadblogimage()
});