<?php $this->load->view('layouts/header',['title'=>$title??'PM1']); ?>

<h2 class="mb-3">Register</h2>

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<?= form_open('auth/register_process'); ?>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
<?= form_close(); ?>

<p class="mt-2">
    Already have an account? <a href="<?= site_url('auth/login') ?>">Login</a>
</p>

<?php $this->load->view('layouts/footer'); ?>
