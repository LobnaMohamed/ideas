<?php
	session_start();
	if(!isset($_SESSION['Username'])){
		header('Location: index.php');//redirect
		exit();
	}
	require 'functions.php';
	include 'header.php';

?>
<div class="container">
    <header class="row text-center">
		<img class= "logo col-sm-1" src="images/amoc2.png">
  	    <h1 class="col-sm-10  ">طور شركتك بفكرتك</h1>	    
    </header>	  
    <form  method="POST" action="add.php" id="ideaForm" onsubmit="return confirm('تأكيد ارسال الفكرة');">
    	<div class="row form-group">
		    <div class="col-sm-10 col-sm-offset-1">
                <input hidden type="text" id="emp" name="empID"/>
                <label for="code">رقم القيد</label>
		    	<input type="number" class="form-control" id="code" name="code" placeholder="رقم القيد.." tabindex="1">
	    		<label for="name" >الاســـــم</label>
	    		<input type="text" class="form-control" id="name" name="name" placeholder="الاســـــم.." required readonly>
				<label for="ideatext" >الفكرة</label>
	    		<textarea  class="form-control" id="ideatext" name="ideatext" placeholder="فكرتك.." required rows="3"></textarea>
                <label for="idea_attachment" >ملحقات</label>
	    		<input type="file" class="form-control" id="idea_attachment" name="idea_attachment" >
           
            </div>					
        </div>

		<div class = "row form-group">
			<div class="col-sm-6 col-sm-offset-3">
				<input class ="btn btn-primary form-control" type="Submit" value="ارســــــال" name="submitidea">
                <!-- <i class="fa fa-send fa-fw send-icon"></i>			 -->
                
                <!-- <button  class ="btn btn-primary form-control" type="submit">
                    <span><i class="fa fa-send fa-fw send-icon"></span></i>   ارســــــال   </button> -->
			</div>	
		</div>
    </form>
</div>
	<?php include 'footer.php'; ?>
