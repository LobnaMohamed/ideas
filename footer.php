<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<!-- jquery-ui -->
<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->


<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
<script src="jquery-ui/jquery-ui.min.js"></script>
<script>
 // If not native HTML5 support, fallback to jQuery datePicker
	if ( $('[type="date"]').prop('type') != 'date' ) {
	    $('[type="date"]').datepicker({dateFormat : 'yy-mm-dd'});
	}
</script>
			
	<footer  class="footer navbar-fixed-bottom">
<!-- 		<div class="navbar-header ">
	  		<a class="navbar-brand" href="#">Computer UserName: <?php echo getenv("username"); ?></a>

	  		 <?php if (isset($_SESSION['Username'])){ ?>
		  		 	<a class="navbar-brand" href="#"><?php echo $_SESSION['UserFullName'] ;?></a>
		  	<?php	} ?>
		</div> -->
	</footer>

</body>
</html>