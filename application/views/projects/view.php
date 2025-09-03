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
/* Base status dot */
.status-dot {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  display: inline-block;
  margin-right: 6px;
  box-shadow: 0 0 0 rgba(0,0,0,0.3);
  animation: pulse 2s infinite;
}

/* Status colors */
.status-active {
  background: #28a745; /* green */
  box-shadow: 0 0 0 rgba(40, 167, 69, 0.7);
}
.status-on_hold {
  background: #ffc107; /* yellow */
  box-shadow: 0 0 0 rgba(255, 193, 7, 0.7);
}
.status-planning {
  background: #0dcaf0; /* cyan */
  box-shadow: 0 0 0 rgba(13, 202, 240, 0.7);
}
.status-completed {
  background: #6c757d; /* gray */
  box-shadow: 0 0 0 rgba(108, 117, 125, 0.7);
}
.status-cancelled {
  background: #dc3545; /* red */
  box-shadow: 0 0 0 rgba(220, 53, 69, 0.7);
}
/* Pulse animation */
@keyframes pulse {
  0%   { transform: scale(1); opacity: 1; }
  50%  { transform: scale(1.3); opacity: 0.6; }
  100% { transform: scale(1); opacity: 1; }
}
#featureContainer{
	border: 4px dashed rgba(var(--bs-brand-rgb),0.5);
}
</style>
<?php
// DB value, assume UTC
$dateCreated = new DateTime($project->created_at);
$dateUpdated = new DateTime($project->updated_at);
$dateCreated->setTimezone(new DateTimeZone('Asia/Manila'));
$dateUpdated->setTimezone(new DateTimeZone('Asia/Manila'));
$statusText = ucfirst(str_replace('_', ' ', $project->status)); 
?>

<div class="col-md-9 col-lg-10 main-content p-5">
	<!-- <p><?php print_r($project);?></p> -->

	<div class="d-flex justify-content-between align-items-center">
	<p class="">
		<span class="fw-bold text-brand text-start poppins display-4"><?= $project->name; ?></span>
		<span class="d-flex align-items-center justify-content-between mb-0 pb-0">
		<span class="text-secondary text-start poppins d-block m-0 p-0">
    <?= !empty($project->group_name) 
        ? '<span class="fs-3 font-monospace">'.$project->group_name.'</span>'
        : '<em class="text-muted">No group assigned</em>'; ?>
</span>

		<span>
			<span class="status-dot status-<?= $project->status; ?>"></span>
			<span class="fw-semibold text-capitalize"><?= $statusText; ?></span>
			</span>
		</span>
	</p>
	
	<div class="d-flex flex-column justify-content-center gap-0 p-0 m-0">
	<p class="text-end fst-italic text-secondary fw-light small">
        <span>Created at: </span>
        <span><?= $dateCreated->format('d M Y g:i A'); ?></span>
   <br>
        <span>Last updated: </span>
        <span><?= $dateUpdated->format('d M Y g:i A'); ?></span>
    </p>
	</div>
	</div>
	<hr>
	<div class="d-flex justify-content-evenly gap-4 align-items-between">
	<div class="d-flex flex-column justify-content-between gap-4 w-100 py-5">
	<p class=" fw-light text-secondary text-justify" ><?= $project->description; ?></p>
	<table class="table table-borderless table-hover shadow-sm rounded-3 mt-4">
    <tbody>
        <tr class="align-middle">
            <th class="bg-light w-25 text-center p-3">Tech / Stack</th>
            <td class="p-3">
                <span class="badge bg-black text-warning fs-6 px-3 py-2 shadow-sm fw-light">
                    <?= $project->nature; ?>
                </span>
            </td>
        </tr>
        <tr class="align-middle">
            <th class="bg-light text-center p-3">Repo</th>
            <td class="p-3">
                <a href="<?= $project->repo_url; ?>" target="_blank"
                   class="badge bg-brand text-white fs-6 px-3 py-2 shadow-sm text-decoration-none fw-light">
                   <?= $project->repo_url; ?>
                </a>
            </td>
        </tr>
        <tr class="align-middle">
            <th class="bg-light text-center p-3">Deployment</th>
            <td class="p-3">
				<a href="<?= $project->deployment_url; ?>" target="_blank"
				class="badge bg-success text-white fs-6 px-3 py-2 shadow-sm text-decoration-none fw-light">
				<?= $project->deployment_url; ?>
			</a>
			<span class="fst-italic small text-secondary"><?= $project->deployment_type;?> </span>
            </td>
        </tr>
    </tbody>
</table>

<div class="btn-group w-100" role="group">
  <button type="button" class="btn btn-outline-brand w-100"><i class="bi bi-collection"></i> View Group</button>
  <button type="button" class="btn btn-outline-secondary w-100"><i class="bi bi-pencil-square"></i> Edit</button>
  <button type="button" class="btn btn-outline-danger w-100"><i class="bi bi-trash"></i> Delete</button>
</div>


</div>
<?php if (!empty($snapshotUrl)): ?>
    <img src="<?= $snapshotUrl; ?>" 
         alt="Website snapshot" 
         style="width:100%; max-width:800px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.2);" 
         class="img-fluid">
<?php else: ?>
    <div style="width:100%; max-width:800px; height:400px; 
                display:flex; align-items:center; justify-content:center; 
                border: 2px dashed #ccc; border-radius:8px; color:#999; font-style:italic;">
        No preview available
    </div>
<?php endif; ?>

</div>
<section class="w-100 bg-white my-4 rounded-4 shadow-sm p-5" id="featureContainer">
	<h1>test</h1>
</section>
</div>

<?php $this->load->view('layouts/footer'); ?>
