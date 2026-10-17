<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<h2>Edit profile</h2>

<form action="<?= base_url('profile/update') ?>" method="post">
    <?= csrf_field() ?>
    <label>name</label>
    <input type="text" name="nombre_completo" value="<?= esc($user['nombre_completo']) ?>" required>

    <label>email</label>
    <input type="email" name="email" value="<?= esc($user['email']) ?>" required>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= base_url('profile') ?>" class="btn btn-danger">Cancel</a>
</form>
<?= $this->endSection() ?>
