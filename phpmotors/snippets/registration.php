<div class="registration">
    <h1 class="signin">Registration</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form action="/phpmotors/accounts/index.php" method="post">
        <label for="fname">First name</label><br>
        <input type="text" id="fname" name="clientFirstname" placeholder="first namme" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?>><br>
        <label for="lname">Last name</label><br>
        <input type="text" id="lname" name="clientLastname" placeholder="last namme" <?php if(isset($clientLastname)){echo "value='$clientLastname'";}  ?>><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="clientEmail" placeholder="Email address" <?php if(isset($clientEmail)){echo "value='$clientEmail'";}  ?>><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="clientPassword" placeholder="Password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
        <p class="restriction">Minimum of 8 characters</p>
        <p class="restriction">At least one 1 capital letter, at least 1 number</p>
        <p class="restriction">At least 1 special character</p>
        <input type="submit" name="show" id="pss-show" value="Show password"><br>
        <input type="submit" name="submit" id="regbtn" value="Register">
        <input type="hidden" name="action" value="register">
        <br><br>
    </form>
</div>