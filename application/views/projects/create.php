
<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="col-md-9 col-lg-10 main-content">
    <h2 class="mb-4">Create New Project</h2>

    <?php if (validation_errors()): ?>
        <div class="alert alert-danger">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <?= form_open('project/create') ?>

        <div class="mb-3">
            <label for="group_id" class="form-label">Project Group</label>
            <select name="group_id" id="group_id" class="form-select" required>
                <option value="">-- Select Group --</option>
                <?php foreach ($groups as $group): ?>
                    <option value="<?= $group->id ?>" <?= set_select('group_id', $group->id) ?>>
                        <?= $group->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" name="name" id="name" value="<?= set_value('name') ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nature" class="form-label">Nature / Tech Stack</label>
            <input type="text" name="nature" id="nature" value="<?= set_value('nature') ?>" class="form-control" placeholder="e.g., Laravel, React, CI3, Express">
        </div>

        <div class="mb-3">
            <label for="repo_link" class="form-label">Repository Link</label>
            <input type="url" name="repo_link" id="repo_link" value="<?= set_value('repo_link') ?>" class="form-control" placeholder="https://github.com/...">
        </div>

        <div class="mb-3">
            <label for="deploy_link" class="form-label">Deployment Link</label>
            <input type="url" name="deploy_link" id="deploy_link" value="<?= set_value('deploy_link') ?>" class="form-control" placeholder="https://example.com">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Project Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"><?= set_value('description') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Project</button>
        <a href="<?= site_url('project') ?>" class="btn btn-secondary">Cancel</a>

    <?= form_close() ?>
</div>

<?php $this->load->view('layouts/footer'); ?>
