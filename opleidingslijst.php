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

if(isset($_POST['submitButton'])){

    $opleidingsnaam = $_POST['opleidingsnaam'];
    $opleidingsniveau = $_POST['opleidingsniveau'];

    $data = [
        'opleidingsnaam' => $opleidingsnaam,
        'opleidingsniveau' => $opleidingsniveau,
    ];

    $query = "INSERT INTO opleiding (name, niveau) VALUES (:opleidingsnaam, :opleidingsniveau)";
    $query_run = $conn->prepare($query, $data);


    $query_execute = $query_run->execute($data);

    if($query_execute){
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: opleidingslijst.php');
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
    <title>OpleidingsLijst</title>
</head>
<body>

<form action="opleidingslijst.php" method="post">
<div class="opleidingslijst">
    <label for="name"> <b>Opleidingsnaam</b> </label>
    <input type="text" placeholder="Enter name" name="opleidingsnaam" required> <br>

    <label for="niveau"> <b>Opleidingsniveau</b> </label>
    <input type="number" placeholder="Enter niveau" name="opleidingsniveau" required>

    <div class="Buttons">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" name="submitButton" class="signupbtn">Sign Up</button>
    </div>

</div>
</form>

</body>
</html>
