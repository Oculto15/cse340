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
            <h1 class="signin">Search</h1>
            <?php
            if (isset($_SESSION['message02'])) {
                echo $_SESSION['message02'];
                unset($_SESSION['message02']);
            }
            ?>
            <form action="/phpmotors/accounts/index.php" method="post">
                <label for="search">What are you looking for today?</label><br>
                <input type="text" name="k" id="search" placeholder="Search" autocomplete="off"><br>


                <input type="submit" name="search" id="regbtn3" value="Search">
                <input type="hidden" name="action" value="searchInfo">
            </form>

            <?php
            if (isset($_SESSION['noResult'])) {
                echo $_SESSION['noResult'];
                unset($_SESSION['noResult']);
            }

            if (isset($results) && count($results) > 0) {

                if (isset($_SESSION['countResult'])) {
                    echo $_SESSION['countResult'];
                    unset($_SESSION['countResult']);
                }
                foreach ($results as $row) {
                    echo '<div>
                        <h3 class="listTitle"><a href="/phpmotors/vehicles/?action=details&invId=' . $row['invId'] . '">' . $row['invYear'] . " " . $row['invMake'] . " " . $row['invModel'] . '</a></h3>
                    </div>
                    <div class="listDescription">
                        <p>' . $row['invDescription'] . '</p>
                    </div>';
                }
            }
            ?>

            <div class="page-container">
                <nav class="page-nav">
                    <ul class="pages">

                        <?php
                        if (isset($pageNUm) && $pageNUm > 0) {
                            echo '<li><a href=/phpmotors/accounts/index.php?action=changePage&pageNUm=' . $pageNUm - 1 . '&k=' . $k . '><<<</a></li>';
                        }
                        if (isset($_SESSION['switchPages'])) {
                            echo $_SESSION['switchPages'];
                            unset($_SESSION['switchPages']);
                        }
                        if (isset($page)) {
                            if (isset($pageNUm) && $pageNUm != ($page - 2)) {
                                echo '<li><a href=/phpmotors/accounts/index.php?action=changePage&pageNUm=' . $pageNUm + 1 . '&k=' . $k . '>>>></a></li>';
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        </footer>
    </div>
</body>

</html>