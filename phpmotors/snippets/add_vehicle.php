<div class="add-vehicle">
    <h1 class="signin">Add Vehicle</h1>

    <p class="note">*Note all fields are required</p>
    <?php
    
    if (isset($message)) {
        echo $message;
    }
    ?>

    <form action="/phpmotors/vehicles/index.php" method="post">
        <label for="make">Make</label><br>
        <input type="text" id="make" name="invMake" placeholder="make"><br>
        <label for="model">Model</label><br>
        <input type="text" id="model" name="invModel" placeholder="model"><br>
        <label for="description">Description</label><br>
        <input type="text" id="description" name="invDescription" placeholder="description"><br>
        <label for="image">Image</label><br>
        <input type="text" id="image" name="invImage" placeholder="image" value = "/phpmotors/images/no-image.png"><br>
        <label for="thumbnail">Thumbnail</label><br>
        <input type="text" id="make" name="invThumbnail" placeholder="thumbnail" value = "/phpmotors/images/no-image.png"><br>
        <label for="price">Price</label><br>
        <input type="text" id="price" name="invPrice" placeholder="price"><br>
        <label for="stock">Stock</label><br>
        <input type="text" id="stock" name="invStock" placeholder="stock"><br>
        <label for="color">Color</label><br>
        <input type="text" id="color" name="invColor" placeholder="color"><br>
        <?php
            echo $dropDownList;
        ?>
        <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
        <input type="hidden" name="action" value="addVehicle">
        <br><br>
        
    </form>
    
</div>