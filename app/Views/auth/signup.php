<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <h2 class="mb-4 text-center"><?= lang('App.signup', [], session('locale') ?? 'es') ?></h2>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/signupProcess') ?>" method="post">
                    <?= csrf_field() ?>
                        
                    <div class="mb-3">
                        <label for="nombre_completo" class="form-label">Nombre Completo:</label>
                        <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="repeat_password" class="form-label">Repetir Contraseña:</label>
                        <input type="password" id="repeat_password" name="repeat_password" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        <a href="<?= base_url('/') ?>" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

