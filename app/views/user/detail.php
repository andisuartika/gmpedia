<div class="container mt-5">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= BASEURL; ?>/img/user/<?= $data['user']['image']; ?>" class="card-img" alt="image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" style="text-transform: uppercase;"><?= $data['user']['name']; ?></h5>
                    <p class="card-text"><?= $data['user']['email']; ?></p>
                    <p class="card-text"><a href="<?= BASEURL; ?>/user" class="card-link">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</div>