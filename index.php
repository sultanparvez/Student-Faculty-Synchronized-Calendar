<?php
	include 'signup.php';
?>


<section class="main-container">
	<div class="main-wrapper">
		<h1> Welcome to BRACU Calendar </h1>
		<?php
			if (isset($_SESSION['Username'])) {
				//echo "you are logged in!";
			}
		?>	
	</div>
</section>


<?php
	include 'footer.php';
?>
