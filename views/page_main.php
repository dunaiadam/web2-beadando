<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Fiktív Cég</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand">Fiktív cég</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <?php
            Menu::setMenu();
            foreach (Menu::$menu as $pageKey => $pageValue) {
                if ($pageKey == $viewData['viewName']) {
                    echo '<li class="nav-item active">
                              <a class="nav-link" href="' . $pageKey . '">' . $pageValue[0] . '</a>
                              </li>';
                } else {
                    echo '<li class="nav-item">
                              <a class="nav-link" href="' . $pageKey . '">' . $pageValue[0] . '</a>
                              </li>';
                }
            }
            ?>
        </ul>
    </div>
</nav>

<div>
    <?php if ($viewData['render']) include($viewData['render']); ?>
</div>

<footer>
    &copy; 2020 - Dunai Ádám
</footer>
</body>
</html>