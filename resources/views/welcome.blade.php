<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditoriya</title>
{{--    <link rel="stylesheet" href="{{ asset('front/style.css') }}">--}}
    <style>
        *{
            padding: 0;margin: 0;box-sizing: border-box;font-family: Arial, Helvetica, sans-serif;
        }
        body{
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url({{ asset('front/auditoriya.jpg') }});
            background-repeat: no-repeat;
            background-size: cover;
        }
        input{
            outline: none;
        }
        .hero{
            width: 90vw;
            height: 100vh;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .hero h1{
            width: 100%;
            text-align: center;
            padding: 50px;
            font-size: 46px;
        }
        .center{
            width: 80%;
            height: 700px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .center-left{
            background-color: rgba(155, 155, 155, 0.7);
            backdrop-filter: blur(5px);
            border-radius: 25px;
            padding: 30px;
        }
        .center-left label{
            font-size: 24px;
            padding-left: 10px;
        }
        .center-left input{
            width: 100%;
            height: 50px;
            border-radius: 10px;
            border: none;
            padding: 20px;
        }
        .center-left button{
            width: 150px;
            height: 45px;
            border-radius: 15px;
            border: none;
            cursor: pointer;
            background-color: rgb(0, 115, 255);
            font-size: 20px;
            color: white;
        }

        .center-right{
            padding: 20px;
            background-color: white;
            backdrop-filter: blur(5px);
            border-radius: 25px;
            box-shadow: inset gray 0px 0px 10px 0px;
        }

        @media screen and (max-width:600px) {
            body{
                background-color: red;
            }
        }

        img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="hero">
    <h1>Auditoriya bandligini ta'minlash</h1>
    <div class="center">
        <div class="center-left" id="center-left">
            <form action=""><br>
                <label for="">Kun</label><br><br>
                <input type="date" id="date" placeholder="kunni kiriting.." name="date"><br><br><br>
                <label for="">Boshlash vaqti</label><br><br>
                <input type="time" id="start_time" placeholder="vaqtni kiriting.." name="start_time"><br><br><br>
                <label for="">Tugash vaqti</label><br><br>
                <input type="time" id="end_time" placeholder="vaqtni kiriting.." name="end_time"><br><br><br>
            </form>

            <button onclick="mySearch()">
                Qidirish
            </button>
        </div>
        <div class="center-right" id="center-right">

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--<script src="{{ asset('front/main.js') }}"></script>--}}
<script>
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

</script>
</body>
</html>
