console.log("Hello World!");
let nav = document.querySelectorAll(".navbar ul li");
let section = document.querySelectorAll(".section");

for (let i = 0; i < nav.length; i++) {
  nav[i].addEventListener("click", function () {
    nav.forEach(function (li) {
      li.classList.remove("active");
    });
    this.classList.add("active");
    var navvalue = this.getAttribute("data-li");
    section.forEach(function (item) {
      item.style.display = "none";
    });
    if (navvalue == "beranda") {
      document.querySelector("." + navvalue).style.display = "flex";
    } else if (navvalue == "service") {
      document.querySelector("." + navvalue).style.display = "flex";
    } else if (navvalue == "gallery") {
      document.querySelector("." + navvalue).style.display = "flex";
    } else if (navvalue == "struktur") {
      document.querySelector("." + navvalue).style.display = "flex";
    } else if (navvalue == "booklet") {
      document.querySelector("." + navvalue).style.display = "flex";
    } else if (navvalue == "blog") {
      document.querySelector("." + navvalue).style.display = "flex";
    } else {
      console.log("");
    }
  });
}

// navbar
let hamburger = document.querySelector('#iconnav');
let navbar = document.querySelector('nav');
let navscroll = document.querySelectorAll('.content');

hamburger.onclick = (testes) => {
  navbar.classList.toggle('navopen');
  testes.stopPropagation();
}

navbar.onclick = () => {
  navbar.classList.remove('navopen');
}

navscroll.forEach(function (nscroll) {
  nscroll.onscroll = () => {
    navbar.classList.remove('navopen');
  }
});


// edit btn service
let dotservices = document.querySelectorAll('#dotservice');
let serviceactions = document.querySelectorAll('#serviceaction');

let openservice = -1;

// Loop melalui elemen-elemen dan tambahkan event listener
dotservices.forEach((dotservice, index) => {
  dotservice.addEventListener('click', function (event) {
    if (openservice !== -1) {
      serviceactions[openservice].classList.toggle('serviceactive'); // Menonaktifkan kelas "serviceactive" pada elemen sebelumnya
    }
    serviceactions[index].classList.toggle('serviceactive'); // Mengaktifkan/menonaktifkan kelas "galeriactive" pada elemen yang terkait
    openservice = index; // Menandai indeks yang terbuka saat ini

    // Mencegah event klik global dari bekerja
    event.stopPropagation();
  });
});

//service add div
const serviceaddbtn = document.querySelector('#serviceaddbtn');
const newservice = document.querySelector('.newservice');
const addcontent = document.querySelector('.addcontent');

serviceaddbtn.addEventListener('click', function (e) {
  e.stopPropagation(); // Hentikan penyebaran event
  newservice.style.display = 'flex';
});

document.addEventListener('click', function (e) {
  // Tutup newservice jika klik dilakukan di luar elemen newservice
  if (!addcontent.contains(e.target)) {
    newservice.style.display = 'none';
  }
});

// service add image
const addservicearea = document.getElementById("addservice-area");
const servicelogo = document.getElementById("servicelogo");
const logoserviceview = document.getElementById("logoservice-view");

servicelogo.addEventListener("change", uploadserviceimage);

function uploadserviceimage() {
  let imglink = URL.createObjectURL(servicelogo.files[0]);
  logoserviceview.style.backgroundImage = `url(${imglink})`;
  logoserviceview.textContent = "";
  logoserviceview.style.border = 0;
  logoserviceview.style.boxShadow = "0 2px 10px #83aaab";
}

addservicearea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

addservicearea.addEventListener("drop", function (e) {
  e.preventDefault();
  servicelogo.files = e.dataTransfer.files;
  uploadserviceimage();
});

document.addEventListener("DOMContentLoaded", function () {
  const serviceContentFullElements = document.querySelectorAll(".servicecontentfull");
  const serviceContentInElements = document.querySelectorAll(".servicecontentin");
  const serviceContentIsiElements = document.querySelectorAll(".servicecontentisi");

  serviceContentInElements.forEach((element, index) => {
    element.addEventListener("click", function (event) {
      event.preventDefault();
      const serviceContentFull = serviceContentFullElements[index];

      serviceContentFull.style.display = "flex";
      event.stopPropagation();
    });
  });

  document.addEventListener("click", function (e) {
    for (let i = 0; i < serviceContentFullElements.length; i++) {
      const serviceContentFull = serviceContentFullElements[i];
      const serviceContentIsi = serviceContentIsiElements[i];
      if (!serviceContentIsi.contains(e.target)) {
        serviceContentFull.style.display = "none";
      }
    }
  });
});

// edit btn galeri
let dotgaleris = document.querySelectorAll('#dotgaleri');
let galerieditbtns = document.querySelectorAll('#galerieditbtn');

let opengaleri = -1;

// Loop melalui elemen-elemen dan tambahkan event listener
dotgaleris.forEach((dotgaleri, index) => {
  dotgaleri.addEventListener('click', function (event) {
    if (opengaleri !== -1) {
      galerieditbtns[opengaleri].classList.toggle('galeriactive'); // Menonaktifkan kelas "galeriactive" pada elemen sebelumnya
    }
    galerieditbtns[index].classList.toggle('galeriactive'); // Mengaktifkan/menonaktifkan kelas "galeriactive" pada elemen yang terkait
    opengaleri = index; // Menandai indeks yang terbuka saat ini

    // Mencegah event klik global dari bekerja
    event.stopPropagation();
  });
});

