<div class="container">
    <br>
    <div class="alert alert-info" role="alert" <?php echo empty($viewData['message']) ? 'hidden' : '' ?>>
        <?= (isset($viewData['message']) ? $viewData['message'] : "") ?>
    </div>

    <?php
    if (isset($viewData['news'])) {
        foreach ($viewData['news'] as $newsItem) :?>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        <?php echo $newsItem['title'] ?>
                    </h3>
                    <p class="card-subtitle text-muted">
                        <?php echo $newsItem['firstName'] ?> - <?php echo $newsItem['date'] ?>
                    </p>
                    <?php echo $newsItem['message'] ?>
                </div>
            </div>
            <br>

        <?php endforeach;
    } ?>
</div>
