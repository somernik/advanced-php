function validateForm() {
    var terms = document.getElementById("terms");
    if (!terms.checked) {
        var label = document.getElementById("termsCheck");
        label.className += " text-danger";
        //alert("fe");
        return false;
    } else {
        var passwordField = document.getElementById("password");
        if (passwordField.value.length == 0) {
            document.getElementById("form").action = "whatNoPassword.php";
        }
        return true;
    }
}
