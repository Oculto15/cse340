<div class="registration">
    <h1 class="signin">Registration</h1>
    <form action="../index.php">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" placeholder="first namme"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" placeholder="last namme"><br>
        <label for="email">Email</label><br>
        <input type="email" id="email" placeholder="Email address" size="30" required><br>
        <label for="password">Password</label><br>
        <input type="text" id="password" placeholder="Password" size="30" required><br>
        <p>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</p>
        <button type="button">Show password</button>
        <div class="text-center">
            <button type="button">Register</button>
        </div><br><br>
    </form>
</div>