<?php 

function get_day_html( $item ) {
	$output = "
		<div class='day'>
			<a href='" . $item['link'] . "'>
				<div class='day-number-container'>
					<span class='day-number'> <!-- Generated through JS --> </span>
				</div>
				<h2 class='day-name'>" . $item['name'] . "</h2>
				<p class='day-summary'>" . $item['summary'] . "</p>
			</a>
		</div>";
	return $output;
};

?>