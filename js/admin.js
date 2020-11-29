function usernames() {
    $.post(
        "controllers/admin_data.php",
        {"operation": "usernames"},
        function (data) {
            $("<option>").val("0").text("Felhasználónév").appendTo("#userName");
            var list = data.return;
            for (i = 0; i < list.length; i++) {
                $("<option>").val(list[i]).text(list[i]).appendTo("#userName");
            }
        },
        "json"
    )
}

function userData() {
    var username = $("#userName").val();
    if (username != "") {
        $.post(
            "controllers/admin_data.php",
            {"username": username},
            function (data) {
                $("#idNumber").text(data.return.id);
                $("#name").text(data.return.firstName);
            },
            "json"
        )
    }
}

$(document).ready(function () {
    usernames();

    $("#userName").change(userData);
})
