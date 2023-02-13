<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=fullstackdb", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>



<hmtl>
    <link rel="stylesheet" href="style.css">
    <body>
    <form action="php.php">
        <div class="signup">
            <h1>Student inschrijven</h1>
            <hr>
            <label for="email"> <b>Email</b> </label>
            <input type="text" placeholder="Enter Email" name="email" required

            <label for="name"> <b>Name</b> </label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="password"> <b>Password</b> </label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <div class="Buttons">
                <button type="button" class="cancelbtn">Cancel</button>
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
    </body>
</hmtl>
