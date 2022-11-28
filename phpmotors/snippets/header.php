<div class="top_nav">
    <img class='logo1' src="/phpmotors/images/site/logo.png" alt="Logo">
    <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
       
        echo "<div><a class='click' href='/phpmotors/accounts?action=admin'> {$_SESSION['clientData']['clientFirstname']}</a>" . "|" . "<a class='click' href='/phpmotors/accounts?action=logout'>Logout</a> <a href='/phpmotors/accounts?action=search'><img class='search-img' alt='' src='/phpmotors/images/search.png'></a></div>";
    }
        else
        echo "<div><a class='padding' href='/phpmotors/accounts?action=login-page' >My Account</a> <a href='/phpmotors/accounts?action=search'><img class='search-img' src='/phpmotors/images/search.png'></a> </div>";
    ?>
    
</div>