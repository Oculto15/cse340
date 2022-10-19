<div class="add-vehicle">
    <h1 class="signin">Add Car Classificacion</h1>

    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form action="/phpmotors/vehicles/index.php" method="post">
        <label for="make">Classificacion Name</label><br>
        <input type="text" id="make" name="invMake" placeholder="make"><br>

        <input type="submit" name="submit" id="regbtn" value="Add Classification">
        <input type="hidden" name="action" value="addVehicle">
        <br><br>
    </form>
</div>