<?php
	session_start();
	if(isset($_SESSION['Username'])){
		//echo "Welcome" . $_SESSION['Username'];
		header('Location: vacationmodel.php');//redirect
		exit();
	}
	//else{
		//header('Location: index.php');//redirect
		//exit();
	//}
	require 'functions.php';
	include 'header.php';

	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
	// 	login();
	// }
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['savePass'])){
		//print_r($_SESSION);
		// echo "savepass";
		// print_r($_POST);
		changePassword();
	}
?>
<div class="container">
	<div class="row">
		
		<h2 class="text-center ">تسجيل الدخول لبرنامج الاجازات</h2>
	</div>
	
	
		<form class="form-signin" id = "signin" action ="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

			<label for="username" >رقم القيد:</label>
			<input class="form-control" type="number" name="username" required autocomplete="off"><br>
			
			<label for="password" >كلمة المرور:</label>
			<input class="form-control" type="password" name="password" required autocomplete="new-password"><br>
			
			<input class="btn btn-primary btn-block btn-lg" type="submit" name="login" id="loginBtn" value="دخول"><br>
			
			<input class="btn btn-danger btn-block btn-lg" type="button" name="changePass" value="تغيير كلمة المرور" data-toggle="modal" data-target="#changePassModal" >	
		</form>

		<!-- change password modal -->
		<div id="changePassModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-md">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title text-center"><strong>تغيير كلمة المرور: </strong></h4>
					</div>
					<div class="modal-body row">
						<!-- error message -->
						<div class="alert alert-danger alert-dismissable hide text-center" role="alert" id="modalAlert">
							<a  class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>كلمة المرور يجب أن تكون 7 حروف أو أكثر !</strong>
						</div>
						<form method="POST" id="changePassForm" >
							<div class="form-group col-md-10 col-md-offset-1">
								<div class="alert alert-warning">
									<strong>أدخل 7 حروف أو أكثر</strong>
								</div>
								<input  type="hidden" name="user"><br>
								<input type="hidden" name="oldPass" ><br>
								
								<label for="newpassword" >كلمة المرور الجديدة:</label>
								<input class="form-control" type="password" name="newpassword" id= "newpassword" required autocomplete="new-password"><br>

								<label for="confirmpassword" >تأكيد كلمة المرور الجديدة:</label>
								<input class="form-control" type="password" name="confirmpassword" id= "confirmpassword" required autocomplete="new-password" ><br>
							</div>
							<div class="form-group col-md-4 col-md-offset-3 ">
								<input type="submit" name="savePass" class="btn btn-success btn-lg" value="حفظ">
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
<?php include 'footer.php'; ?>
