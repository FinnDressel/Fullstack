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

    $studentnr = $_POST['studentnr'];
    $opleidingscode = $_POST['opleidingscode'];
    $startdatum = $_POST['startdatum'];

    $data = [
        'startdatum' => $startdatum,
        'studentnr' => $studentnr,
        'opleidingscode' => $opleidingscode,
    ];

    $query = "INSERT INTO student_opleiding (startdatum, idStudentnr, idOpleidingscode) VALUES (:startdatum, :studentnr, :opleidingscode);";
    $query_run = $conn->prepare($query, $data);


    $query_execute = $query_run->execute();

    if($query_execute){
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: StudentenLijst.php');
        exit(0);
    } else{
        $_SESSION['message'] = "Failed";
//        header('Location: studentopleiding.php');
        exit(0);
    }
}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Studentopleiding</title>
</head>
<body>

<form>
<div class="studentopleiding">
    <label for="studentnr"> <b>Studentnummer</b> </label>
    <input type="number" placeholder="Enter studentnummer" name="studentnr" required> <br>

    <label for="opleidingscode"> <b>Opleiding</b> </label>
    <input type="number" placeholder="Enter opleidingscode" name="opleidingscode" required> <br>

    <label for="startdatum"> <b>Startdatum</b> </label>
    <input type="date" placeholder="Enter startdatum" name="startdatum" required>

    <div class="Buttons">
        <button type="button" class="cancelbtn">Cancel</button>
        <button type="submit" name="submitButton" class="signupbtn">Sign Up</button>
    </div>
</div>
</form>

</body>
</html>