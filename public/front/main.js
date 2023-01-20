document.getElementById("center-right").style.transitionDuration = "2s";
document.getElementById("center-right").style.width = "0px";
document.getElementById("center-right").style.height = "0px";
document.getElementById("center-left").style.transitionDuration = "2s";
document.getElementById("center-left").style.width = "400px";
document.getElementById("center-left").style.height = "80%";

function mySearch() {
    $("#center-right").empty();
    document.getElementById("center-right").style.width = "50%";
    document.getElementById("center-right").style.height = "80%";
    document.getElementById("center-right").style.borderRadius = "10px";
    document.getElementById("center-left").style.width = "40%";
    document.getElementById("center-left").style.height = "80%";
    document.getElementById("center-left").style.borderRadius = "10px";
    document.getElementById("center-left").style.backgroundColor = "gary";
    let date = $("#date").val();
    let start_time = $("#start_time").val();
    let end_time = $("#end_time").val();
    let cnt = 0;
    if (date == "") {
        $("#date").css("border", "1px solid red");
        cnt++;
    }
    if (start_time == "") {
        $("#start_time").css("border", "1px solid red");
        cnt++;
    }
    if (end_time == "") {
        $("#end_time").css("border", "1px solid red");
        cnt++;
    }
    let url = window.location.href+"api/search";
    if (cnt == 0) {
        $.ajax({
            type: "POST",
            url: url,
            data: {
                date: date,
                start_time: start_time,
                end_time: end_time
            },
            success: function (data) {
                console.log(data);
                $.each(data, function (index, item) {
                    if (item.check == "0") {
                        $("#center-right").append("<p>" + item.name + "</p>");
                    }
                });
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
}
