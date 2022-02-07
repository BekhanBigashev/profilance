<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


</head>
<body>
<div style="display: flex; flex-direction:column; justify-content: center; align-items: center">
    <br><br>
    <form id="shortlink-form" method="post">
        @csrf
        <label for="">Введите ссылку для сокращения</label>
        <input name="link" type="text">
        <div class="alert card red lighten-4 red-text text-darken-4" id="error"></div>
        <button class="btn" id="submit-button" type="submit">Готово</button>
    </form>
    <div></div>
    <br>
    <h5><a target="_blank" href="" class="result"></a></h5>
    <br>
    <h6>Добавленные ссылки</h6>
    <ul>
        @foreach($shortlinks as $link)
            <li>{{$link->full_link}} - <a target="_blank" href="/{{$link->short_link}}">https://localhost:8000/{{$link->short_link}}</a></li>
        @endforeach
    </ul>
</div>



<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
