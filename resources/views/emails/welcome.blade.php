<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>

<body>
<h2>Welcome to the site {{$email['first_name']}} {{$email['last_name']}}</h2>
<br/>
Your registered email-id is {{$email['email']}}
<br>
Your Password is {{$email['password']}}
</body>

</html>