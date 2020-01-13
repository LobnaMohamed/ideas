<?php

	require 'functions.php';
	include 'header.php';
?>

<!-- 
 <button id="Add">Click to add textbox</button> 
 <button id="Remove">Click to remove textbox</button>  


<div id="textboxDiv">

</div>   -->
<div class="container">
    <header class="row text-center">
		<img class= "logo col-sm-1" src="images/amoc2.png">
        <!-- <h2 class="col-sm-4 col-sm-offset-2 ">نموذج السهــــر</h1><br>	    -->
        <h2 class="col-sm-10 ">طلب تصريح تشغيل في غير مواعيد العمل الرسمية</h2> 
    </header>	  
    <form  method="POST" action="add.php" id="vacForm" onsubmit="return confirm('تأكيد ارسال الاجازة');">
        <!-- action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" -->
        <table id="pendingVac" class="table table-striped table-bordered table-responsive">		
            <thead>
                <tr>
                    <th class="col-xs-1">رقم القيد</th>
                    <th class="col-xs-2">الاسم</th>
                    <th class="col-xs-2">سبب التشغيل</th>
                    <th class="col-xs-2">ساعات التشغيل المصرح بها</th>
                    <th class="col-xs-2">نوع التشغيل (إضافى/بدل راحة)</th>
                    <th class="col-xs-1"><button id="Add">إضافة<i class="fa fa-plus fa-fw plus-icon"></i></button></th>

                </tr>		
            </thead>
            <tbody id="pendingideabody">
                <tr>
                    <td>		    	
                        <input type="number" class="form-control" id="code" name="code" 
                        placeholder="رقم القيد.." tabindex="1">
                        <input hidden type="text" id="emp" name="empID"/>
                    </td>
                    <td>
                    <input type="text" class="form-control" id="name" name="name" 
                    placeholder="الاســـــم.." required readonly>	

                    </td>
                    <td><input type="text" class="form-control" id="reason" name="reason" value="حاجه العمل"></td>
                    <td><input type="text" class="form-control" id="hoursTill" name="hoursTill" value="فور الانتهاء"></td>
                    <td>
                        <select class="form-control" id="manager" name="manager" tabindex="2">
                            <option   value='إضافي'>إضافي</option>
                            <option    value='بدل راحة'>بدل راحة</option>
                            

                            
                        </select>	
                    </td>

                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>مدير الإدارة</th>
                    <th>مدير عام مساعد</th>
                    <th>يعتمد... </th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <select class="form-control" id="topManager" name="topManager" required tabindex="3">
                            <option selected disabled hidden style='display: none' value=''></option>
                            <?php 	getManagers();   ?>			    
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="topManager" name="topManager" required tabindex="3">
                            <option selected disabled hidden style='display: none' value=''></option>
                            <?php 	getTopManagers();   ?>			    
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="topManager" name="topManager" required tabindex="3">
                            <option selected disabled hidden style='display: none' value=''></option>
                            <?php 	getTopManagers();   ?>			    
                        </select>
                    </td>
                </tr>
            </tfoot>
        </table>
        <div>
            <input type="submit" name="updateRating" value="إعتمــــاد" id="ideaAgree" class="btn btn-success col-sm-2 col-sm-offset-5">
        </div>			
    </form>
</div>
<?php include 'footer.php'; ?>
