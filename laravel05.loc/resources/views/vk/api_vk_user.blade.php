<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>{{ $user['first_name'] }} {{ $user["last_name"] }}</h1>
<<<<<<< HEAD

<h2> {{ $user['id'] }}</h2>

<h2>{{ $user['city']['title'] }}</h2>

<img src="{{ $user["photo_200"] }}" alt="">

=======
<h2> {{ $user['id'] }}</h2>
<img src="{{ $user["photo_200"] }}" alt="">
>>>>>>> 738aedc4dc3ddf83c0033e34ca8c03f181ec5794
</body>
</html>
