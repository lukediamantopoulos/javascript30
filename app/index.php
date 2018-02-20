<?php include 'header.php'; ?>

	<div class="wrapper">
		<div class="container-flex">

			<?php 
				for ($i = 1; $i <= count($classes); $i++) { 
					echo get_day_html($classes[$i]);  
				}
			?>
		
		</div>
	</div>
<?php include 'footer.php'; ?>
