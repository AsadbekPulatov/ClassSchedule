<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditoriya</title>
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
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
<script src="{{ asset('front/main.js') }}"></script>
</body>
</html>
