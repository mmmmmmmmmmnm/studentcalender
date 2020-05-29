<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Student Calender</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
			</li>
			<?php if($this->session->userdata('logged_in')) : ?>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>events">Your events</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>events/create">Create Event</a></li>

			<?php endif; ?>

		</ul>
		<ul class="navbar-nav mr-auto pull-right">
			<?php if(!$this->session->userdata('logged_in')) : ?>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a></li>
			<?php endif; ?>
			<?php if($this->session->userdata('logged_in')) : ?>
				<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
			<?php endif; ?>
		</ul>
	</div>
</nav>
