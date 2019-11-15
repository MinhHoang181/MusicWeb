var usernameCheck = false;
var password1Check = false;
var password2Check = false;
var emailCheck = false;
var acceptLawCheck = true;

$("document").ready(function() {

    // Kiem tra username - url: "admin/system/account.php"
    $("#username").on("input", function() {
        var username = $("#username").val();
        var usernameError = $("#usernameError");
        // Cac truong hop loi
        if (username == "") {
            usernameError.removeClass("text-success");
            usernameError.addClass("text-danger");
            usernameError.text("Tài khoản không được để trống");
            usernameCheck = false;
        } else if (username.length < 6) {
            usernameError.removeClass("text-success");
            usernameError.addClass("text-danger");
            usernameError.text("Tài khoản cần ít nhất 6 ký tự");
            usernameCheck = false;
        } else if (username != username.replace(/\s/g, "")) {
            usernameError.removeClass("text-success");
            usernameError.addClass("text-danger");
            usernameError.text("Tài khoản không hợp lệ");
            usernameCheck = false;
        } else { // Kiem tra tai khoan ton tai hay chua
            $.ajax({
                url: "admin/system/account.php",
                type: "POST",
                data: {
                    "username_check": 1,
                    "usernameCheck": username,
                },
                success: function(response) { // Gui request len register.php tra ve ket qua
                    response = $.trim(response);
                    if (response == "taken") {
                        usernameError.removeClass("text-success");
                        usernameError.addClass("text-danger");
                        usernameError.text("Tài khoản đã tồn tại");
                        usernameCheck = false;
                    } else if (response == "not_taken") {
                        usernameError.removeClass("text-danger");
                        usernameError.addClass("text-success");
                        usernameError.text("Tài khoản hợp lệ");  
                        usernameCheck = true;
                    }
                }
            });
        } 
    });

    // Kiem tra password1
    $("#password1").on("input", function() {
        var password1 = $("#password1").val();
        var password1Error = $("#password1Error");
        // Cac truong hop loi
        if (password1 == "") {
            password1Error.text("Mật khẩu không được để trống");
            password1Check = false;
        } else if (password1.length < 6) {
            password1Error.text("Mật khẩu cần ít nhất 6 ký tự");
            password1Check = false;
        } else {
            password1Check = true;
            password1Error.text("");
        }
    });

    // Kiem tra password2
    $("#password2").on("input", function() {
        var password1 = $("#password1").val();
        var password2 = $("#password2").val();
        var password2Error = $("#password2Error");
        // Cac truong hop loi
        if (password2 == "") {
            password2Error.text("Vui lòng xác nhận lại mật khẩu");
            password2Check = false;
        } else if (password2 != password1) {
            password2Error.text("Mật khẩu không khớp");
            password2Check = false;
        } else {
            password2Check = true;
            password2Error.text("");
        }
    });

    // Kiem tra email - url: "admin/system/account.php"
    $("#email").on("input", function() {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = $("#email").val();
        var emailError = $("#emailError");
        // Cac truong hop loi
        if (email == "") {
            emailError.removeClass("text-success");
            emailError.addClass("text-danger");
            emailError.text("Email không được để trống");
            emailCheck = false;
        } else if (!regex.test(email)) {
            emailError.removeClass("text-success");
            emailError.addClass("text-danger");
            emailError.text("email không hợp lệ");
            emailCheck = false;
        } else { // Kiem tra email ton tai hay chua
            $.ajax({
                url: "admin/system/account.php",
                type: "POST",
                data: {
                    "email_check": 1,
                    "emailCheck": email,},
                success: function(response) {
                    response = $.trim(response);
                    if (response == "taken") {
                        emailError.removeClass("text-success");
                        emailError.addClass("text-danger");
                        emailError.text("Email đã tồn tại");
                        emailCheck = false;
                    } else if (response == "not_taken") {
                        emailError.removeClass("text-danger");
                        emailError.addClass("text-success");
                        emailError.text("Email hợp lệ");  
                        emailCheck = true;
                    }
                }
            });
        } 
    });

    // Kiem tra dieu khoan
    $("#acceptLaw").change(function() {
        if (this.checked) {
            $("#acceptLawError").text("");
            acceptLawCheck = true;
        } else {
            $("#acceptLawError").text("Chưa chấp nhận điều kiện");
            acceptLawCheck = false;
        }
    });

    // Kiem tra submit thoa cac dieu kien chua 
    $("#registerForm").submit(function(event) {
        if (usernameCheck && password1Check && password2Check && emailCheck && acceptLawCheck) {
            // Thoa man tat cac dieu kien
        } else {
            event.preventDefault();
        }
    });
});