<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('events/update') ?>
<input type="hidden" name="id" value="<?php echo $event['id'];?>"/>
<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $event['title'];?>">
</div>
<div class="form-group">
	<label>Description</label>
	<textarea id="editor1" class="form-control" name="description"><?php echo $event['description'];?></textarea>
</div>
<div class="form-group">
	<label>Location</label>
	<input type="text" class="form-control" name="location" value="<?php echo $event['location'];?>"/>
</div>
<div class="form-group">
	<label>Date</label>
	<br>Current Date: <?php echo $event['date']?>
	<input type="date" class="form-control" name="date" />
</div>
<div class="form-group">
	<label>Time</label>
	<br>Current Time: <?php echo $event['time']?>
	<input type="time" class="form-control" name="time" />
</div>
<div class="form-group">
	<label>Invitees</label>
	<select name="invitees[]" multiple class="form-control">
		<?php
		foreach($users as $user){ ?>
			<?php
				if(!empty(array_search($user->id, array_column($invitees, "user_id")))){ ?>
					<option selected value="<?= $user->id ; ?>"> <?= $user->id ; ?> <?= $user->first_name ?> <?= $user->last_name ?></option>
					<?php
				}else{ ?>
					<option value="<?= $user->id ; ?>"> <?= $user->id ; ?> <?= $user->first_name ?> <?= $user->last_name ?></option>
				<?php }
				}
			?>
	</select>
</div>
<button type="submit" class="btn btn-default">Submit</button>
<button type="button" name="cancel" class="btn btn-default">
<!--	cancel link does not change no matter what I do	-->
	<a href="<?php echo base_url()."events/".$slug ?>">Back</a>
</button>


