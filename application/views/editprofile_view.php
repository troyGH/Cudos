<?php $this->load->view('template/header.php'); ?>
<div class="container custom-body">
<?php
$userID = $this->session->userdata('customer_id');
echo $userID; ?>
</div> <!-- /container -->
<?php $this->load->view('template/footer.php'); ?>
