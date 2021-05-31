<?php


require "./Validator.php";
$check = new Validator();



// använder validator klassen på data som skickas från formuläret
if (isset($_POST["submit"])) {
    $check->set($_POST);
    $check->validateUsername();
    $check->validatePassword();
    $check->validateEmail();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Create New User</h1>
        <form action="#" method="post">
            <label>Username: <input type="text" name="username"></label>
            <?php $check->showErrors('username');  ?>
            <label>Password: <input type="password" name="password"></label>
            <?php $check->showErrors('password'); ?>
            <label>Email: <input type="email" name="email"></label>
            <?php $check->showErrors('email'); ?>
            <br>
            <button>Submit</button>
        </form>
    </div>
</body>
</html>
