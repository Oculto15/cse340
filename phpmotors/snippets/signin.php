<div class="signin-size">
    <h1 class="signin">Sign In</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form action="/phpmotors/accounts/index.php">
        <label for="email">Username</label><br>
        <input type="email" id="email" name="clientEmail" placeholder="Username or Email address" size="30" required <?php if(isset($clientEmail)){echo "value='$clientEmail'";}?>><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" name="clientPassword" placeholder="Password" size="30" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
        <p class="restriction">Minimum of 8 characters</p>
        <p class="restriction">At least one 1 capital letter, at least 1 number</p>
        <p class="restriction">At least 1 special character</p>
        <input type="submit" name="submit" id="regbtn" value="Login">
        <input type="hidden" name="action" value="login">
    </form>
    <p class="signup">No account? <a href="/phpmotors/accounts?action=registration-page">Sign-up</a></p>
</div>