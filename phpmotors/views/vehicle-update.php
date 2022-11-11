<?php
$dropDownList = "<br><select name ='classificationId' class ='dropdownlist'><option> Choose one options</option>";
foreach ($classifications as $classification) {
    // print_r($classification);
    $dropDownList .= "<option value='$classification[classificationId]'";
    console_log($classificationId);
    if (isset($classificationId)) {
        if ($classification['classificationId'] == $classificationId) {
            $dropDownList .= 'selected';
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] == $invInfo['classificationId']) {
            $classifList .= ' selected ';
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
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Modify $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Modify $invMake $invModel";
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
                <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                        echo "Modify $invInfo[invMake] $invInfo[invModel]";
                    } elseif (isset($invMake) && isset($invModel)) {
                        echo "Modify$invMake $invModel";
                    } ?></h1>

                <p class="note">*Note all fields are required</p>
                <?php
                if (isset($message)) {
                    echo $message;
                }
                ?>

                <form action="/phpmotors/vehicles/index.php" method="post">
                    <?php
                    echo $dropDownList;
                    ?>
                    <label for="make">Make</label><br>
                    <input type="text" id="make" name="invMake" placeholder="make" required <?php if (isset($invMake)) {
                                                                                                echo "value='$invMake'";
                                                                                            } elseif (isset($invInfo['invMake'])) {
                                                                                                echo "value='$invInfo[invMake]'";
                                                                                            } ?>><br>
                    <label for="model">Model</label><br>
                    <input type="text" id="model" name="invModel" placeholder="model" required <?php if (isset($invModel)) {
                                                                                                    echo "value='$invModel'";
                                                                                                } elseif (isset($invInfo['invModel'])) {
                                                                                                    echo "value='$invInfo[invModel]'";
                                                                                                } ?>><br>
                    <label for="description">Description</label><br>
                    <input id="description" name="invDescription" placeholder="description" required <?php if (isset($invDescription)) {
                                                                                                            echo "value='$invDescription'";
                                                                                                        } elseif (isset($invInfo['invDescription'])) {
                                                                                                            echo "value='$invInfo[invDescription]'";
                                                                                                        } ?>><br>
                    <label for="image">Image</label><br>
                    <input type="text" id="image" name="invImage" placeholder="image" value="/phpmotors/images/no-image.png" required <?php if (isset($invImage)) {
                                                                                                                                            echo "value='$invImage'";
                                                                                                                                        } elseif (isset($invInfo['invImage'])) {
                                                                                                                                            echo "value='$invInfo[invImage]'";
                                                                                                                                        } ?>><br>
                    <label for="thumbnail">Thumbnail</label><br>
                    <input type="text" id="make" name="invThumbnail" placeholder="thumbnail" value="/phpmotors/images/no-image.png" required <?php if (isset($invThumbnail)) {
                                                                                                                                                    echo "value='$invThumbnail'";
                                                                                                                                                } elseif (isset($invInfo['invThumbnail'])) {
                                                                                                                                                    echo "value='$invInfo[invThumbnail]'";
                                                                                                                                                } ?>><br>
                    <label for="price">Price</label><br>
                    <input type="text" id="price" name="invPrice" placeholder="price" required <?php if (isset($invPrice)) {
                                                                                                    echo "value='$invPrice'";
                                                                                                } elseif (isset($invInfo['invPrice'])) {
                                                                                                    echo "value='$invInfo[invPrice]'";
                                                                                                } ?>><br>
                    <label for="stock">Stock</label><br>
                    <input type="text" id="stock" name="invStock" placeholder="stock" required <?php if (isset($invStock)) {
                                                                                                    echo "value='$invStock'";
                                                                                                } elseif (isset($invInfo['invStock'])) {
                                                                                                    echo "value='$invInfo[invStock]'";
                                                                                                } ?>><br>
                    <label for="color">Color</label><br>
                    <input type="text" id="color" name="invColor" placeholder="color" required <?php if (isset($invColor)) {
                                                                                                    echo "value='$invColor'";
                                                                                                } elseif (isset($invInfo['invColor'])) {
                                                                                                    echo "value='$invInfo[invColor]'";
                                                                                                } ?>><br>

                    <input type="submit" name="submit" value="Update Vehicle">
                    <input type="hidden" name="action" value="updateVehicle">
                    <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                                echo $invInfo['invId'];
                                                            } elseif (isset($invId)) {
                                                                echo $invId;
                                                            } ?>
                                                            ">
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