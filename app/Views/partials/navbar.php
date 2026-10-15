        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('/') ?>"<?= lang('App.home', [], session('locale') ?? 'es') ?>></a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/') ?>"<?= lang('App.home', [], session('locale') ?? 'es') ?>></a>
                        </li>

                        <?php if (session()->get('logged_in') || session()->get('user_id')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('tasks') ?>">Tareas</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link px-2" href="<?= base_url('lang/en') ?>">Inglés</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link px-2" href="<?= base_url('lang/es') ?>">Español</a>
                        </li>
                        
                        <?php if (session()->get('logged_in') || session()->get('user_id')) : ?>
                            <li class="nav-item ms-2">
                                <a class="btn btn-outline-danger btn-sm" href="<?= base_url('auth/logout') ?>">Cerrar Sesión</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item ms-2">
                                <a class="btn btn-outline-light btn-sm" href="<?= base_url('auth/signup') ?>"><?= lang('App.signup', [], session('locale') ?? 'es') ?></a>
                            </li>
                            <li class="nav-item ms-2">
                                <a class="btn btn-success btn-sm" href="<?= base_url('auth/login') ?>"><?= lang('App.login', [], session('locale') ?? 'es') ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
                    