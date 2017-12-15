<?php
	if (isset($_SESSION["loggedin"])){
		if ($_SESSION["loggedin"] == "loggedin"){
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
		else if ($_SESSION["loggedin"] == "loggedout"){
			?>
			<style>
				.hide_logged_in {
					display:inline;
				}
				.show_logged_in {
					display: none;
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
			.hide_logged_in {
					display:inline;
				}
		</style>
		<?php
	}
?>