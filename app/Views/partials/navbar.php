        <nav class="navbar">
            <div class="nav-group">
                <a href="<?= base_url('/') ?>" class="nav-link">Inicio</a>

                <?php if (session()->get('logged_in') || session()->get('user_id')) : ?>
                    <a href="<?= base_url('tasks') ?>" class="nav-link">Tareas</a>
                <?php endif; ?>
                
                <a href="<?= base_url('lang/en') ?>" class="nav-link">English</a>
                <a href="<?= base_url('lang/es') ?>" class="nav-link">Español</a>
            </div>

            <div class="nav-group">
                <?php if (session()->get('logged_in') || session()->get('user_id')) : ?>
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link" style="color: #dc3545;">Cerrar Sesión</a>
                <?php else: ?>
                <a href="<?= base_url('auth/signup') ?>" class="nav-link">Registrarse</a>
                <a href="<?= base_url('auth/login') ?>" class="nav-link">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </nav>