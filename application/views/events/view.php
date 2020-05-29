<head>
	<h2><?php echo $event['title'] ?></h2>
	<small class="post-date">Posted on: <?php echo $event['created_at']; ?></small><br/>
	<small class="post-date">Save the Date: <?php echo $event['date']; ?>, at:  <?php echo $event['time']; ?> </small><br/>
	<small>Located: <?php echo $event['location']?> </small><br/>
	<br/>
	<meta property="og:url"           content="https://www.your-domain.com" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Student Calender View Event" />
	<meta property="og:description"   content="Come checkout my event on StudentCalender: <?php echo $event['description'] ?>" />
</head>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<div class="fb-share-button"
	 data-href="https://www.your-domain.com/your-page.html"
	 data-layout="button_count">
</div>

<hr>
<div class="event-body">
		<?php echo $event['description'] ?>

</div>
<hr>
<h5>Pledged Users:</h5>

<div>
	<br>
	<?php foreach($invitees as $invited) : ?>
		<?php echo $invited['first_name'] ?>
		<?php echo $invited['last_name'] ?>,
	<?php endforeach; ?>
</div>
<?php if($this->session->userdata('user_id') == $event['user_id']): ?>
<hr>
<a class="btn btn-default pull-left" href="edit/<?php echo $event['slug']; ?>">Edit Event</a>
<?php echo form_open('/events/delete/'.$event['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form
<?php endif; ?>
<button type="button" name="cancel" class="btn btn-default">
	<a href="<?php echo base_url()."events"?>">Back</a>
</button>

