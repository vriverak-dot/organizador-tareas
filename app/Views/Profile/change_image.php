<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title mb-4">Edit profile image</h3>

                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('profile/upload-image') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label class="form-label">Buscar Imagen</label>
                            <input type="file" name="profile_image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="<?= base_url('profile') ?>" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
