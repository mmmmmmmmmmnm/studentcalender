<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('events/create') ?>
<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title">
</div>
<div class="form-group">
	<label>Description</label>
	<textarea id="editor1" class="form-control" name="description" placeholder="Add event description"></textarea>
</div>
<div class="form-group">
	<label>Location</label>
	<input type="text" class="form-control" name="location" placeholder="Add event location"/>
</div>
<div class="form-group">
	<label>Date</label>
	<input type="date" class="form-control" name="date" </input>
</div>
<div class="form-group">
	<label>Time</label>
	<input type="time" class="form-control" name="time" </input>
</div>
<div class="form-group">
	<label>Invitees</label><br>
	<select name="invitees[]" multiple class="form-control">
	<?php
		foreach($users as $user){ ?>
			<option value="<?= $user->id ; ?>"> <?= $user->first_name ?> <?= $user->last_name ?></option>
		<?php }
	?>
	</select>
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>
