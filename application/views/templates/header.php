<html>
		<head>
			<title>Student Calender</title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>
			<script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
		</head>
		<body>
		<nav class="navbar navbar-inverse">
			<div class="container"
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url(); ?>"> studentCalender</a>
			</div>
			<div id="navbar">
				<ul class="nav navbar-nav">

					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="<?php echo base_url(); ?>about">About</a></li>
					<?php if($this->session->userdata('logged_in')) : ?>
					<li><a href="<?php echo base_url(); ?>events">Your events</a></li>
					<?php endif; ?>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if(!$this->session->userdata('logged_in')) : ?>
						<li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
						<li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
					<?php endif; ?>
					<?php if($this->session->userdata('logged_in')) : ?>
					<li><a href="<?php echo base_url(); ?>events/create">Create Event</a></li>
					<li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>

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

