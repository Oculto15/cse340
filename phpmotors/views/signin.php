<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Put your description here.">
    <title>Account Login</title>
    <link rel="stylesheet" href="/phpmotors/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;1,300&family=Roboto:wght@100&family=Ubuntu:wght@300;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="wrap">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        </header>
        <nav>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
        </nav>
        <main>
            <div class="signin-size">
                <h1 class="signin">Sign In</h1>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
                <form action="/phpmotors/accounts/index.php" method="post">
                    <label for="email">Username</label><br>
                    <input type="email" id="email" name="clientEmail" placeholder="Username or Email address" size="30" required <?php if (isset($clientEmail)) {
                                                                                                                                        echo "value='$clientEmail'";
                                                                                                                                    } ?>><br>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="clientPassword" placeholder="Password" size="30" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                    <p class="restriction">Minimum of 8 characters</p>
                    <p class="restriction">At least one 1 capital letter, at least 1 number</p>
                    <p class="restriction">At least 1 special character</p>
                    <input type="submit" name="submit" id="regbtn" value="Login">
                    <input type="hidden" name="action" value="login">
                </form>
                <p class="signup center">No account? <a href="/phpmotors/accounts?action=registration-page">Sign-up</a></p>
            </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>