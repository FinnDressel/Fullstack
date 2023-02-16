<?php
$servername = "localhost";
$username = "root";
$password = "";


//connectie naar database
try {
    $conn = new PDO("mysql:host=$servername;dbname=fullstackdb", $username, $password);

    //connectie check
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
//data versturen
if(isset($_POST['submitButton'])){

    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $data = [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
    ];

    $query = "INSERT INTO student (firstname, lastname, email) VALUES (:firstname, :lastname, :email)";
    $query_run = $conn->prepare($query, $data);


    $query_execute = $query_run->execute($data);

    if($query_execute){
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: php.php');
        exit(0);
    } else{
        $_SESSION['message'] = "Failed";
        header('Location: php.php');
        exit(0);
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Student inshcrijven</title>
</head>
    <body>
    <form action="php.php" method="post">
        <div class="signup">
            <h1>Student inschrijven</h1>
            <hr>
            <label for="email"> <b>Email</b> </label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required> <br>

            <label for="Firstname"> <b>Firstname</b> </label>
            <input type="text" placeholder="Enter Firstname" name="firstname" id="Firstname" required> <br>

            <label for="Lastname"> <b>Lastname</b> </label>
            <input type="text" placeholder="Enter Lastname" name="lastname" id="Lastname" required>

            <div class="Buttons">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" name="submitButton" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>

    <div>
        <a href="StudentenLijst.php">Studenten</a>
    </div>

    </body>
</html>
