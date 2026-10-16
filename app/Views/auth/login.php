<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <h2 class="mb-4 text-center"><?= lang('App.login', [], session('locale') ?? 'es') ?></h2>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('auth/loginProcess') ?>" method="post">
                    <?= csrf_field() ?>
                        
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required value="<?= old('email') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3 form check">
                        <input type="checkbox" id="remember" name="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Recordarme</label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="<?= base_url('auth/forgot-password') ?>" class="text-decoration-none small">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>



