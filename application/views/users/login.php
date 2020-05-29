<?php echo form_open(); ?>
<div class="row">
	<div class="coll-md-4 col-md-offset-4">
		<h1 class="text-centre"><?php echo $title; ?></h1>
		<hr>
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Enter username" value="<?php if (get_cookie('uusername')) { echo get_cookie('uusername'); } ?>" required autofocus>
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" placeholder="Enter password" value="<?php if (get_cookie('upassword')) { echo get_cookie('upassword'); } ?>" required autofocus>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
		<div class="form-group">
			<input type="checkbox" name="chkremember" value="Remember me" <?php if (get_cookie('uusername')) { ?> checked="checked" <?php } ?>> Remember Me
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-default">
				<a href="<?php echo base_url()."users/forgot" ?>">Forgot password?</a>
			</button>
			<button type="button" class="btn btn-default">
				<a href="<?php echo base_url()."users/register" ?>">Create account</a>
			</button>
		</div>
	</div>


</div>
<?php echo form_close(); ?>
