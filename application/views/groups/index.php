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
.card.hoverable {
  background: #ffffff;
  border-radius: 16px;
  /* box-shadow: inset 4px 4px 10px rgba(0, 0, 0, 0.1), */
              /* inset -4px -4px 10px rgba(255, 255, 255, 0.2); */
  transition: all 0.3s ease;
  transform: translateY(0);
}

.card.hoverable:hover {
  box-shadow: 6px 6px 12px rgba(0, 0, 0, 0.15),
              -6px -6px 12px rgba(255, 255, 255, 0.8);
  transform: translateY(-6px);
}

.card.hoverable:active {
  box-shadow: inset 4px 4px 8px rgba(0, 0, 0, 0.1),
              inset -4px -4px 8px rgba(255, 255, 255, 0.7);
  transform: translateY(0);
}


</style>


<div class="col-md-9 col-lg-10 main-content p-5 d-flex justify-content-center align-items-center flex-column">
	<h1 class="poppins mb-4 text-brand align-self-start">My Project Groups</h1>
	<div class="d-flex w-100 row">
	<?php foreach ($groups as $group): ?>
		<div class="col-3 px-2">
	<div class="card rounded-3 hoverable border-0 mb-4 border-brand">
		<div class="card-header bg-transparent border-bottom-0 text-center h1 jetbrains-mono pt-3 <?= $group->name=='No Group'?'text-secondary fst-italic fw-light':'text-brand-dark fw-bold' ?>">
			<?= $group->name; ?>
		</div>
		<div class="card-body text-center pt-3 pb-4">
			<p class="mb-0 pb-0 display-1 poppins fw-bolder text-brand"><?= $group->project_count; ?></p>
			<small class="text-secondary pt-0 mt-0"><?= $group->project_count<=1?'project':'projects';?> added</small>
		</div>
		<div class="card-footer bg-transparent border-top-0 p-0">
			<?php if($group->name != 'No Group'):?>
			<a class="btn btn-brand m-0 w-100 rounded-top-0 rounded-bottom-3 btn-lg" href="<?= site_url('group/view/'.$group->id) ?>">View Projects</a>
			<?php else: ?>
			<button class="btn btn-brand m-0 w-100 rounded-top-0 rounded-bottom-3 btn-lg text-decoration-line-through fst-italic fw-light small" disabled>View Project</button>
			<?php endif; ?>
		</div>
	</div>
    </div>
	<?php endforeach; ?>
	</div>
	
</div>

<?php $this->load->view('layouts/footer'); ?>
