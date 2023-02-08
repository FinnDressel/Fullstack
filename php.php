<?php

?>

<hmtl>
    <body>
    <form action="php.php" style="border: 1px solid #000000">
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
