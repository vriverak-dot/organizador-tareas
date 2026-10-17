<?= $this->extend('Layouts/default') ?>
<?= $this->section('content') ?>

<h3>Please enter your password to continue</h3>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form action="<?= base_url('profile/verify') ?>" method="post">
    <?= csrf_field() ?>
    <label>PASSWORD</label>
    <input type="password" name="password" required>

    <button type="submit" class="btn btn-success">Send</button>
    <a href="<?= base_url('profile') ?>" class="btn btn-danger">Cancel</a>
</form>
<?= $this->endSection() ?>
