<div class="container">
    <h2>Hír posztolása</h2>
    <form action="poster" method="post">
        <div class="form-group">
            <label for="title">Cím</label>
            <input type="text" class="form-control" id="title" name="title" required pattern="^(?!\s*$).+">
        </div>
        <div class="form-group">
            <label for="message">Szöveg</label>
            <textarea class="form-control" id="message" name="message" rows="6"></textarea>
            <small id="messageHelpBlock" class="form-text text-muted">
                Formázáshoz használhatsz HTML tageket
            </small>
        </div>
        <button type="submit" class="btn btn-primary">Beküldés</button>
        <div class="alert alert-danger" role="alert" <?php echo empty($viewData['message']) ? 'hidden' : '' ?>>
            <?= (isset($viewData['message']) ? $viewData['message'] : "") ?>
        </div>
    </form>
</div>
