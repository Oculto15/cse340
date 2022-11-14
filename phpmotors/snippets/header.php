<div class="top_nav">
    <img src="/phpmotors/images/site/logo.png" alt="">
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
       
        echo "<div><a class='click' href='/phpmotors/accounts?action=admin'> {$_SESSION['clientData']['clientFirstname']}</a>" . "|" . "<a class='click' href='/phpmotors/accounts?action=logout'>Logout</a></div>";
    }
        else
        echo "<a class='padding' href='/phpmotors/accounts?action=login-page' >My Account</a>";
    ?>
    
</div>