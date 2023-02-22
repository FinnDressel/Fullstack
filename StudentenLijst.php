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
//data dropdown menu
try{
    $query = "SELECT* FROM student opleiding";
    $results = $conn->query($query);
    ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php

        while ($data = $results->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
                <td> <?php echo $data['idStudentnr']; ?> </td>
                <td> <?php echo $data['startdatum']; ?> </td>
                <td> <?php echo $data['idOpleidingscode']; ?> </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
} catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}
?>

<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
    <title>Studenten Lijst</title>
</head>
<body>

<div>
<a href="php.php">Student inschrijven</a>
</div>
</body>
</html>
