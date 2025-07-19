<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="col-md-9 col-lg-10 main-content">
  <h3>Hello, <?= $this->session->userdata('username') ?>!</h3>
  <p>Welcome to your dashboard.</p>

  <div class="row">
    <div class="col-md-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="card-title">Quick Stat</h5>
          <p class="card-text">Example value: 123</p>
        </div>
      </div>
    </div>
    <!-- Add more dashboard cards here -->
  </div>
</div>

<?php $this->load->view('layouts/footer'); ?>
