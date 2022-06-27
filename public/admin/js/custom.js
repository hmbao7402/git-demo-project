$(document).ready(() => {
    // Check Admin Current Password or not
    $("#current_password").keyup(() => {
        const current_password = $("#current_password").val();
        // console.log(currentPassword);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/admin/check-admin-password",
            data: { current_password: current_password },
            success: (response) => {
                console.log(response);
                if (response == "false") {
                    $("#check_password").html(
                        '<font style="color: red">Current Password is Incorrect</font>'
                    );
                    $('#current_password').css('border', '1px solid red');
                } else if (response == "true") {
                    $("#check_password").html(
                        '<font style="color: green">Current Password is Correct</font>'
                    );
                    $("#current_password").css("border", "2px solid green");
                }
            },
            error: () => {
                console.log("Error!!!");
            },
        });
    });
});
