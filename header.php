<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
	<title>الاجازات</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<nav class="navbar navbar-inverse fixed-top">

		<div class="container-fluid">
			<div class="navbar-header ">
		  		<!-- <a class="navbar-brand" href="#">Computer Name: <?php  
						if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
					    {
					      $ip=$_SERVER['HTTP_CLIENT_IP'];
					    }
					    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
					    {
					      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
					    }
					    else
					    {
					      $ip=$_SERVER['REMOTE_ADDR'];
					    }
					    echo $ip;   
		  		 ?></a> -->
				<div class="navbar-brand">
				   
					<span >Computer Name: <?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?>
						<img class= "logo col-sm-1" src="images/amoc2.png"><br>
						<?php if (isset($_SESSION['Username'])){ 
								echo $_SESSION['UserFullName'] ;
							} 
						?>
					</span>
				</div>
				<div>
							
				</div>
			</div>
			
			<div class="navbar-header navbar-right">
			  <span class="navbar-brand">شركة الأسكندرية للزيوت المعدنية ( أموك )</span>  
			</div>

			<ul class="nav navbar-nav pull-right">
				<?php
					if (isset($_SESSION['Username']))
					{
				?>
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">إرســــال
					<span class="caret"></span></button>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="vacationmodel.php">اجازة</a></li>
						<!-- <li><a href="permitModel.php">تصريح</a></li> -->
					</ul>
				</div>
			   <!-- emp or manager or top manager in adminstration -->
				<?php if($_SESSION['UserGroup']==3  || $_SESSION['UserGroup']==5 || $_SESSION['UserGroup']==6){ ?>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">بيانـــات
						<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="empdata.php">بيانات العاملين</a></li>
							<li><a href="managements.php">الادارات العامة</a></li>
						</ul>
					</div>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">إعتمادات الاجازات
						<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							<li class="dropdown-header">الاجازات</li>
							<li><a href="pending.php">الاجازات المطلوب تسجيلها</a></li>
							<li><a href="confirmed.php">الاجازات المسجلة</a></li>
							<li><a href="pendingAtTopmgr.php">الاجازات المعلقة عند المدير</a></li>							
						</ul>
					</div>
					<!-- <div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> إعتمادات التصاريح
						<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="pendingPermit.php">التصاريح المطلوب تسجيلها</a></li>
							<li><a href="confirmedPermit.php">التصاريح المسجلة</a></li>
						</ul>
					</div> -->
					
				<?php 
				// direct manager or top manager
					 }elseif($_SESSION['UserGroup']==1 || $_SESSION['UserGroup']==2){ ?>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">إعتمادات
						<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							<li class="dropdown-header">الاجازات</li>
							<li><a href="pending.php">الاجازات المطلوب اعتمادها</a></li>
							<li><a href="confirmed.php">الاجازات المعتمدة</a></li>
							<!-- <li class="dropdown-header">التصاريح</li>
							<li><a href="pendingPermit.php">التصاريح المطلوب اعتمادها</a></li>
							<li><a href="confirmedPermit.php">التصاريح المعتمدة</a></li>	 -->
						</ul>
					</div>
				<?php 	   
					 }
				?>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">سجـــلات
						<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="myvacationstatus.php">إجـــــازاتى</a></li>
							<!-- <li><a href="mypermitstatus.php">التصــــاريح</a></li> -->
						</ul>
					</div>
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">طور شركتك بفكرتك!
						<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="ideamodel.php"  >طور شركتك بفكرتك!</a></li>
							<li><a href="pendingideas.php"  >الافكار المطلوب تقييمها</a></li>
							<li><a href="assignideas.php"  >اسناد الافكار</a></li>
							<li><a href="ratedideas.php">الافكار التى تم تقييمها</a></li>
							

						</ul>
					</div>
					<!-- <a href="ideamodel.php"  class="btn btn-primary dropdown-toggle">طور شركتك بفكرتك!</a> -->
					<a href="logout.php"  class="btn btn-primary dropdown-toggle">خــــروج</a>
				<?php 
					}
			 	?>
			</ul>
		</div>
	</nav>