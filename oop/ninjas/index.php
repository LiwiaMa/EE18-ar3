<?php
// Det här är en mall
class User
{
    // Egenskaper propeties
    public $username = "Liwia";
    public $email = "liwiamatuszczak@gmail.com";

    // Metoder (methods)
    public function addFriend()
    {
        return "$this->emmail added a new friend";
    }
}
// Skapar ett objekt
$userOne = new User();
$userTwo = new User();

// Kolla på egenskaper

echo $userOne->username . "<br>";
echo $userone->email . "<br>";
echo $userOne->addFriend() . "<br>";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

</body>
</html>