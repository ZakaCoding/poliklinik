$('document').ready(function () {
    // Validation form register
    $("#usernameInput").blur(function () {
        var value = $(this).val();
        if (value.length < 3) {
            $(this).addClass("is-invalid");
        }
        else {
            $(this).removeClass("is-invalid");
        }
    });

    $("#emailInput").on('input', function () {
        $(this).removeClass('is-invalid');
    });

    $("#pwdInput").on('input', function () {
        var pwdValue = $(this).val();
        var reg = new RegExp($(this).attr('pattern'));

        if (!reg.test(pwdValue)) {
            $("#validate-number").css("color", "red");
        }
        else {
            $("#lowcase").css("color", "green");
            $("#validate-number").css("color", "green");
        }

        if ($(this).val().length < 8) {
            $("#min-length").css("color", "red");
        }
        else {
            $("#min-length").css("color", "green");
        }

        if (!$(this).val()) {
            $("#lowcase").css("color", "");
            $("#min-length").css("color", "");
            $("#validate-number").css("color", "");
        }
    });

    $("#pwdConfirm").blur(function () {
        if ($(this).val() != $("#pwdInput").val()) {
            $(this).addClass("is-invalid");
            $("#button").attr("disabled", true);
        }
        else {
            // $("#btn-signup").removeAttr("disabled");
            $(this).removeClass("is-invalid");
            $("#button").attr("disabled", false);
        }
    });
});