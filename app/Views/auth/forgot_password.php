<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4"><?= lang('App.forgot_password', [], session('locale') ?? 'es') ?></h3>
                    
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <form action="<?= base_url('auth/forgot-password-process') ?>" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Enviar enlace</button>
                    </form>

                    <div class="text-center mb-3">
                        <a href="<?= base_url('auth/login') ?>" class="text-decoration-none">Volver a Iniciar Sesión</a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>     
                    
<?= $this->endSection() ?>
