<html>
		<head>
			<title>Student Calender</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
			<meta content="width=device-width, initial-scale=1" name="viewport" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>
			<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
		</head>
		<body>
		<?php
			$this->load->view('templates/navbar');
		?>

		<div class="container">
			<?php if($this->session->flashdata('user_registered')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('event_created')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('event_created').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('event_updated')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('event_updated').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('event_deleted')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('event_deleted').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('login_failed')): ?>
				<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('user_loggedin')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('user_loggedout')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('account_updated')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('account_updated').'</p>'; ?>
			<?php endif; ?>
<!--	Create flash message for when joining a public event		-->

