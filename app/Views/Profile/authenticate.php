<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Please enter your password to continue</h4>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('profile/verify') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label font-weight-bold">PASSWORD</label>
                            <input type="password" name="password" id="password" class="form-control" required autofocus>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success me-2">Send</button>
                            <a href="<?= base_url('profile') ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
