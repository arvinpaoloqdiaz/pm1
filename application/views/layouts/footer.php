</div> <!-- /.container -->
</div>
<!-- jQuery -->


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>

<!-- Flash Alert Script -->
<script>
<?php if ($this->session->flashdata('success')): ?>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?= $this->session->flashdata("success"); ?>'
    });
<?php elseif ($this->session->flashdata('error')): ?>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '<?= $this->session->flashdata("error"); ?>'
    });
<?php endif; ?>
</script>

</body>
</html>
