<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="col-md-9 col-lg-10 main-content p-5">
  	<h3>Hello, <?= $this->session->userdata('username') ?>!</h3>
  	<p>Welcome to your dashboard.</p>
	<div class="row">
	<div class="card shadow-sm border-0 col-3">
		<div class="card-header bg-transparent border-bottom-0 text-center pt-4">
			<h5 class="card-title">Total Projects</h5>
		</div>
		<div class="card-body text-center">
		
		<p class="display-1 h1 fw-bold text-brand"><?= $project_count; ?></p>
		</div>
		<div class="card-footer bg-transparent border-top-0 text-center pb-4">
  			<span class="fst-italic text-secondary">as of</span> <span class="fw-bold text-brand"><?= date('F Y'); ?></span>
		</div>

	</div>
	</div>
</div>

<?php $this->load->view('layouts/footer'); ?>
