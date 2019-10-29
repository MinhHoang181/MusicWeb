var usernameCheck = false;
var passwordCheck = false;

$("document").ready(function() {

    // Kiem tra username
    $("#username").on("input", function() {
        var username = $("#username").val();
        var usernameError = $("#usernameError");
        // truong hop loi
        if (username == "") {
            usernameError.text("Vui lòng điền tên đăng nhập");
            usernameCheck = false;
        } else {
            usernameError.text("");
            usernameCheck = true;
        }
    });

    // Kiem tra password
    $("#password").on("input", function() {
        var password = $("#password").val();
        var passwordError = $("#passwordError");
        // truong hop loi
        if (password == "") {
            passwordError.text("Vui lòng điền mật khẩu");
            passwordCheck = false;
        } else {
            passwordError.text("");
            passwordCheck = true;
        }
    });

    // Kiem tra submit thoa cac dieu kien chua
    $("#loginBtn").submit(function(event) {
        if (usernameCheck && passwordCheck) {
            // Thoa man tat ca cac dieu kien
        } else {
            event.preventDefault();
        }
    });
});