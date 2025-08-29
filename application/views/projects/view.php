<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>
<style>
		.btn-outline-brand {
  color: var(--bs-brand);
  border: 1px solid var(--bs-brand) ;
  background-color: transparent;
  transition: all 0.2s ease-in-out;
}

.btn-outline-brand:hover,
.btn-outline-brand:focus {
  color: #fff;
  background-color: var(--bs-brand-hover);
  border-color: var(--bs-brand-hover);
}

.btn-outline-brand:active {
  color: #fff;
  background-color: var(--bs-brand-hover);
  border-color: var(--bs-brand-hover);
}

.btn-outline-brand:disabled,
.btn-outline-brand.disabled {
  color: var(--bs-brand-disabled);
  border-color: var(--bs-brand-disabled);
  background-color: transparent;
}

</style>


<div class="col-md-9 col-lg-10 main-content p-5">
	<p><?php print_r($project);?></p>
	<h1 class="fw-bold text-brand text-start poppins"><?= $project->name; ?></h1>
	<p class="small fw-light text-secondary"><?= $project->description; ?></p>
	<p><span class="fw-light">Tech Stack:</span> <span class="badge bg-secondary text-warning h1 p-2 shadow-sm"><?=$project->nature;?></span></p>
</div>

<?php $this->load->view('layouts/footer'); ?>
