<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="utf-8">
</head>
<body>
<h2>Selamat datang di SIM Atletik UNESA!</h2>
<div>
Untuk mengaktifkan akun Anda, silahkan klik link berikut: <br>
{{ link_to_route('activate', null, ['email'=>$email, 'activationCode'=>$activationCode]) }}
</div>
</body>
</html>
