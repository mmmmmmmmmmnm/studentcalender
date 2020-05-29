<?php echo validation_errors(); ?>

<?php echo form_open('users/account'); ?>
<input type="hidden" name="id" value="<?php echo $user['id'];?>"/>
	<div class="row">
		<div class="col-md-4 col-md-offset-4"
		<h2 class="text-center"><?= $title; ?></h2>
		<div class="form-group">
			<label>First Name</label>
			<input type="text" class="form-control" name="first_name" value="<?php echo $user['first_name'];?>">
		</div>
		<div class="form-group">
			<label>Last Name</label>
			<input type="text" class="form-control" name="last_name" value="<?php echo $user['last_name'];?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email" value="<?php echo $user['email'];?>">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" value="<?php echo $user['password'];?>">
		</div>
	</div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

<?php echo form_close(); ?>
