<?php
// Ta emot data som skickas
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

// Användarnamnet måste vara 6-12 tecken långt, stora och små bokstäver, samt siffror
$errors = [];
function validateUsername($data)
{
    global $errors;
    if (!preg_match("/[a-zA- Z0-9] {6,12}", $data)) {
         $errors ['username'][] = "<p>&#10005; Innehåller inte a-z, A_Z, 0-9</p>";
    } 
}


function validatePassword($data)
{
    global $errors;
    if (!preg_match("/[a-zåäö]/", $data) > 0) {
        $errors['password'][] = '&#10005;password must contain a least one lowercase character<br>';
    }
    if (!preg_match("/[A-ZÅÄÖ]/", $data) > 0) {
        $errors['password'][] = '&#10005; password must contain a least one uppercase character<br>';
    }
    if (!preg_match("/[0-9]/", $data) > 0) {
        $errors['password'][] ='&#10005; password must contain a least one alphanumeric<br>';
    }
    if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $data) > 0) {
        $errors['password'][] = '&#10005; password must contain a least one special character<br>';
    }
    if (!preg_match("/^.{8,40}$/", $data) > 0) {
        $errors['password'][] = '&#10005; password must at least 8 character long<br>';
    }
}
function validateEmail($data)
{
    global $errors;
   if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
      $errors['email'][] = "<p>&#10005;Invalid email format</p>";
    }
}

function showErrors($type) {
    global $errors;
    echo "<p>";
    foreach ($errors[$type] as $error) {
        echo $error;
    }
    echo "</p>";
}
// Om data finns
if ($username && $password && $email) {
    
    // Kotrollera att username följer reglerna
    validateUsername($username);

    // Kontrollera att lösenordet förljer reglerna
    validatePassword($password);

    // Kontrollera att email förljer reglerna
    validateEmail($email);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New User</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Create New User</h1>
        <form action="#" method="POST">
            <label>Username <input type="text" name="username"></label>
            <?php
            showErrors('username');
            ?>
            <label>Password <input type="password" name="password"></label>
            <?php
            showErrors('password');
            ?>
            <label>Email<input type="email" name="email"></label>
            <?php
            showErrors('email');
            ?>
            <br>
            <button>Submit</button>

        </form>
        
    </div>
</body>
</html>