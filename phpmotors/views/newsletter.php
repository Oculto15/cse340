<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
if (isset($_SESSION['loggedin'])) {
    $firstname = $_SESSION['clientData']['clientFirstname'];
    $lastname = $_SESSION['clientData']['clientLastname'];
    $email = $_SESSION['clientData']['clientEmail'];
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Put your description here.">
    <title>PHP Motors</title>
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
            <h1>Newsletter</h1>

            <form action="/phpmotors/accounts/index.php" method="post">
                    
                    <label for="firstname">First Name</label><br>
                    <input type="text" id="firstname" name="firstName" placeholder="first name" required <?php if (isset($firstName)) {
                                                                                                echo "value='$firstName'";
                                                                                            } if (isset($_SESSION['loggedin'])){echo "value='$firstname'";}?>><br>
                    <label for="lastname">Last Name</label><br>
                    <input type="text" id="lastname" name="lastName" placeholder="last name" required <?php if (isset($lastName)) {
                                                                                                    echo "value='$lastName'";
                                                                                                } if (isset($_SESSION['loggedin'])){echo "value='$lastname'";}?>><br>
                    <label for="Email">Email</label><br>
                    <input type="text" id="Email" name="email" placeholder="email" required <?php if (isset($email)) {
                                                                                                                        echo "value='$email'";
                                                                                                                    }if (isset($_SESSION['loggedin'])){echo "value='$email'";} ?>><br>
                    <input type="submit" name="submit" id="regbtn" value="Join Newsletter">
                    <input type="hidden" name="action" value="thanksforjoin">
                    <br><br>

                </form>

        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>