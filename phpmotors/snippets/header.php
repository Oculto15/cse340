<div class="top_nav">
    <img src="/phpmotors/images/site/logo.png" alt="">
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
       
        echo "<a href='/phpmotors/accounts?action=logout'> {$_SESSION['clientData']['clientFirstname']} | Logout</a>";
    }
        else
        echo "<a href='/phpmotors/accounts?action=login-page' >My Account</a>";
    ?>
    
</div>