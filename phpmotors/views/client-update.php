<?php
// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ 
//     header('Location: /phpmotors/accounts?action=updateAccount');
//     exit;
// }
// else{
//     header('Location: /phpmotors/accounts?action=login-page');

//     exit;

// }

if (isset($_SESSION['loggedin'])) {
    $firstname = $_SESSION['clientData']['clientFirstname'];
    $lastname = $_SESSION['clientData']['clientLastname'];
    $email = $_SESSION['clientData']['clientEmail'];
}
?>
<!DOCTYPE html>
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
        <nav class="main-nav">
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
        </nav>
        <main>
            <h1 class="signin">
                Manage Account
            </h1>

            <h2 class="signin">
                Update Account
            </h2>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
}
            ?>

            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="fname">First name</label><br>
                <input type="text" id="fname" name="clientFirstname" placeholder="first namme" required <?php if (isset($clientFirstname)) {
                                                                                                    echo "value='$clientFirstname'";
                                                                                                }
                                                                                                if (isset($_SESSION['loggedin'])) {
                                                                                                    echo "value='$firstname'";
                                                                                                }  ?>><br>
                <label for="lname">Last name</label><br>
                <input type="text" id="lname" name="clientLastname" placeholder="last namme" required <?php if (isset($clientLastname)) {
                                                                                                    echo "value='$clientLastname'";
                                                                                                }
                                                                                                if (isset($_SESSION['loggedin'])) {
                                                                                                    echo "value='$lastname'";
                                                                                                } ?>><br>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="clientEmail" placeholder="Email address" required <?php if (isset($clientEmail)) {
                                                                                                    echo "value='$clientEmail'";
                                                                                                }
                                                                                                if (isset($_SESSION['loggedin'])) {
                                                                                                    echo "value='$email'";
                                                                                                } ?>><br>

                <input type="submit" name="submit" id="regbtn" value="Update Account">
                <input type="hidden" name="action" value="updateInfo">
                <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                echo $_SESSION['clientData']['clientId'];
                                                            } elseif (isset($clientId)) {
                                                                echo $clientId;
                                                            } ?>
                                                            ">
                <br><br>
            </form>

            <h2 class="signin">
                Update Password
            </h2>
            <?php
            if (isset($_SESSION['message2'])) {
                    echo $_SESSION['message2'];
                    unset($_SESSION['message2']);
                }
            ?>
            <p class="newPassword">Minimum of 8 characters</p>
            <p class="newPassword">At least one 1 capital letter, at least 1 number</p>
            <p class="newPassword">At least 1 special character</p><br>
            <p class="newPassword">*note your original password will be changed</p><br>

            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="password">Password</label><br>
                <input type="password" id="password" name="clientPassword" placeholder="Password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                <input type="submit" name="submit" id="regbtn2" value="Update Password">
                <input type="hidden" name="action" value="updatePassword">
                <br><br>
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>