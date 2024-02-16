// Function that modal open
function openModal() {

    
    const modal = document.getElementById("modal");
    modal.style.display = "block";
    blurElement.style.filter = "blur(6px)";
}

function closeModal() {
    const modal = document.getElementById("modal");

    modal.style.display = "none";
    blurElement.style.filter = "";
}