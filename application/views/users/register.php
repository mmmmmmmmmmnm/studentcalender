<?php echo validation_errors(); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php echo form_open('users/register'); ?>
		<div class="row">
			<div class="col-md-4 col-md-offset-4"
			<h2 class="text-center"><?= $title; ?></h2>
			<hr>
			<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" placeholder="Joe">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="last_name" placeholder="Bloggs">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" placeholder="joebloggs@domain.com">
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">
					<label>Security Question:</label>
					<input type="text" class="form-control" name="security_question" value="What is your mothers maiden name?">
				</div>
				<div class="form-group">
					<label>Security Question Answer:</label>
					<input type="text" class="form-control" name="security_answer" placeholder="Bloggs">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
				</div>
					<div class="g-recaptcha" data-sitekey="6LevEv0UAAAAAO06TY_hwLYNYJFgICoERoRAWF78"></div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		
<?php echo form_close(); ?>
