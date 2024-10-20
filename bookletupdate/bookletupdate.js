// booklet add image
const editbookletarea = document.getElementById("editbooklet-area");
const bookletgambar = document.getElementById("bookletgambar");
const gambarbookletview = document.getElementById("gambarbooklet-view");

bookletgambar.addEventListener("change", uploadbookletimage);

function uploadbookletimage() {
  let imglink = URL.createObjectURL(bookletgambar.files[0]);
  gambarbookletview.style.backgroundImage = `url(${imglink})`;
  gambarbookletview.textContent = "";
  gambarbookletview.style.border = 0;
  gambarbookletview.style.boxShadow = "2px 2px 5px #83aaab";
}

editbookletarea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

editbookletarea.addEventListener("drop", function (e) {
  e.preventDefault();
  bookletgambar.files = e.dataTransfer.files;
  uploadbookletimage();
});

//booklet add file
const editbookletfilearea = document.getElementById("editbookletfile-area");
const bookletfile = document.getElementById("bookletfile");
const filebookletview = document.getElementById("filebooklet-view");

bookletfile.addEventListener("change", uploadbookletfile);

function uploadbookletfile() {
  filebookletview.style.fontSize = '13px';
  filebookletview.style.fontWeight = '500';
  
  if(bookletfile.files.length > 0){
    let fileName = bookletfile.files[0].name;
    filebookletview.innerHTML = fileName;
  } else{
    filebookletview.innerHTML = 'Unggah file disini';
  }
}