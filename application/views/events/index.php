<h1><?= $title ?></h1><br><br>
<hr>
<?php foreach($events as $event) : ?>
	<h3><?php echo $event['title']; ?></h3>
	<small class="post-date">Save the Date: <?php echo $event['date']; ?>, at:  <?php echo $event['time']; ?> </small><br/>
	<small>Located: <?php echo $event['location']?> </small>
	<br>
	<?php echo word_limiter($event['description'], 10); ?>
	<br>
	<p><a class="btn btn-default"  href="<?php echo site_url('/events/'.$event['slug']); ?>">More Info</a></p>
	<hr>
<?php endforeach; ?>
