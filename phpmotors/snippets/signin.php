<div class="signin-size">
    <h1 class="signin">Sign In</h1>
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form action="/phpmotors/accounts/index.php">
        <label for="email">Username</label><br>
        <input type="email" id="email" placeholder="Username or Email address" size="30" required><br>
        <label for="password">Password</label><br>
        <input type="password" id="password" placeholder="Password" size="30" required><br>
        <input type="submit" name="submit" id="regbtn" value="Login">
        <!-- <input type="hidden" name="action" value="register"> -->
    </form>
    <p class="signup">No account? <a href="/phpmotors/accounts?action=registration-page">Sign-up</a></p>
</div>