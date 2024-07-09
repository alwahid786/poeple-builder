<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reward</title>
</head>
<body>
    <h1>Hello, {{ $mail_data['name'] }}</h1>

    @if($type == 'admin' || $type == 'company')
        The {{$mail_data['user_name']}} is rewarded by {{$mail_data['reward_price']}} on video {{$mail_data['video']}}.
    @else
        Congratulation! you are rewarded by {{$mail_data['reward_price']}}
    @endif

    <p>Thank you!</p>
</body>
</html>
