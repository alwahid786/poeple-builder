<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reward</title>
</head>
<body>
    <h1>Hello, {{ $name }}</h1>

    @if($type == 'admin' || $type == 'company')
        The {{ $user_name }} is rewarded by {{ $reward_price }} on video {{ $video }}.
    @else
        Congratulations! You are rewarded by {{ $reward_price }} on video {{ $video }}.
    @endif

    <p>Thank you!</p>
</body>
</html>
