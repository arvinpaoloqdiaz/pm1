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


<div class="col-md-9 col-lg-10 main-content p-5 d-flex justify-content-center align-items-center flex-column">
	<h1 class="poppins mb-4 text-brand align-self-start">My Projects</h1>
<table class="table table-striped table-hover table-bordered align-middle shadow-sm rounded">
	<thead class="table-dark text-center">
		<tr>
			<th>Group</th>
			<th width="25%">Project Name</th>
			<th>Tech Stack</th>
			<th>Deployment Type</th>
			<th colspan="2">URL</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody class="text-center">
		<?php foreach($projects as $project): ?>
			<tr>
				<td><?= $project->group_name ?? '<span class="text-muted fst-italic">none</span>'; ?></td>
				<td class="fw-semibold"><?= $project->name; ?></td>
				<td><?= $project->nature; ?></td>
				<td><?= $project->deployment_type; ?></td>
				<td>
					<?php if (!empty($project->repo_url)): ?>
						<a href="<?= $project->repo_url; ?>"
						target="_blank"
						class="btn btn-sm btn-outline-brand me-1">
						Repository
						</a>
					<?php else: ?>
						<a class="btn btn-sm btn-outline-brand me-1 disabled text-decoration-line-through">
						Repository
						</a>
					<?php endif; ?>
					</td>

					<td>
					<?php if (!empty($project->deployment_url)): ?>
						<a href="<?= $project->deployment_url; ?>"
						target="_blank"
						class="btn btn-sm btn-outline-success">
						Deployment
						</a>
					<?php else: ?>
						<a class="btn btn-sm btn-outline-success disabled text-decoration-line-through">
						Deployment
						</a>
					<?php endif; ?>
					</td>

				<td>
					<span class="badge bg-<?= $project->status === 'active' ? 'success' : 'secondary'; ?>">
						<?= ucfirst($project->status); ?>
					</span>
				</td>
				<td class="d-flex justify-content-center gap-2">
				<a href="#" data-bs-toggle="tooltip" title="Edit">
					<i class="bi bi-pencil-square fs-5 text-warning"></i>
				</a>
				<a href="<?= site_url('project/view/'.$project->id); ?>" data-bs-toggle="tooltip" title="View">
					<i class="bi bi-eye fs-5 text-info"></i>
				</a>
				<a href="#" data-bs-toggle="tooltip" title="Reorder">
					<i class="bi bi-arrow-down-up fs-5 text-success"></i>
				</a>
				<a href="#" data-bs-toggle="tooltip" title="Delete">
					<i class="bi bi-trash fs-5 text-danger"></i>
				</a>
				</td>

			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

</div>

<?php $this->load->view('layouts/footer'); ?>
