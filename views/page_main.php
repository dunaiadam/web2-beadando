<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Fiktív Cég</title>
    <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand">Fiktív cég</a>
</nav>

<div>
    <?php if ($viewData['render']) include($viewData['render']); ?>
</div>

<footer>
    &copy; 2020 - Dunai Ádám
</footer>
</body>
</html>