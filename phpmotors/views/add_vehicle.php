<?php
$dropDownList = "<br><select name ='classificationId' class ='dropdownlist'><option> Choose one options</option>";
foreach ($classifications as $classification) {
    // print_r($classification);
    $dropDownList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] == $classificationId) {
            $dropDownList .= 'selected';
        }
    }
    $dropDownList .= ">$classification[classificationName]</option>";
}
$dropDownList .= ("</select><br>");
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
            <div class="add-vehicle">
                <h1 class="signin">Add Vehicle</h1>

                <p class="note">*Note all fields are required</p>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>

                <form action="/phpmotors/vehicles/index.php" method="post">
                    <?php
                    echo $dropDownList;
                    ?>
                    <label for="make">Make</label><br>
                    <input type="text" id="make" name="invMake" placeholder="make" required <?php if (isset($invMake)) {
                                                                                                echo "value='$invMake'";
                                                                                            } ?>><br>
                    <label for="model">Model</label><br>
                    <input type="text" id="model" name="invModel" placeholder="model" required <?php if (isset($invModel)) {
                                                                                                    echo "value='$invModel'";
                                                                                                } ?>><br>
                    <label for="description">Description</label><br>
                    <input type="text" id="description" name="invDescription" placeholder="description" required <?php if (isset($invDescription)) {
                                                                                                                        echo "value='$invDescription'";
                                                                                                                    } ?>><br>
                    <label for="image">Image</label><br>
                    <input type="text" id="image" name="invImage" placeholder="image" value="/phpmotors/images/no-image.png" required <?php if (isset($invImage)) {
                                                                                                                                            echo "value='$invImage'";
                                                                                                                                        } ?>><br>
                    <label for="thumbnail">Thumbnail</label><br>
                    <input type="text" id="make" name="invThumbnail" placeholder="thumbnail" value="/phpmotors/images/no-image.png" required <?php if (isset($invThumbnail)) {
                                                                                                                                                    echo "value='$invThumbnail'";
                                                                                                                                                } ?>><br>
                    <label for="price">Price</label><br>
                    <input type="text" id="price" name="invPrice" placeholder="price" required <?php if (isset($invPrice)) {
                                                                                                    echo "value='$invPrice'";
                                                                                                } ?>><br>
                    <label for="stock">Stock</label><br>
                    <input type="text" id="stock" name="invStock" placeholder="stock" required <?php if (isset($invStock)) {
                                                                                                    echo "value='$invStock'";
                                                                                                } ?>><br>
                    <label for="color">Color</label><br>
                    <input type="text" id="color" name="invColor" placeholder="color" required <?php if (isset($invColor)) {
                                                                                                    echo "value='$invColor'";
                                                                                                } ?>><br>

                    <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
                    <input type="hidden" name="action" value="addVehicle">
                    <br><br>

                </form>

            </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>