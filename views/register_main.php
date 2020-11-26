<div class="container">
    <div class="alert alert-success" role="alert" <?php echo empty($viewData['message']) ? 'hidden' : '' ?>>
        <?= (isset($viewData['message']) ? $viewData['message'] : "") ?>
    </div>
</div>
