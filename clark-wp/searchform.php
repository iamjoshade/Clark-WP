<?php $unique_id = esc_attr(uniqid());?>
<form action="<?php echo esc_url(home_url('/'));?>" method="get" role="search" class="search-form">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Type a keyword and hit enter"  name='s' id="">
	</div>
</form>
