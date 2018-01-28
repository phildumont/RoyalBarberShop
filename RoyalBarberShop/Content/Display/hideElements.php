<?php
	//loggedin
	if (isset($_SESSION["loggedin"])){
		if ($_SESSION["loggedin"] == "loggedin"){
			?>
			<style>
				.hide_logged_in {display:none;}
				.show_logged_in {display: inline;}
			</style>
			<?php
		}
		else if ($_SESSION["loggedin"] == "loggedout"){
			?>
			<style>
				.hide_logged_in {display:inline;}
				.show_logged_in {display: none;}
			</style>
			<?php
		}
	}
	else {
		?>
		<style>
			.show_logged_in {display: none;}
			.hide_logged_in {display:inline;}
		</style>
		<?php
	}
	//admin
	if (isset($_SESSION["admin"])){
		if ($_SESSION["admin"] == "admin"){
			?>
			<style>
				.show_admin {display: inline;}
			</style>
			<?php
		}
		else if ($_SESSION["admin"] == "no"){
			?>
			<style>
				.show_admin {display: none;}
			</style>
			<?php
		}
	}
	else {
		?>
		<style>
			.show_admin {display: none;}
		</style>
		<?php
	}
	//barber
	if (isset($_SESSION["barber"])){
		if ($_SESSION["barber"] == "yes"){
			?>
			<style>
				.show_barber {display: inline;}
				.hide_barber {display: none;}
			</style>
			<?php
		}
		else if ($_SESSION["barber"] == "no"){
			?>
			<style>
				.show_barber {display: none;}
				.hide_barber {display:inline;}
			</style>
			<?php
		}
	}
	else {
		?>
		<style>
			.show_barber {display: none;}
			.hide_barber {display: inline;}
		</style>
		<?php
	}
?>