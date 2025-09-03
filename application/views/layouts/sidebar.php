<div class="col-md-2 col-lg-2 sidebar position-fixed">
  
  <nav class="nav flex-column justify-content-between h-100">
	
	<div>
		<h4 class="pt-3 d-flex align-items-center justify-content-center gap-3"><img src="<?= base_url('assets/images/pm1.webp')?>" class="img-fluid" width="40px"/><span class="fs-6 fw-bolder">Project Manager v1</span></h4>	
		<hr>
    <a class="nav-link rounded-3 d-flex gap-3" href="<?= site_url('project/add') ?>"><i class="bi bi-plus-square-dotted"></i> <span>Add Project</span></a>
	<a class="nav-link rounded-3 d-flex gap-3" href="<?= site_url('group/all') ?>"><i class="bi bi-collection"></i> <span>View Groups</span></a>
	<a class="nav-link rounded-3 d-flex gap-3" href="<?= site_url('project/all') ?>"><i class="bi bi-kanban"></i> <span>View Projects</span></a>
    <a class="nav-link rounded-3 d-flex gap-3" href="<?= site_url('dashboard') ?>"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a>
	</div>
	<div>
		<hr>
    <a class="nav-link rounded-3 text-center" href="#"><i class="bi bi-gear"></i> Settings</a>
    <a class="nav-link text-danger rounded-3 text-center" href="<?= site_url('auth/logout') ?>"><i class="bi bi-box-arrow-right text-white"></i> Logout</a>
	</div>
  </nav>
</div>
<div class="col-md-2"></div>
