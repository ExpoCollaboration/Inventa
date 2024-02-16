var i = 0;
var txt1 = "Your Partner in Small Business Growth";
const speed = 75;

function Write() {
    if(i < txt1.length) {
        document.getElementById("typer").innerHTML += txt1.charAt(i);
        i++;
        setTimeout(Write, speed);
    }
}

var e = 0;
var txt2 = "A Transaction Processing System & Stock Control Web Application for JM2DG Culinary Solutions.";
var speed2 = 80;

function Write2() {
    if(e < txt2.length) {
        document.getElementById("typer2").innerHTML += txt2.charAt(e);
        e++;
        setTimeout(Write2, speed2);
    }
}

window.onload = function () {
    Write();
    Write2();
}