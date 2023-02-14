<?php
$servername = "localhost";
$username = "root";
$password = "";


//connectie naar database
try {
    $conn = new PDO("mysql:host=$servername;dbname=fullstackdb", $username, $password);

    //error check
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

$first_name = $_POST['Firstname'];
$last_name = $_POST['Lastname'];
$email = $_POST['email'];

$stmt = $pdo->prepare("INSERT INTO Student (first_name, last_name, email) VALUES (:firstname, :lastname, :email)");

$stmt->bindParm(':firstname', $first_name);
$stmt->bindParm(':lastname', $last_name);
$stmt->bindParm(':email', $email);
$stmt->execute();

if($stmt->errorCode()!== '00000'){
    $errorInfo = $stmt->errorInfo();
} else{
    echo "succes";
}

?>



<hmtl>
    <link rel="stylesheet" href="style.css">
    <body>
    <form action="php.php" method="post">
        <div class="signup">
            <h1>Student inschrijven</h1>
            <hr>
            <label for="email"> <b>Email</b> </label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>

            <label for="Firstname"> <b>Firstname</b> </label>
            <input type="text" placeholder="Enter Firstname" name="firstname" id="Firstname" required>

            <label for="Lastname"> <b>Lastname</b> </label>
            <input type="text" placeholder="Enter Lastname" name="lastname" id="Lastname" required>

            <div class="Buttons">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
    </body>
</hmtl>
