<div class="registration">
    <h1 class="signin">Registration</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form action="/phpmotors/accounts/index.php" method="post">
        <label for="fname">First name</label><br>
        <input type="text" id="fname" name="clientFirstname" placeholder="first namme"><br>
        <label for="lname">Last name</label><br>
        <input type="text" id="lname" name="clientLastname" placeholder="last namme"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="clientEmail" placeholder="Email address"><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="clientPassword" placeholder="Password"><br>
        <p>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
        <input type="submit" name="show" id="pss-show" value="Show password"><br>
        <input type="submit" name="submit" id="regbtn" value="Register">
        <input type="hidden" name="action" value="register">
        <br><br>
    </form>
</div>