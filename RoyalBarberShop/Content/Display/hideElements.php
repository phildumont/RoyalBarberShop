<?php
	if (isset($_SESSION["loggedin"])){
		if ($_SESSION["loggedin"] == true){
			?>
			<style>
				.hide_logged_in {
					display:none;
				}
				.show_logged_in {
					display: inline;
				}
			</style>
			<?php
		}
	}
	else {
		?>
		<style>
			.show_logged_in {
				display: none;
			}
</style>
		<?php
	}
?>