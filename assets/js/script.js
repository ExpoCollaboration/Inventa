// Functionality for Every View: Modal View 

const blurElement = document.getElementById("blur-container");

var modal = document.getElementById("modal");

var modalTitle = modal.querySelector(".modal-title");
var modalId = modal.querySelector(".modal-id");
var modalStrand = modal.querySelector(".modal-strand");
var modalRole = modal.querySelector(".modal-role");
var modalImage = modal.querySelector(".modal-image");

function modalShow(cardIndex) {

    blurElement.style.filter = "blur(10px)";
    modal.style.display = "block";

    const jsonDataArray = "./assets/json/aboutStudent.json";
    fetch(jsonDataArray)
        .then(response => response.json())
        .then(jsonDataArray => {
            var selectedData = jsonDataArray[cardIndex]
            modalTitle.innerHTML = selectedData.name;
            modalStrand.innerHTML = selectedData.strand;
            modalId.innerHTML = "<b><i>ID: </i></b>" + selectedData.id;
            modalRole.innerHTML = "<b>Worked on: </b>" + selectedData.role;
            modalImage.src = selectedData.imageUrl;
        });
}

document.addEventListener("click", function () {
    var closeButton = document.querySelector(".modal .btn-close");
    if (closeButton) {
        closeButton.addEventListener("click", closeModal);
    }
});

function closeModal() {
    blurElement.style.filter = "";
    modal.style.display = "none";
}

// BACKTOTOP
function backToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

window.addEventListener('scroll', function() {
    const backButton = document.querySelector('.back-to-Top');
    if (window.scrollY > 0) {
        backButton.style.display = 'block';
    } else {
        backButton.style.display = 'none';
    }
});

// Hide navbar while scrolling
let prevScrollPos = window.scrollY;
    
const navbar = document.getElementById("overlay");

window.onscroll = () => {
    const currentScrollPos = window.scrollY;

    // Check if scrolling down and not in mobile view (viewport width >= 950px)
    if (currentScrollPos > prevScrollPos && window.innerWidth >= 950) {
        navbar.style.top = "-150px";
    } else {
        navbar.style.top = "0";
    }

    prevScrollPos = currentScrollPos;
};

// Side bar
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0%";
}

document.addEventListener("DOMContentLoaded", () => {
    if(window.innerWidth <= 950) {
        const navList = document.getElementById("nav-ul");

        navList.addEventListener("click", () => {
            document.getElementById("mySidenav").style.width = "0%";
        });
    }
});

// Accordion
document.addEventListener("DOMContentLoaded", function() {

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            } 
        });
    }
});

// Adjust the scroll position when clicking on the navigation links
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const sectionID = this.getAttribute('href');
        const section = document.querySelector(sectionID);

        let headerOffset = document.querySelector('header').offsetHeight;
        let aosOffset = 85.5;

        if (window.innerWidth < 950) {
            headerOffset = 0;
        }
        if (section) {
            const offsetTop = section.getBoundingClientRect().top + window.scrollY;
            window.scrollTo({
                top: offsetTop - headerOffset - aosOffset,
                behavior: 'smooth'
            });
        }
    });
});

// Checking if the user changing the width by inspecting: Mobile to deskopt mode
let isMobile = window.innerWidth <= 950;
let hasReloaded = false;

window.addEventListener('resize', reloadPageOnResize);

function reloadPageOnResize() {
    const newIsMobile = window.innerWidth <= 950;

    if (isMobile !== newIsMobile && !hasReloaded) {
        location.reload();
        hasReloaded = true;
    } else if (isMobile !== newIsMobile) {
        hasReloaded = false;
    }
    isMobile = newIsMobile;
}

reloadPageOnResize();