//booklet add div
const bookletaddbtn = document.querySelector('#bookletaddbtn');
const newbooklet = document.querySelector('.newbooklet');
const addbookletcontent = document.querySelector('.addbookletcontent');

bookletaddbtn.addEventListener('click', function (e) {
  e.stopPropagation(); // Hentikan penyebaran event
  newbooklet.style.display = 'flex';
});

document.addEventListener('click', function (e) {
  // Tutup newbooklet jika klik dilakukan di luar elemen newbooklet
  if (!addbookletcontent.contains(e.target)) {
    newbooklet.style.display = 'none';
  }
});

// booklet add image
const addbookletarea = document.getElementById("addbooklet-area");
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

addbookletarea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

addbookletarea.addEventListener("drop", function (e) {
  e.preventDefault();
  bookletgambar.files = e.dataTransfer.files;
  uploadbookletimage();
});

//booklet add file
const addbookletfilearea = document.getElementById("addbookletfile-area");
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

//edit btn booklet
let dotbooklets = document.querySelectorAll('#dotbooklet');
let bookletactions = document.querySelectorAll('#bookletaction');

let openbooklet = -1;

// Loop melalui elemen-elemen dan tambahkan event listener
dotbooklets.forEach((dotbooklet, index) => {
  dotbooklet.addEventListener('click', function (event) {
    if (openbooklet !== -1) {
      bookletactions[openbooklet].classList.toggle('bookletactive'); // Menonaktifkan kelas "bookletactive" pada elemen sebelumnya
    }
    bookletactions[index].classList.toggle('bookletactive'); // Mengaktifkan/menonaktifkan kelas "bookletactive" pada elemen yang terkait
    openbooklet = index; // Menandai indeks yang terbuka saat ini

    // Mencegah event klik global dari bekerja
    event.stopPropagation();
  });
});

//edit btn blog
let dotblogs = document.querySelectorAll('#dotblog');
let blogactions = document.querySelectorAll('#blogaction');

let openblog = -1;

// Loop melalui elemen-elemen dan tambahkan event listener
dotblogs.forEach((dotblog, index) => {
  dotblog.addEventListener('click', function (event) {
    if (openblog !== -1) {
      blogactions[openblog].classList.toggle('blogactive'); // Menonaktifkan kelas "bookletactive" pada elemen sebelumnya
    }
    blogactions[index].classList.toggle('blogactive'); // Mengaktifkan/menonaktifkan kelas "bookletactive" pada elemen yang terkait
    openblog = index; // Menandai indeks yang terbuka saat ini

    // Mencegah event klik global dari bekerja
    event.stopPropagation();
  });
});

document.addEventListener('click', function () {
  navscroll.forEach(() => {
    navbar.classList.remove('navopen');
  });

  serviceactions.forEach((btn) => {
    btn.classList.remove('serviceactive');
  });
  openservice = -1; // Reset indeks yang terbuka

  galerieditbtns.forEach((btn) => {
    btn.classList.remove('galeriactive');
  });
  opengaleri = -1; // Reset indeks yang terbuka

  bookletactions.forEach((btn) => {
    btn.classList.remove('bookletactive');
  });
  openbooklet = -1; // Reset indeks yang terbuka

  blogactions.forEach((btn) => {
    btn.classList.remove('blogactive');
  });
  openblog = -1; // Reset indeks yang terbuka
});

function searchblog() {
  let filter = document.getElementById("findblog").value.toUpperCase();
  // let newblog = document.querySelector(".blog-new");

  let items = document.querySelectorAll(".blogcontentout");

  let blogitems = document.querySelectorAll(".blogitem");


  for (let i = 0; i <= blogitems.length; i++) {
    let a = items[i].querySelectorAll(".blogitem")[0];

    let value = a.innerHTML || a.innerText || a.textContent;

    if (value.toUpperCase().indexOf(filter) > -1) {
      items[i].style.display = "";
    } else {
      items[i].style.display = "none";
    }
  }
}

//blog add div
const blogaddbtn = document.querySelector('#blogaddbtn');
const newblog = document.querySelector('.newblog');
const addblogcontent = document.querySelector('.addblogcontent');

blogaddbtn.addEventListener('click', function (e) {
  e.stopPropagation(); // Hentikan penyebaran event
  newblog.style.display = 'flex';
});

document.addEventListener('click', function (e) {
  // Tutup newblog jika klik dilakukan di luar elemen newblog
  if (!addblogcontent.contains(e.target)) {
    newblog.style.display = 'none';
  }
});

// blog add image
const addblogarea = document.getElementById("addblog-area");
const bloggambar = document.getElementById("bloggambar");
const gambarblogview = document.getElementById("gambarblog-view");

bloggambar.addEventListener("change", uploadblogimage);

function uploadblogimage() {
  let imglink = URL.createObjectURL(bloggambar.files[0]);
  gambarblogview.style.backgroundImage = `url(${imglink})`;
  gambarblogview.textContent = "";
  gambarblogview.style.border = 0;
}

addblogarea.addEventListener("dragover", function (e) {
  e.preventDefault();
});

addblogarea.addEventListener("drop", function (e) {
  e.preventDefault();
  bloggambar.files = e.dataTransfer.files;
  uploadblogimage();
});

// struktur swiper
var struktur = new Swiper(".strukturSwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: 1,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: false,
  },
  mousewheel: true,
  navigation: {
    nextEl: ".struktur-box .isi .swiper-button-next",
    prevEl: ".struktur-box .isi .swiper-button-prev",
  },
  keyboard: {
    enabled: true,
  },
});