<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Put your description here.">
    <title><?php if (isset($invInfo['invMake'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } ?> | PHP Motors</title>
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
            <div class="add-vehicle">
                <h1><?php if (isset($invInfo['invMake'])) {
                        echo "Delete $invInfo[invMake] $invInfo[invModel]";
                    } ?></h1>

                <p class="note">*Note all fields are required</p>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>

                <form method="post" action="/phpmotors/vehicles/">
                    <fieldset>
                        <label for="invMake">Vehicle Make</label>
                        <input type="text" readonly name="invMake" id="invMake" <?php
                                                                                if (isset($invInfo['invMake'])) {
                                                                                    echo "value='$invInfo[invMake]'";
                                                                                } ?>><br>

                        <label for="invModel">Vehicle Model</label>
                        <input type="text" readonly name="invModel" id="invModel" <?php
                                                                                    if (isset($invInfo['invModel'])) {
                                                                                        echo "value='$invInfo[invModel]'";
                                                                                    } ?>><br>

                        <label for="invDescription">Vehicle Description</label>
                        <textarea name="invDescription" readonly id="invDescription"><?php
                                                                                        if (isset($invInfo['invDescription'])) {
                                                                                            echo $invInfo['invDescription'];
                                                                                        }
                                                                                        ?></textarea><br>

                        <input type="submit" class="regbtn" name="submit" value="Delete Vehicle">

                        <input type="hidden" name="action" value="deleteVehicle">
                        <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                        echo $invInfo['invId'];
                                                                    } ?>">

                    </fieldset>
                </form>

            </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>