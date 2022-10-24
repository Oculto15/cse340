<div class="add-vehicle">
    <h1 class="signin">Add Car Classificacion</h1>

    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
    <form action="/phpmotors/vehicles/index.php" method="post">
        <label for="classification">Classificacion Name</label><br>
        <input type="text" id="classification" name="classificationName" placeholder="classification"><br>

        <input type="submit" name="submit" id="regbtn" value="Add Classification">
        <input type="hidden" name="action" value="addClassification">
        <br><br>
    </form>
</div>