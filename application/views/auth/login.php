<?php $this->load->view('layouts/header',['title' => $title ?? 'PM1']); ?>

<h2 class="mb-3">Login</h2>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<?php echo form_open('auth/login_process'); ?>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Login</button>
<?php echo form_close(); ?>

<p class="mt-2">
    Don't have an account? <a href="<?= site_url('auth/register') ?>">Register</a>
</p>

<?php $this->load->view('layouts/footer'); ?>
