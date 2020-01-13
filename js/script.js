/*global $, alert, console*/
$(document).ready(function(){


	//var currentActivePage ;
		 //   currentActivePage = document.location.href.match(/[^\/]+$/)[0];
	 //   if(currentActivePage != null){
		// $('a[href="'+currentActivePage+'"]').attr('id', 'activePage');
	 //   }else{
		//    console.log("error");
	 //   }

	'use strict';

	//scroll down
	$("#scroll_down").click(function() {
		$('html, body').animate({
			scrollTop: $("#endOfEmpData").offset().top
		}, 2000);
		$("#scroll_down").addClass("hide");
		$("#scroll_up").removeClass("hide");
	});
	//scroll up
	$("#scroll_up").click(function() {
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 2000);
		$("#scroll_down").removeClass("hide");
		$("#scroll_up").addClass("hide");
	});


	
	var nameError = true ,
		codeError = true,
		daterror = true;
	function checkErrors() {

		if(nameError == true || codeError == true || daterror == true){
			//console.log('there is  errors');
			// alert("name cant be less than 3");

		} else {
			//console.log('form is valid');
		}
	}

	$('#name').blur(function(){
	 	if($(this).val().length <= 3){ //show error
	 		$(this).css('border', '1px solid #F00').parent().find('.custom-alert').fadeIn(300)
	 		.end().find('.asterisx').fadeIn(50);
	 		
	 		nameError = true;

	 	}else {  //no errors
	 		
	 		$(this).css('border', '1px solid #080');
	 		$(this).parent().find('.custom-alert').fadeOut(300);
	 		$(this).parent().find('.asterisx').fadeOut(50);
	 		nameError = false;
	 	}
	 	checkErrors();
	});
	//get duration between 2 dates in vacation submittion form
	$('#dateTo').change(function(){
		var startDate = $('#date').val();
		var endDate = $(this).val();
		// end - start returns difference in milliseconds 
		var diff = new Date(endDate) - new Date(startDate);
		// console.log( diff);
		// get days
		var days = (diff/1000/60/60/24)+1;
		// console.log(days);
		$('#duration').val(days);
	});
	//get duration between 2 dates in vacation EDIT submittion form
	$('#dateToEdit').change(function(){
		var startDate = $('#dateEdit').val();
		var endDate = $(this).val();
		// end - start returns difference in milliseconds 
		var diff = new Date(endDate) - new Date(startDate);
		// get days
		var days = (diff/1000/60/60/24)+1;
		$('#durationEdit').val(days);
	});

	// edit employees info modal
	$('a.edit').on('click', function() {
	    var myModal = $('#editEmp');

	    // now get the values from the table
	    var firstName = $(this).closest('tr').find('td.firstName').html();
	    var lastName = $(this).closest('tr').find('td.lastName').html();
	    // and set them in the modal:
	    $('.firstName', myModal).val(firstName);
	    $('.lastNameName', myModal).val(lastName);

	    // and finally show the modal
	    myModal.modal({ show: true });

	    return false;
	});	

 	$("input#code").bind("change", function(){
 		var empCode=$("#code").val();
 		// alert(empCode);
 		if($.trim(empCode) != ''){
 			// alert("hi");
 			$.post('ajax.php',{code:empCode}, function(data){
 				if(data == "notfound"){
 					alert("رقم القيد غير مسجل \n من فضلك ادخل رقم صحيح!");
 				}else{
 					$('#name').val(data.empName);
 					$('#emp').val(data.empID); 	
 					$('#subManagment').val(data.subManagemnet); 
 					$('#day_n').val(data.day_night);
 					$('#Management').val(data.g_manag);
					$('#ManagementName').val(data.g_manag_name);  
					$('#job').val(data.job);  
					 				
 				}
 			},"json");
 		}

	});

	$( '#vacForm' ).each(function(){
		this.reset();
	});

	$( '#ideaForm' ).each(function(){
		this.reset();
	});
	$( '#permitForm' ).each(function(){
		this.reset();
	});

	// $("#addEmpForm").on('submit',function(e){
	// 	e.preventDefault();
	// 	//alert("hi");
	// 	if($('#empName').val()==''){
	// 		alert ("Name is empty");
	// 	}else if($('#empCode').val()==''){
	// 		alert ("code is empty");
	// 	}else if($('#contractType').val()==''){
	// 		alert ("contract is empty");
	// 	}else if($('#job').val()==''){
	// 		alert ("job is empty");
	// 	}else if($('#GManagement').val()==''){
	// 		alert ("GManagement is empty");
	// 	}else if($('#level').val()==''){
	// 		alert ("level is empty");
	// 	}else if($('#day_n').val()==''){
	// 		alert ("day_n is empty");
	// 	}else if($('#active').val()==''){
	// 		alert ("active is empty");
	// 	}else{
	// 		$.ajax({
	// 			url:"insertEmp.php",
	// 			method:"POST",
	// 			data:$('#addEmpForm').serialize(),
	// 			success:function(data){
	// 				$('#addEmpForm')[0].reset();
	// 				$('#addEmpModal').modal('hide');
	// 				$('#empData').html(data);
	// 			} 
	// 			// error: function(){ //makes error when uncommented
	// 	  //           alert("Something went wrong!");
	// 	  //       }
	// 		});
	// 	}
	// });


	//--------------get employee data in edit modal---------------
	$(document).on('click','.editEmpData', function(){
		var employee_id=$(this).attr("id");
		// console.log(employee_id);
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{empID:employee_id},
			dataType:"json",
			success:function(data){
				// console.log(data);
				$('#employee_id').val(data.ID);
				$('#empNameEdit').val(data.emp_name);
				$('#empCodeEdit').val(data.emp_code);
				$('#managementEdit').val(data.management);
				$('#desc_jobEdit').val(data.desc_job);
				$('#levelEdit').val(data.level_id);
				$('#activeEdit').val(data.active);
				$('#GManagementEdit').val(data.g_management_id);
				$('#contractTypeEdit').val(data.contract_type);
				$('#jobEdit').val(data.id_job);
				$('#day_nEdit').val(data.day_night);
				$('#userGrpEdit').val(data.id_userGroup);
			}
		});
	});
	//--------------onsubmit edit form-----------------------------
	$(document).on('submit','#editEmpForm', function(){
		//alert("hi");
		//e.preventDefault();
		var $form = $('#editEmpForm');

		$.ajax({
			url:"insert.php",
			method:"POST",
			data: $('form#editEmpForm').serialize(),
			//dataType:"json",

			success:function(data){
				//console.log(data);
				$("#editEmpModal").modal('hide');	
			},
			error: function(error) {
            	alert(error);
        	}
		});		
	});
	//--------------get management data in edit modal---------------
	$(document).on('click','.editManagementData', function(){
		var management_id=$(this).attr("id");
		// console.log(management_id);
		$.ajax({
			url:"fetch_Mang.php",
			method:"POST",
			data:{managementID:management_id},
			dataType:"json",
			success:function(data){
				// console.log(data);
				$('#management_id').val(data.ID);
				$('#managementEdit').val(data.Management);
			},
			error:function(data){
				//console.log( data);
			}
		});
	});
	//--------------onsubmit edit management form-----------------------------
	$(document).on('submit','#editManagementForm', function(){
		//alert("hi");
		//e.preventDefault();
		var $form = $('#editManagementForm');

		$.ajax({
			url:"insert.php",
			method:"POST",
			data: $('form#editManagementForm').serialize(),
			//dataType:"json",

			success:function(data){
				//console.log(data);
				$("#editManagementModal").modal('hide');	
			},
			error: function(error) {
				//console.log(error);
			}
		});		
	});
	
	//--------------check in change password modal------------------
	$('#changePassModal').on('show.bs.modal', function(e) {
		//alert ("hi");
		var username = $('input[name="username"]').val();
		var password = $('input[name="password"]').val();
		//check if username or password are empty
		if(username == "" || password == ""){
			alert ("أدخل بياناتك!");
			e.preventDefault();//stop modal from showing
		}else{
		    $(e.currentTarget).find('input[name="user"]').val(username);
		    $(e.currentTarget).find('input[name="oldPass"]').val(password);
		    // on form submit
		    $('#changePassForm').on('submit', function(e){
		    	//e.preventDefault();
		    	var newPass = $.trim($(e.currentTarget).find('input[name="newpassword"]').val());
			    var confirmPass = $.trim($(e.currentTarget).find('input[name="confirmpassword"]').val());
			    if(newPass == confirmPass && newPass.length >= 7 && newPass != 1234567){
					//ajax to update password:
				    $.ajax({
				    	url:document.location.url,
						method:"POST",
						data: $('form#changePassForm').serialize(),
						success:function(data){
							 alert("تم تغيير كلمة السر بنجاح");
							 // console.log(data.result);
						},
						error: function(error) {
			            	// alert("error");
			            	// console.log(error);
			        	}
					});	
			    }else{
			    	e.preventDefault();
			    	//console.log("slidedown");
			    	$('#modalAlert').removeClass("hide");
			    	$('#changePassForm')[0].reset();
			    }
			    $('#changePassForm').on('keyup',function(){
			    	$('#modalAlert').addClass("hide");
			    });
		    });
		}
	});
 	
 	//---------------check if pass = 1234567 on login----------------

 	$('#signin').on('submit', function(e){

 		//var password = $("input[name=password]");
 		//check if pass == 1234567
 		e.preventDefault();
		$.ajax({
			url:'checkpassAjax.php',
			method:"POST",
			data: $('form#signin').serialize(),
			dataType:"json",
			success:function(data){
				//console.log(data);			
				if(data.response == "changePass"){
					alert("يجب تغيير كلمة السر!");
					$("#changePassModal").modal('show');					
				}
				if(data.response == "noouser"){
					alert ("من فضلك أدخل بيانات صحيحة");
					$( 'input[name=password]' ).val('');
					// $( '#signin' ).each(function(){
					// 	this.reset();
					// });
				}
				if(data.response == "nothing3" || data.response == "nothing"){
					 window.location.replace(data.redirect) ; 
				}
				//define it as global
				// currentActivePage = document.location.href.match(/[^\/]+$/)[0];
				// currentActivePage ;
				//$('a[href="'+currentActivePage+'"]').attr('id', 'activePage');

			},
			error: function(error) {
				//alert("error");
				//console.log(error);
			}
		});	
 	});
 	//------------search through emp data by code-----------------
 // 	$('#search').on('keyup',function(){
 // 		var value = $(this).val();
 // 		var currentURL = document.location.href.match(/[^\/]+$/)[0];
 // 		// alert(currentURL);
	// 	$.ajax({
	// 		url:'searchAjax.php',
	// 		method:"GET",
	// 		data: {search:value,pageurl:currentURL},
	// 		// dataType:"json",
	// 		success:function(data){
	// 			// console.log(data);
				
	// 			if(currentURL == 'empdata.php'){
	// 				console.log(data);
	// 				$('#empDatabody').html(data);
	// 			}else if(currentURL == 'confirmed.php'){
	// 				console.log(data);
	// 				$('#confirmedVacbody').html(data);

	// 			}else if(currentURL == 'pending.php'){
	// 				$('#pendingVacbody').html(data);
	// 			}
				
	// 		},
	// 		error: function(error) {
 //            	console.log(error);
 //        	}
	// 	});	
	// });

 	//------------search through emp vacation data by date from and to-----------------
 // 	$('#searchDateTo').datepicker({
 //     onSelect: function(){
 //     	var dateTo_value = $(this).val();
 // 		var dateFrom_value = $('#searchDateFrom').val();
 // 		var currentURL = document.location.href.match(/[^\/]+$/)[0];
 // 		// alert(currentURL);
	// 	$.ajax({
	// 		url:'datesearchAjax.php',
	// 		method:"GET",
	// 		data: {dateFrom:dateFrom_value,
	// 			    dateTo:dateTo_value,
	// 			    pageurl:currentURL},
	// 		// dataType:"json",
	// 		success:function(data){
	// 			// console.log(data);
				
	// 			if(currentURL == 'confirmed.php'){
	// 				console.log(data);
	// 				$('#confirmedVacbody').html(data);
					
	// 			}
	// 			//else if(currentURL == 'empdata.php'){
	// 			// 	console.log(data);
	// 			// 	$('#empDatabody').html(data);

	// 			// }else if(currentURL == 'pending.php'){
	// 			// 	$('#pendingVacbody').html(data);
	// 			// }
				
	// 		},
	// 		error: function(error) {
 //            	console.log(error);
 //        	}
	// 	});	
 //     }
	// });
	//-----------search confirmed vacs---------------------------- 
	$('#searchDateTo,#searchDateFrom,#searchTo,#search').bind('change keyup',function(){
		//get dates between 2 dates
	   var value = $('#search').val();
	   var valueTo =  $('#searchTo').val();
		var dateTo_value = $('#searchDateTo').val();
		var dateFrom_value = $('#searchDateFrom').val();
		var currentURL = document.location.href.match(/[^\/]+$/)[0];
	   $.ajax({
		   url:'searchAjax.php',
		   method:"GET",
		   data: {search:value,
				   searchTo:valueTo,
				   dateFrom:dateFrom_value,
				   dateTo:dateTo_value,
				   pageurl:currentURL},
		   // dataType:"json",
		   success:function(data){
			   // console.log(data);
			   
			   if(currentURL == 'confirmed.php'){
				   //console.log(data);
				   $('#confirmedVacbody').html(data);
				   
			   }
			   else if(currentURL == 'pending.php'){
				   //console.log(data);
				   $('#pendingVacbody').html(data);
				   
			   }
			   else if(currentURL == 'empdata.php'){
				   //console.log(data);
				   $('#empDatabody').html(data);

				}
				else if(currentURL == 'myvacationstatus.php'){
				   $('#VacStatusbody').html(data);
			    }
			   else if(currentURL == 'pendingPermit.php'){
					$('#pendingPermitbody').html(data);
				}
				else if(currentURL == 'confirmedPermit.php'){
					$('#confirmedPermitbody').html(data);
				}
				else if(currentURL == 'pendingAtTopmgr.php'){
					$('#pendingVacAtTopmgrbody').html(data);
				}
			   
		   },
		   error: function(error) {
			   //console.log(error);
		   }
	   });	
   });
	//delete vacation
	$('.delete_vacation').on('click',function(){
		if(confirm("سيتم حذف الاجازة نهائياً .. هل أنت متأكد؟")){
			//var vac_id=$(this).attr("id");
			var vac_id=$(this).closest('tr').attr('id');
			
			$.ajax({
				url:"done.php",
				method:"POST",
				data: {vac_id:vac_id},
				success:function(data){
				},
				error: function(error) {
					alert(" لم يتم حذف الاجازة بنجاح..حاول مرة أخرى ");
					//console.log(error);
				}
			});	
			$(this).closest('tr').css("text-decoration", "line-through");
			$(this).closest('tr').fadeOut(1200,function(){
				$(this).closest('tr').remove();
			});
			
		}

	});
	//--------------------get data for edit vacation------------------------
	$(document).on('click','.editVacData', function(){
		var vac_id=$(this).closest('tr').attr('id');
		
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{vacID:vac_id},
			dataType:"json",
			success:function(data){
				$('#vac_id').val(data.ID);
				$('#vacTypeEdit').val(data.id_case);
				$('#topManagerEdit').val(data.top_manager_id);
				$('#managerEdit').val(data.manager_id);
				$('#dateEdit').val(data.start_date);
				$('#dateToEdit').val(data.end_date);
				$('#durationEdit').val(data.duration);
				if(data.Manager_agree <3){
					$('#managerEdit').prop('disabled', true);
				}
			},
			error:function(error) {
            	alert(error);
        	}
		});
	});
	//--------------onsubmit edit emp form-----------------------------
	$(document).on('submit','#editEmpForm', function(){
		//alert("hi");
		//e.preventDefault();
		var $form = $('#editEmpForm');

		$.ajax({
			url:"insert.php",
			method:"POST",
			data: $('form#editEmpForm').serialize(),
			//dataType:"json",

			success:function(data){
				//console.log(data);
				$("#editEmpModal").modal('hide');	
			},
			error: function(error) {
            	alert(error);
        	}
		});		
	});

	//--------------onsubmit edit vacation form-----------------------------
	$(document).on('submit','#editVacForm', function(){
		var $form = $('#editVacForm');
		$.ajax({
			url:"insert.php",
			method:"POST",
			data: $('form#editVacForm').serialize(),
			//dataType:"json",
			success:function(data){
				//console.log(data);
				$("#editVacationModal").modal('hide');	
			},
			error: function(error) {
				//console.log(error);
			}
		});		
	});

	//-------enable or disable detailed permit reason text according to permit reason choise-----
	$('#permitReason').change(function() {
		if( $(this).val() == 3) {
			$('#permitReasonDetails').prop( "disabled", false );
			$("label[for=permitReasonDetails]").css("color","black");
		} else {       
			$("label[for=permitReasonDetails]").css("color","grey");
			$('#permitReasonDetails').prop( "disabled", true );
		}
	});
	//-------enable or disable return time according to return check-------------------
	$('#returnCheckbox').change(function(){
		$("#returnTime").prop("disabled", !$(this).is(':checked'));
		$("label[for=returnTime]").toggleClass("label-toggle",!$(this).is(':checked'));
		
	 });


	 $("#Add").on("click", function() {  
		$("#textboxDiv").append("<div><br><input type='text'/><br></div>");  
	});  
	$("#Remove").on("click", function() {  
		$("#textboxDiv").children().last().remove();  
	});  
});