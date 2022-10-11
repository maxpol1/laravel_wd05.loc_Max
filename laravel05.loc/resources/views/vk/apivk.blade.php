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

<form action="/apivk" method="post">
@csrf

{{--    <input type="checkbox" value="1" name="title" @if($data->city->title) checked @endif>--}}
    <input type="text" name="user_id" required>
<button type="submit">Submit</button>


</form>


</body>
</html>
