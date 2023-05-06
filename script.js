function validateForm() {
    var name = document.forms["enquiryForm"]["name"].value;
    var email = document.forms["enquiryForm"]["email"].value;
    var mobile = document.forms["enquiryForm"]["mobile"].value;
    var education = document.forms["enquiryForm"]["education"].value;
    var message = document.forms["enquiryForm"]["message"].value;

    // Validating the email format using regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Validating the phone number length and characters using regular expression
    var mobileRegex = /^[0-9]{10}$/;
    if (!mobileRegex.test(mobile)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
    }

    // Validation for other fields can be added here if required

    return true;
}