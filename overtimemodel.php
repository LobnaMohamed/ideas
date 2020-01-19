<?php

	require 'functions.php';
	include 'header.php';
?>
<div class="container">
    <div class="page-header text-center">
        <h2>طلب تصريح تشغيل في غير مواعيد العمل الرسمية</h2> 
    </div>
    <!-- <header class="row text-center"> -->
		<!-- <img class= "logo col-sm-1" src="images/amoc2.png"> -->
        <!-- <h2 class="col-sm-4 col-sm-offset-2 ">نموذج السهــــر</h1><br>	    -->
        <!-- <h2 class="col-sm-12 title">طلب تصريح تشغيل في غير مواعيد العمل الرسمية</h2>  -->
    <!-- </header>	   -->
    <form  method="POST" action="add.php" id="overtimeForm" onsubmit="return confirm('تأكيد ارسال السهر');">
        <div class="row">
            <div class="col-sm-10">
                <div class="col-sm-3">
                    <input type="date" class ="form-control" name="overtimeDate" id="overtimeDate">
                </div>
                <div class="col-sm-1">
                    <label for="overtimeDate">التاريخ</label>
                </div>

                <div class="col-sm-4">
                    <select class="form-control" id="Management" name="Management">
                        <option selected disabled hidden style='display: none' value=''></option>
                        <?php  	getManagement();   ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <label for="Management" >الادارة العامة:</label>
                </div>
            </div>
            <div class="col-sm-2">
                <button id="Add" type="button" class="btn btn-primary">إضافة<i class="fa fa-plus fa-fw plus-icon"></i></button>
                <button id="remove" type="button" class="btn btn-danger">حذف<i class="fa fa-plus fa-fw plus-icon"></i></button>
            </div>
        </div>
        <table id="overtimeTable" class="table table-striped table-bordered table-responsive">		
            <thead>
                <tr>
                    <th class="col-xs-1">رقم القيد</th>
                    <th class="col-xs-2">الاســـم</th>
                    <th class="col-xs-2">سبب التشغيل</th>
                    <th class="col-xs-2">ساعات التشغيل المصرح بها</th>
                    <th class="col-xs-2">نوع التشغيل (إضافى/بدل راحة)</th>
                </tr>		
            </thead>
            <tbody id="overtimebody">
                <tr id="index[1]">
                    <td>		    	
                        <input type="number" class="form-control inputcode" id="code[1]" name="code[1]" 
                        placeholder="رقم القيد.." tabindex="1">
                        <input hidden type="text" id="empID[1]" name="empID[1]" class="inputID"/>
                    </td>
                    <td>
                        <input type="text" class="form-control inputname" id="name[1]" name="name[1]" 
                        placeholder="الاســـــم.." >	

                    </td>
                    <td><input type="text" class="form-control" id="reason[1]" name="reason[1]" value="حاجه العمل" tabindex="2"></td>
                    <td><input type="text" class="form-control" id="hoursTill[1]" name="hoursTill[1]" value="فور الانتهاء" tabindex="3"></td>
                    <td>
                        <select class="form-control" id="overtimeType[1]" name="overtimeType[1]" tabindex="4">
                            <option   value='إضافي'>إضافي</option>
                            <option   value='بدل راحة'>بدل راحة</option>
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
                        <select class="form-control" id="Manager" name="Manager"  tabindex="3">
                            <option selected disabled hidden style='display: none' value=''></option>
                            <?php 	getManagers();   ?>			    
                        </select>
                    </td>
                    <td>
                        <select class="form-control" id="topManager" name="topManager"  tabindex="3">
                            <option selected disabled hidden style='display: none' value=''></option>
                            <?php 	getTopManagers();   ?>			    
                        </select>
                    </td>
                    <td>
                        Approval status
                    </td>
                </tr>
            </tfoot>
        </table>
        <div>
            <input type="submit" name="submitOvertime" value="إرســــال" id="submitOvertime" class="btn btn-primary col-sm-2 col-sm-offset-5">
        </div>			
    </form>
</div>
<?php include 'footer.php'; ?>
