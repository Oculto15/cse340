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
        <input type="text" id="make" name="invMake" placeholder="make" required <?php if(isset($invMake)){echo "value='$invMake'";}?>><br>
        <label for="model">Model</label><br>
        <input type="text" id="model" name="invModel" placeholder="model" required <?php if(isset($invModel)){echo "value='$invModel'";}?>><br>
        <label for="description">Description</label><br>
        <input type="text" id="description" name="invDescription" placeholder="description" required <?php if(isset($invDescription)){echo "value='$invDescription'";}?>><br>
        <label for="image">Image</label><br>
        <input type="text" id="image" name="invImage" placeholder="image" value = "/phpmotors/images/no-image.png" required <?php if(isset($invImage)){echo "value='$invImage'";}?>><br>
        <label for="thumbnail">Thumbnail</label><br>
        <input type="text" id="make" name="invThumbnail" placeholder="thumbnail" value = "/phpmotors/images/no-image.png" required <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}?>><br>
        <label for="price">Price</label><br>
        <input type="text" id="price" name="invPrice" placeholder="price" required <?php if(isset($invPrice)){echo "value='$invPrice'";}?>><br>
        <label for="stock">Stock</label><br>
        <input type="text" id="stock" name="invStock" placeholder="stock" required <?php if(isset($invStock)){echo "value='$invStock'";}?>><br>
        <label for="color">Color</label><br>
        <input type="text" id="color" name="invColor" placeholder="color" required <?php if(isset($invColor)){echo "value='$invColor'";}?>><br>
        <?php
            echo $dropDownList;
        ?>
        <input type="submit" name="submit" id="regbtn" value="Add Vehicle">
        <input type="hidden" name="action" value="addVehicle">
        <br><br>
        
    </form>
    
</div>