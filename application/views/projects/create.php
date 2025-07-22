
<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="col-md-9 col-lg-10 main-content p-5 d-flex justify-content-center">
	
		<div style="width: 50%;">
			<p class="display-6 poppins m-0 p-0 mb-3">Create New Project</p>
		
		
		<?php if (validation_errors()): ?>
			<div class="alert alert-danger">
				<?= validation_errors(); ?>
			</div>
		<?php endif; ?>

		<?= form_open() ?>
			<section class="card shadow mb-3 px-5">
				<div class="card-body">
				<h3>Project Group</h3>
				<div class="form-floating mb-3">
					<select name="group_id" id="group_id" class="form-select">
						<option value="" selected>--Select Group--</option>
						<?php foreach ($groups as $group): ?>
							<option value="<?= $group->id ?>" <?= set_select('group_id', $group->id) ?>>
								<?= $group->name ?>
							</option>
						<?php endforeach; ?>
						<option value="other">Add New Project</option>
					</select>
					<label for="group_id">Project Group Name</label>
					
				</div>

				<div id="new-project-group-container" class="mb-3" style="display: none;"></div>
				</div>
			</section>
			<section class="card shadow mb-3 px-5">
				<div class="card-body">
					<h3 class="text-muted jetbrains-mono">Project Details</h3>
				<div class="form-floating mb-3">
					<input type="text" name="name" id="name" value="<?= set_value('name') ?>" class="form-control" placeholder="Project Name" required>
					<label for="name">Project Name</label>
				</div>

				<div class="form-floating mb-3">
					<input type="text" name="nature" id="nature" value="<?= set_value('nature') ?>" class="form-control" placeholder="e.g., Laravel, React, CI3">
					<label for="nature">Tech Stack</label>
				</div>

				<div class="form-floating mb-3">
					<input type="url" name="repo_link" id="repo_link" value="<?= set_value('repo_link') ?>" class="form-control" placeholder="https://github.com/...">
					<label for="repo_link">Repository Link</label>
				</div>
				
				<div class="form-floating mb-3">
					<input type="text" name="deploy_type" id="deploy_type" value="<?= set_value('deploy_type') ?>" class="form-control" placeholder="Local">
					<label for="deploy_type">Deployment Type</label>
				</div>

				<div class="form-floating mb-3">
					<input type="url" name="deploy_link" id="deploy_link" value="<?= set_value('deploy_link') ?>" class="form-control" placeholder="https://example.com">
					<label for="deploy_link">Deployment Link</label>
				</div>

				<div class="form-floating mb-3">
					<textarea name="description" id="description" class="form-control" placeholder="Project Description"><?= set_value('description') ?></textarea>
					<label for="description">Project Description</label>
				</div>
				</div>
			</section>

			<button type="submit" class="btn btn-brand">Save Project</button>
			<a href="<?= site_url('project') ?>" class="btn btn-secondary">Cancel</a>
			<?= form_close() ?>

		</div>
</div>
<script>
$(document).ready(function () {
    $('#group_id').on('change', function () {
        const selectedValue = $(this).val();
        const container = $('#new-project-group-container');

        if (selectedValue === 'other') {
            // Only add the content if it's not already there
            if (!$('#new_group_name_input').length) {
                container
                    container
						.hide()
						.html(`
							<div class="form-floating mb-3">
								<input type="text" name="new_group_name" id="new_group_name_input" class="form-control" placeholder="New Project Group Name" required>
								<label for="new_group_name_input">New Project Group Name</label>
							</div>
							<div class="form-floating mb-3">
								<textarea name="new_group_description" id="new_group_description_input" class="form-control" placeholder="Project Group Description" required></textarea>
								<label for="new_group_description_input">Project Group Description</label>
							</div>
						`)
						.slideDown(300);

            }
        } else {
            container.slideUp(200, function () {
                container.empty();
            });
        }
    });
});


</script>
<?php $this->load->view('layouts/footer'); ?>
