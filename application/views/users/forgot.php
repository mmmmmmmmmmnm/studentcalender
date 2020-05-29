<?php echo form_open('', "id='fpassw'"); ?>
<div class="row">
	<div class="coll-md-4 col-md-offset-4">
		<h1 class="text-centre">Enter your email address:</h1>
		<hr>
		<div class="form-group">
			<input type="email" name="email" id="email" class="form-control" placeholder="john@example.com" required autofocus>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Reset Password</button>
</div>
<?php echo form_close(); ?>

<?php echo form_open('', "id='security_question' class='d-none'"); ?>
<div class="row">
	<div class="coll-md-4 col-md-offset-4">
		<h1 id="security_q" class="text-centre"></h1>
		<hr>
		<div class="form-group">
			<input type="text" name="security_a" id="security_a" class="form-control" placeholder="Bloggs" required autofocus>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
<?php echo form_close(); ?>

<?php echo form_open('', "id='password_reset' class='d-none'"); ?>
<div class="row">
	<div class="coll-md-4 col-md-offset-4">
		<h1 id="password_reset" class="text-centre"></h1>
		<hr>
		<div class="form-group">
			<input type="text" name="new_pass" id="new_pass" class="form-control" placeholder="password" required autofocus>
		</div>
		<div class="form-group">
			<input type="text" name="confirm_pass" id="confirm_pass" class="form-control" placeholder="password" required autofocus>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
<?php echo form_close(); ?>


<script>
	var base_url = '<?php echo base_url(); ?>';
	$(document).ready(function() {
		$('#fpassw').submit(function(e){
			e.preventDefault();
			// $email = $('#email').val();

			$fdata = $(this).serialize();
			// console.log($fdata);return;
			$.ajax({
				type: "POST", url: base_url+'users/process_fpassw', data: $fdata, dataType: 'json',
				success: function(response) {
					console.log(response);
					if(response.status) {
						$('#security_q').text(response.security_q);
						$('#fpassw').addClass('d-none');
						$('#security_question').removeClass('d-none');
					} else {
						alert(response.error);
					}
				}
			});
		});



		$('#fpassw').submit(function(e){
			e.preventDefault();
			// $email = $('#email').val();

			$fdata = $(this).serialize();
			// console.log($fdata);return;
			$.ajax({
				type: "POST", url: base_url+'users/process_fpassw', data: $fdata, dataType: 'json',
				success: function(response) {
					console.log(response);
					if(response.status) {
						$('#security_q').text(response.security_q);
						$('#fpassw').addClass('d-none');
						$('#security_question').removeClass('d-none');
					} else {
						alert(response.error);
					}
				}
			});
		});



	});


</script>
