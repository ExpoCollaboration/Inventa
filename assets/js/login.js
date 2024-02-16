function loginValidation() {

    const adminUsername = "admin";
    const adminPassword = "admin123";

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if(!username && !password) {
        Swal.fire('Blank!', 'Please fill in all fields', 'info');
    } else if(username === adminUsername && password === adminPassword) {
        // Going to the dashboard activity
        // Swal.fire('Success!', 'Prossesing to the next page...', 'success');
        window.location.href = "http://localhost/AdminPanel/index.php"; 
        document.getElementById("login-form").reset();
    } else {
        // Need to improve design...
        Swal.fire('Incorrect!', 'Wrong username or password', 'error');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    
    const passwordInput = document.getElementById("password");
    const togglePassword = document.querySelector(".toggle-password");

    togglePassword.addEventListener("click", function () {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        this.querySelector("i").classList.toggle("fa-eye");
        this.querySelector("i").classList.toggle("fa-eye-slash");
    });
});