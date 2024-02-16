function SendMail() {

    var serverID = "service_s6ubrub";
    var templateID = "template_jqy2lpa";
    

    var fullName = document.getElementById("fullName").value;
    var email_id = document.getElementById("email_id").value;
    var message = document.getElementById("message").value;

    // ------------------------- Field Validation ------------------------

    if (!fullName || !email_id || !message) {
        Swal.fire('Error!', 'Please fill in all fields', 'error');
        return;
    }

    // ------------------------- Email Input Validation ------------------------
    
    var gmailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;

    if (!gmailRegex.test(email_id)) {
        Swal.fire('Error!', 'Please enter a valid Gmail address', 'error');
        return;
    }

    var params = {
        from_name : document.getElementById("fullName").value,
        email_id : document.getElementById("email_id").value,
        message : document.getElementById("message").value
    }

    emailjs.send(serverID, templateID, params).then(function (res) {
        Swal.fire('Success!', 'Your message has been successfully sent to Gmail!', 'success');
        document.getElementById("contact-form").reset();
    }).catch(function (error) {
        Swal.fire('Error!', 'Failed to send email. Please try again later.', 'error');
    });
}