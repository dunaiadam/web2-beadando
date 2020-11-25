<div class="container">
<h2>Belépés</h2>
<form action="loginer" method="post">
    <div class="form-group">
        <label for="username">Felhasználónév</label>
        <input type="text" class="form-control" id="username" name="username" required pattern="^(?!\s*$).+">
    </div>
    <div class="form-group">
        <label for="password">Jelszó</label>
        <input type="password" class="form-control" id="password" name="password" required pattern="^(?!\s*$).+">
    </div>
    <button type="submit" class="btn btn-primary">Bejelentkezés</button>
    <div class="alert alert-danger" role="alert" <?php echo empty($viewData['message']) ? 'hidden' : '' ?>>
        <?= (isset($viewData['message']) ? $viewData['message'] : "") ?>
    </div>
</form>
</div>
