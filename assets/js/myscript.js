/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function lll()
{
    alertify.success('Success message');
}



function validateProfile()
{
    var valid=true;
    
    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var email=$("#email").val();
    var tel=$("#tel").val();

        if(!checkName(fname))
        {
            valid=false;
            document.getElementById("fname").style.borderColor = "red";
        }
        else
        {
            document.getElementById("fname").style.borderColor = "";
        }

        if(!checkName(lname))
        {
            valid=false;
            document.getElementById("lname").style.borderColor = "red";
        }
        else
        {
            document.getElementById("lname").style.borderColor = "";
        }
        
        if(!checkEmail(email))
        {
            valid=false;
            document.getElementById("email").style.borderColor = "red";
        }
        else
        {
            document.getElementById("email").style.borderColor = "";
        }
        
        if(!checkTelNo(tel))
        {
            valid=false;
            document.getElementById("tel").style.borderColor = "red";
        }
        else
        {
            document.getElementById("tel").style.borderColor = "";
        }
        
    if(valid==true)
    {
            swal({
            title: "Are you sure?",
            text: "Do you want to confirm the submission!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Submit it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

                  swal("Successfull!", "Your data has been submited.", "success");

                  $.ajax({
                  url: "http://tvssaveen.000webhostapp.com/index.php/Admin/profile",
                  type: 'post',

                  data: {
                      fname: fname,
                      lname: lname,
                      email: email,
                      tel: tel


                  },
                  success: function (data) {

                          window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Admin/profile";  
                  },
                  error: function(ts) { alert(ts.responseText); }

              });

            } else {
              swal("Cancelled", "Your data isn't save :)", "error");
            }
        });
    }
    else
    {
        swal("Oops...", "Something went wrong!", "error");
    }            
        
}

function default_lock()
{
    $("#password").val("");
    document.getElementById("pwd").style.display = "block";    
    document.getElementById("mode").style.display = "none";
}

function change_security()
{
    $('#sec_mode').modal('show');
    default_lock();
}

function unclock()
{
    var pwd=$("#password").val();
    
      $.ajax({
      url: "http://tvssaveen.000webhostapp.com/index.php/Secure/unlock",
      type: 'post',

      data: {
          pwd: pwd

      },
      success: function (data) {
//alert(data);
            if(data==1)
            {
                document.getElementById("pwd").style.display = "none";    
                document.getElementById("mode").style.display = "block";
            }
            else
            {
                document.getElementById("password").style.borderColor = "red";
                swal("Oops...", "Wrong password!", "error");
            }
//              document.getElementById("pwd").style.display = "none";    
//              document.getElementById("mode").style.display = "block"; 
      },
      error: function(ts) { alert(ts.responseText); }

    });    
}

function sec_mode()
{

default_lock();

   var secmode=$('input[name=on]:checked', '#sec_form').val(); 

   // alert(secmode);

            swal({
            title: "Are you sure?",
            text: "Do you want to change Secure Mode!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Submit it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

                  swal("Successfull!", "Your secure mode has been changed.", "success");

                  $.ajax({
                  url: "http://tvssaveen.000webhostapp.com/index.php/Secure/chanage_mode",
                  type: 'post',

                  data: {
                      secmode: secmode

                  },
                  success: function (data) {

                          window.location.href = "http://tvssaveen.000webhostapp.com/index.php";  
                  },
                  error: function(ts) { alert(ts.responseText); }

              });

            } else {
              swal("Cancelled", "Your data isn't save :)", "error");
            }
        });
        
}


function change_Password()
{   
    var valid=true;
    
    var old_Pwd=$('#old_Pwd').val();
    var new_Pwd=$('#new_Pwd').val();
    var cnf_Pwd=$('#cnf_Pwd').val();
    
        if(!old_Pwd)
        {
            valid=false;
            document.getElementById("old_Pwd").style.borderColor = "red";
        }
        else
        {
            document.getElementById("old_Pwd").style.borderColor = "";
        }

        if(!new_Pwd)
        {
            valid=false;
            document.getElementById("new_Pwd").style.borderColor = "red";
        }
        else
        {
            document.getElementById("new_Pwd").style.borderColor = "";
        }
    
        if(!cnf_Pwd)
        {
            valid=false;
            document.getElementById("cnf_Pwd").style.borderColor = "red";
        }
        else
        {
            document.getElementById("cnf_Pwd").style.borderColor = "";
        }

    if(valid==true)
    {
        $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/admin/change_Password",
        type: 'post',

        data: {
            old_Pwd: old_Pwd,
            new_Pwd: new_Pwd,
            cnf_Pwd: cnf_Pwd

        },
        success: function (data) {

                //check old pwd
                if(data.localeCompare("*Old password is incorrect")===0)
                {
                    document.getElementById("old_Pwd_Err").innerHTML = data;
                    document.getElementById("fill_all_Err").innerHTML = "";
                }
                else
                {
                    //clear old pwd error and value
                    //$('#old_Pwd').val('');
                    document.getElementById("old_Pwd_Err").innerHTML = "";
                    document.getElementById("fill_all_Err").innerHTML = "";

                    //var re = new RegExp('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/');
                    var testPwdFormat=true;
                    
                    if (!(/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/.test(new_Pwd)))
                    {
                        testPwdFormat=false;
                    }
                    
                    
                    if(data.localeCompare("*New password is same as old password")!=0)
                    {
                        
                    
                            if(testPwdFormat==true)        
                            {    
                                document.getElementById("new_Pwd_Err").innerHTML = "";
                                
                                
                                //check confirm pwd
                                if(data.localeCompare("*Confirm password is not match")===0)
                                {
                                    document.getElementById("cnf_Pwd_Err").innerHTML = data;
                                }
                                else
                                {
                                    //clear cnf pwd error and value
                                    //$('#cnf_Pwd').val('');
                                    document.getElementById("cnf_Pwd_Err").innerHTML = "";

                                    
                                    swal("Password Change successfully");
                                    clear_Change_Password();
                                    $('#change_Password').modal('hide');
                                    //$("#change_pwd_close_btn").trigger("click");
                                    window.setTimeout(window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Admin/profile", 3000);
                                    
                                }
                            }
                            else
                            {
                                document.getElementById("new_Pwd_Err").innerHTML = "*Password should contain at least one number, one letter and at least 8 characters.";
                            }
                        }
                        else
                        {
                            document.getElementById("cnf_Pwd_Err").innerHTML ="";
                            document.getElementById("new_Pwd_Err").innerHTML = "*New password is same as old password";
                        }
                        
                        
                        
                        } 
        },
        error: function(ts) { alert(ts.responseText); } 
    });
    
    }
    else
    {
        document.getElementById("fill_all_Err").innerHTML = "Please fill all...!";
    }
}

function clear_Change_Password()
{
    $('#old_Pwd').val('');
    $('#new_Pwd').val('');
    $('#cnf_Pwd').val('');
    
    document.getElementById("fill_all_Err").innerHTML = "";
    document.getElementById("old_Pwd_Err").innerHTML = "";
    document.getElementById("new_Pwd_Err").innerHTML = "";
    document.getElementById("cnf_Pwd_Err").innerHTML = "";
}


function validateSignup(from)
{
    var valid=true;
    var confirm=false;
    
    var fname=$('#fname').val();
    var lname=$('#lname').val();
    var tel=$('#tel').val();
    var pwd=$('#password').val();
    var conpwd=$('#con_password').val();
    var level=$('#level').val();
    
    alert(passwordMatch(pwd));

    if(!checkName(fname))
    {
        valid=false;
        document.getElementById("fnameErr").innerHTML = "*Invalid Name";
    }
    else
    {
        document.getElementById("fnameErr").innerHTML = "";
    }
    
    if(!checkName(lname))
    {
        valid=false;
        document.getElementById("lnameErr").innerHTML = "*Invalid Name";
    }
    else
    {
        document.getElementById("lnameErr").innerHTML = "";
    }
    
    if(!checkTelNo(tel))
    {
       valid=false; 
       document.getElementById("telErr").innerHTML = "*Invalid Telephone Number";
    }
    else
    {
        document.getElementById("telErr").innerHTML = "";
    }
    
    if(!passwordMatch(pwd))
    {
        valid=false;
        document.getElementById("pwdErr").innerHTML = "*Password should contain atleast 8 characters";
        document.getElementById("conpwdErr").innerHTML = "*Re-enter the Passowrd";
    }
    else
    {
        document.getElementById("pwdErr").innerHTML = "";

        if(!passwordMatch(conpwd) && pwd.localeCompare(conpwd)==0)
        {
            valid=false;
            document.getElementById("conpwdErr").innerHTML = "*Invalid Passowrd";
        }
        else
        {
            document.getElementById("conpwdErr").innerHTML = "";
        }
        
    }
    alert(level);
    if(level.localeCompare("Select a Level")==0)
    {
        valid=false;
        document.getElementById("levelErr").innerHTML = "Select Admin Level";
    }
    else
    {
        valid=true;
        document.getElementById("levelErr").innerHTML = "";
    }

    if(!valid) {
        swal("Oops...", "Something went wrong!", "error");
        return false;
    }
    else {
//       alertify.success('Success Registered'); 
       return true;
//
//swal({
//  title: "Are you sure?",
//  text: "You will not be able to recover this imaginary file!",
//  type: "warning",
//  showCancelButton: true,
//  confirmButtonColor: "#DD6B55",
//  confirmButtonText: "Yes, delete it!",
//  cancelButtonText: "No, cancel plx!",
//  closeOnConfirm: false,
//  closeOnCancel: false
//},
//function(isConfirm){
//  if (isConfirm) {
//    swal("Deleted!", "Your imaginary file has been deleted.", "success");
//      confirm=true;         
//    
//  } else {
//    swal("Cancelled", "Your imaginary file is safe :)", "error");
//  }
//});
//
//if(confirm)
//{
//    //window.location.href = "http://tvssaveen.000webhostapp.com/index.php";
//     return true;
//}
    }

}

//remove route_no textboxs
var counter=1;


$(document).ready(
    function () {

 
//search a bike in home page 
        $('#homesearch').keyup(
            function () {

            var route_no=$('#homesearch').val();

            $.ajax({
                url: "http://tvssaveen.000webhostapp.com/index.php/Welcome/search",
                type: 'post',

                data: {
                    route_no: route_no


                },
                success: function (data) {
                    
                    document.getElementById("bike").innerHTML = "";
                    document.getElementById("search_bike").innerHTML = data;

                },
                error: function(ts) { alert(ts.responseText); }

            });

        });



        $('#stockssearch').keyup(
            function () {

            var model_no=$('#stockssearch').val();
//  alert(invoice_no);
            $.ajax({
                url: "http://tvssaveen.000webhostapp.com/index.php/Bike/search_stock",
                type: 'post',

                data: {
                    model_no: model_no


                },
                success: function (data) {

                    document.getElementById("stock").innerHTML = "";
                    document.getElementById("result").innerHTML = data;

                },
                error: function(ts) { alert(ts.responseText); }

            });

        });




        $('#clientsearch').keyup(
            function () {

            var invoice_no=$('#clientsearch').val();

            $.ajax({
                url: "http://tvssaveen.000webhostapp.com/index.php/Clients/search",
                type: 'post',

                data: {
                    invoice_no: invoice_no


                },
                success: function (data) {
         
                    document.getElementById("client").innerHTML = "";
                    document.getElementById("result").innerHTML = data;

                },
                error: function(ts) { alert(ts.responseText); }

            });

        });





//search a bike in sell page 
        $('#sellsearch').keyup(
            function () {

            var route_no=$('#sellsearch').val();

            $.ajax({
                url: "http://tvssaveen.000webhostapp.com/index.php/Bike/sell_search",
                type: 'post',

                data: {
                    route_no: route_no


                },
                success: function (data) {
                    
                    document.getElementById("bike_sell").innerHTML = "";
                    document.getElementById("search_bike_sell").innerHTML = data;

                },
                error: function(ts) { alert(ts.responseText); }

            });

        });



//search a bike in manage bike page 
        $('#managesearch').keyup(
            function () {

            var route_no=$('#managesearch').val();

            $.ajax({
                url: "http://tvssaveen.000webhostapp.com/index.php/Bike/manage_search",
                type: 'post',

                data: {
                    route_no: route_no


                },
                success: function (data) {
                    
                    document.getElementById("manage_bike").innerHTML = "";
                    document.getElementById("search_bike_for_manage").innerHTML = data;

                },
                error: function(ts) { alert(ts.responseText); }

            });

        });


//search cheque

    $('#chequesearch').keyup(
        function () {

        var route_no=$('#chequesearch').val();

        $.ajax({
            url: "http://tvssaveen.000webhostapp.com/index.php/Cheque/search_details",
            type: 'post',

            data: {
                route_no: route_no


            },
            success: function (data) {

                document.getElementById("cheque_result").innerHTML = "";
                document.getElementById("search_cheque_result").innerHTML = data;

            },
            error: function(ts) { alert(ts.responseText); }

        });

    });


        



    $("#add_route").click(function () {

	if(counter>10){
            sweetAlert("Oops...", "Only 10 textboxes allow!", "error");
            return false;
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);

	newTextBoxDiv.after().html("<div class='form-group'><label style='font-size: 1.1em' class='col-sm-3 control-label'>Bike Route Number</label>" +
                                    "<div class='col-sm-5'><input type='text' class='form-control1' id='route_no"+counter+"' name='route_no"+counter+"' required=''></div>\n\
                                     <div class='col-sm-2'><input type='button' onclick='remove_route("+counter+")' id='remove"+counter+"' class='btn-primary btn btn-lg' value='Remove'></div>\n\
                                    </div>");

	newTextBoxDiv.appendTo("#new_route");


	counter++;
     });


 });

//remove dynamic route no box
function remove_route(id)
{
    $("#TextBoxDiv"+id).remove();
    counter--;

}
    

function issue_a_cheque()
{
    var route_no = "";
    var valid=true;
    var exist=true;
    
    $("#get_all_route :text").each(function(){
        
        var id=this.id;
        if($(this).val())
        {   
                  $.ajax({
                  url: "http://tvssaveen.000webhostapp.com/index.php/Bike/cheque_routeno",
                  type: 'post',

                  data: {
                      route_no: $(this).val()


                  },
                  success: function (data) {
                      
                      if(data!=1)
                      {
                          exist=false;
                          document.getElementById(id).style.borderColor = "red";
                          swal("Oops...", "Incorrect route number!", "error");
                      }
                      else
                      {
                          document.getElementById(id).style.borderColor = "";
                      }
                          //window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Cheque/pay";  
                  },
                  error: function(ts) { alert(ts.responseText); }

              });
            
            
            
            document.getElementById(this.id).style.borderColor = "";
            route_no += $(this).val() + "$";
        }
        else
        {
            document.getElementById(this.id).style.borderColor = "red";
        }
    });
    

    var cheque_no=$("#cheque_no").val();
    var amount=$("#amount").val();
    var date=$("#date").val();

    if(!cheque_no)
    {
        document.getElementById("cheque_no").style.borderColor = "red";
        valid=false;
    }
    else
    {
        document.getElementById("cheque_no").style.borderColor = "";
    }
    
    if(!checkNumbers(amount))
    {
        document.getElementById("amount").style.borderColor = "red";
        valid=false;
    }
    else
    {
        document.getElementById("amount").style.borderColor = "";
    }
             
    if(!date)
    {
        document.getElementById("date").style.borderColor = "red";
        valid=false;
    }
    else
    {
        document.getElementById("date").style.borderColor = "";
    }
    
    if(valid==true && exist==true)
    {
            swal({
            title: "Are you sure?",
            text: "Do you want to confirm the submission!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Submit it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

                  swal("Successfull!", "Your data has been submited.", "success");

                  $.ajax({
                  url: "http://tvssaveen.000webhostapp.com/index.php/Cheque/pay_action",
                  type: 'post',

                  data: {
                      route_no: route_no,
                      cheque_no: cheque_no,
                      amount: amount,
                      date: date


                  },
                  success: function (data) {

                          window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Cheque/pay";  
                  },
                  error: function(ts) { alert(ts.responseText); }

              });

            } else {
              swal("Cancelled", "Your data isn't save :)", "error");
            }
        });
    }
    else
    {
        swal("Oops...", "Something went wrong!", "error");
    }
    


    
    
}




function allsale()
{
    var month=$("#month").val();
    
    if(month!=0)
    {
      $.ajax({
      url: "http://tvssaveen.000webhostapp.com/index.php/Bike/sale",
      type: 'post',

      data: {
          month: month


      },
      success: function (data) {

        document.getElementById("all_sale").innerHTML = "";
        document.getElementById("result").innerHTML = data;
  
      },
      error: function(ts) { alert(ts.responseText); }

     }); 
 }
 else
 {
     swal("Please select a month");
     document.getElementById("result").innerHTML = "";
     
 }
}

//function GetValue(){
//    var Contain = "";
//    $("#get_all_route :text").each(function(){
//        Contain += $(this).val() + "$";
//    });
//    var arr = Contain.split('$');
//    alert(arr[0]);
//}



//get a bike details to hme page more details button    
function bike_details(id)
{
    $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/Welcome/get_a_bike_details",
        type: 'post',

        data: {
            id: id
        },
        success: function (data) {
            document.getElementById("bike_model").innerHTML = data;
            $('#bike_details').modal('show');
        },
        error: function(ts) { alert(ts.responseText); }

    });
}

  
function bike_details_for_update(id)
{
    $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/Bike/bike_details_for_update",
        type: 'post',

        data: {
            id: id
        },
        success: function (data) {
            document.getElementById("bike_model").innerHTML = data;
            $('#bike_details').modal('show');
        },
        error: function(ts) { alert(ts.responseText); }

    });
}


//sell a bike
function sell(id)
{
    window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Bike/selling/".concat(id);   
}


function selling_validate()
{
    var valid=true;
    
    var bike_id=$("#bike_id").val();
    var price=$("#price").val();
    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var tel=$("#tel").val();
    var address=$("#address").val();
 
 if(!checkName(fname))
 {
     valid=false;
     document.getElementById("fname").style.borderColor = "red";
 }
 else
 {
     document.getElementById("fname").style.borderColor = "";
 }
 
 if(!checkName(lname))
 {
     valid=false;
     document.getElementById("lname").style.borderColor = "red"; 
 }
 else
 {
     document.getElementById("lname").style.borderColor = "";
 }
 
 if(!checkTelNo(tel))
 {
     valid=false;
     document.getElementById("tel").style.borderColor = "red";
 }
 else
 {
     document.getElementById("tel").style.borderColor = "";
 }
 
 if(!address)
 {
     valid=false;
     document.getElementById("address").style.borderColor = "red";
 }
 else
 {
     document.getElementById("address").style.borderColor = "";
 }
 
    if(valid==true)
    {
          swal({
            title: "Are you sure?",
            text: "Do you want to confirm the submission!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Submit it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

                  swal("Successfull!", "Your data has been submited.", "success");

              $.ajax({
              url: "http://tvssaveen.000webhostapp.com/index.php/Bike/bill",
              type: 'post',

              data: {
                  bike_id: bike_id,
                  price: price,
                  fname: fname,
                  lname: lname,
                  tel: tel,
                  address: address

              },
              success: function (data) {
                    
                  window.location.href = ""+data+"";
              },
              error: function(ts) { alert(ts.responseText); }

          }); 
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });        
    }
    else
    {
                swal("Oops...", "Something went wrong!", "error");
    }
 
}

//change bike image in manage bike details when choose button click
function readURL(input) 
{
    if (input.files && input.files[0])
    {
        var reader = new FileReader();

        reader.onload = function (e) 
        {
            $('#bikeImg')
                    .attr('src', e.target.result);
                    
        };

        reader.readAsDataURL(input.files[0]);
    }
}



function validateAddNewBike(form) {

var valid=true;

var cost=document.forms["addNewBike"]["cost"].value;
var price=document.forms["addNewBike"]["price"].value;

    if(!checkNumbers(cost))
    {   valid=false;
        document.getElementById("cost").style.borderColor = "red";
    }
    else
    {   document.getElementById("cost").style.borderColor = "";
    }
    
    if(!checkNumbers(price))
    {   valid=false;
        document.getElementById("price").style.borderColor = "red";
    }
    else
    {   document.getElementById("price").style.borderColor = "";
    }
//swal({
//  title: "Are you sure?",
//  text: "Do you want to confirm the submission?",
//  type: "warning",
//  showCancelButton: true,
//  confirmButtonColor: "#DD6B55",
//  confirmButtonText: "Yes, Submit!",
//  closeOnConfirm: false,
//  html: false
//}, function(){
//  swal("Submited!",
//  "Your details has been successfully submited.",
//  "success");
//});

    if(!valid)
    {
        sweetAlert("Oops...", "Something went wrong!", "error");
        return false;
    }
    else 
    {
        //return confirm('Do you really want to submit the form?');
        //add_bike_image();
        return true;
    }
}



function add_bike()
{
    var route_no=$("#route_no").val();
    var model=$("#model").val();
    var chassis_no=$("#chassis_no").val();
    var engine_no=$("#engine_no").val();
    var cost=$("#cost").val();
    var price=$("#price").val();
    var color=$("#color").val();
    var image=$("#userfile").val();

    var valid=true;

    if(!route_no)
    {   valid=false;
        document.getElementById("route_no").style.borderColor = "red";
    }
    else
    {   document.getElementById("route_no").style.borderColor = "";
    }
    

    if(!model)
    {   valid=false;
        document.getElementById("model").style.borderColor = "red";
    }
    else
    {   document.getElementById("model").style.borderColor = "";
    }
    
    
    if(!chassis_no)
    {   valid=false;
        document.getElementById("chassis_no").style.borderColor = "red";
    }
    else
    {   document.getElementById("chassis_no").style.borderColor = "";
    }
    
    
    if(!engine_no)
    {   valid=false;
        document.getElementById("engine_no").style.borderColor = "red";
    }
    else
    {   document.getElementById("engine_no").style.borderColor = "";
    }

    if(!color)
    {   valid=false;
        document.getElementById("color").style.borderColor = "red";
    }
    else
    {   document.getElementById("color").style.borderColor = "";
    }    
    
    
    
    if(!checkNumbers(cost))
    {   valid=false;
        document.getElementById("cost").style.borderColor = "red";
    }
    else
    {   document.getElementById("cost").style.borderColor = "";
    }
    
    if(!checkNumbers(price))
    {   valid=false;
        document.getElementById("price").style.borderColor = "red";
    }
    else
    {   document.getElementById("price").style.borderColor = "";
    }
    
    if(valid==true)
    {
          swal({
            title: "Are you sure?",
            text: "Do you want to confirm the submission!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Submit it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

                  swal("Successfull!", "Your data has been submited.", "success");

              $.ajax({
              url: "http://tvssaveen.000webhostapp.com/index.php/Bike/add",
              type: 'post',

              data: {
                  route_no: route_no,
                  model: model,
                  chassis_no: chassis_no,
                  engine_no: engine_no,
                  cost: cost,
                  price: price,
                  image: image,
                  color: color

              },
              success: function (data) {
                        //alert(data);
                  window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Bike/add";
              },
              error: function(ts) { alert(ts.responseText); }

          }); 
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });        
    }
    else
    {
                swal("Oops...", "Something went wrong!", "error");
    }
}



function update_bike(id)
{
    var route_no=$("#route_no").val();
    var model=$("#model").val();
    var chassis_no=$("#chassis_no").val();
    var engine_no=$("#engine_no").val();
    var cost=$("#cost").val();
    var price=$("#price").val();
    var color=$("#color").val();
    var image=$("#userfile").val();

    var valid=true;

    if(!route_no)
    {   valid=false;
        document.getElementById("route_no").style.borderColor = "red";
    }
    else
    {   document.getElementById("route_no").style.borderColor = "";
    }
    

    if(!model)
    {   valid=false;
        document.getElementById("model").style.borderColor = "red";
    }
    else
    {   document.getElementById("model").style.borderColor = "";
    }
    
    
    if(!chassis_no)
    {   valid=false;
        document.getElementById("chassis_no").style.borderColor = "red";
    }
    else
    {   document.getElementById("chassis_no").style.borderColor = "";
    }
    
    
    if(!engine_no)
    {   valid=false;
        document.getElementById("engine_no").style.borderColor = "red";
    }
    else
    {   document.getElementById("engine_no").style.borderColor = "";
    }

    if(!color)
    {   valid=false;
        document.getElementById("color").style.borderColor = "red";
    }
    else
    {   document.getElementById("color").style.borderColor = "";
    }    
    
    
    
    if(!checkNumbers(cost))
    {   valid=false;
        document.getElementById("cost").style.borderColor = "red";
    }
    else
    {   document.getElementById("cost").style.borderColor = "";
    }
    
    if(!checkNumbers(price))
    {   valid=false;
        document.getElementById("price").style.borderColor = "red";
    }
    else
    {   document.getElementById("price").style.borderColor = "";
    }
    
    if(valid==true)
    {
          swal({
            title: "Are you sure?",
            text: "Do you want to confirm the submission!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Submit it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

                  swal("Successfull!", "Your data has been submited.", "success");

              $.ajax({
              url: "http://tvssaveen.000webhostapp.com/index.php/Bike/update",
              type: 'post',

              data: {
                  id: id,
                  route_no: route_no,
                  model: model,
                  chassis_no: chassis_no,
                  engine_no: engine_no,
                  cost: cost,
                  price: price,
                  image: image,
                  color: color

              },
              success: function (data) {
                        //alert(data);
                  window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Bike/manage";
              },
              error: function(ts) { alert(ts.responseText); }

          }); 
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });        
    }
    else
    {
        
    }
}







function validateUpdateBike(form) 
{
    var valid=true;
    
    var cost=document.forms["updateBike"]["cost"].value;
    var price=document.forms["updateBike"]["price"].value;

    if(!checkNumbers(cost))
    {   valid=false;//alert("asa");
        document.getElementById("cost").style.borderColor = "red";
    }
    else
    {   document.getElementById("cost").style.borderColor = "";
    }
    
    if(!checkNumbers(price))
    {   valid=false;
        document.getElementById("price").style.borderColor = "red";
    }
    else
    {   document.getElementById("price").style.borderColor = "";
    }
    
    if(!valid)
    {
        //alert('Please correct the errors in the form!');
        return false;
    }
    else 
    {
        return confirm('Do you really want to submit the form?');
    }
}


//add bike image
function add_bike_image()
{
    var route_no=$("route_no").val();
    var image=$("bikeimage").val();
    alert(route_no);
    alert(image);
    $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/Bike/add_bike_image",
        type: 'post',

        data: {
            route_no: route_no,
            bikeimage: image

        },
        success: function (data) {
            //window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Bike/manage";
        },
        error: function(ts) { alert(ts.responseText); }

    });    
}

//delete a bike
function delete_bike(id)
{
  swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
    
        $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/Bike/delete",
        type: 'post',

        data: {
            bike_id: id


        },
        success: function (data) {
            window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Bike/manage";
        },
        error: function(ts) { alert(ts.responseText); }

    }); 
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
    
    
   
}







//update a cheque details
function update_cheque(id)
{
    var valid=true;
    
   var cid=id;  
   var rout_no=$("#route_no").val();
   var cheque_no=$("#cheque_no").val();
   var amount=$("#amount").val();
   
   var year=$("#year").val();
   var month=$("#month").val();
   var day=$("#day").val();
    
   var p_year = /^[0-9]{4}$/;
   var p_month = /^(0?[1-9]|1[012])$/;
   var p_day = /^(0[1-9]|[12]\d|3[01])$/;

    
    if(!checkNumbers(amount))
    {
        valid=false;
        document.getElementById("amount").style.borderColor = "red";
    }
    else
    {
        document.getElementById("amount").style.borderColor = "";
    }


    if(!checkNumbers(year) || !p_year.test(year))
    {
        valid=false;
        document.getElementById("year").style.borderColor = "red";
    }
    else
    {
        document.getElementById("year").style.borderColor = "";
    }
 
    
    if(!checkNumbers(month) || !p_month.test(month))
    {
        valid=false;
        document.getElementById("month").style.borderColor = "red";
    }
    else
    {
        document.getElementById("month").style.borderColor = "";
    }


    if(!checkNumbers(day) || !p_day.test(day))
    {
        valid=false;
        document.getElementById("day").style.borderColor = "red";
    }
    else
    {
        document.getElementById("day").style.borderColor = "";
    }    
    
    if(valid==true)
    {
        
        var date=year+"-"+month+"-"+day;
    
        swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, Update it!",
        cancelButtonText: "No, Cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          swal("Updated!", "Your data has been updated.", "success");

              $.ajax({
              url: "http://tvssaveen.000webhostapp.com/index.php/Cheque/update",
              type: 'post',

              data: {
                  cid: cid,
                  route_no: rout_no,
                  cheque_no: cheque_no,
                  amount: amount,
                  date: date


              },
              success: function (data) {

                  window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Cheque/details";
              },
              error: function(ts) { alert(ts.responseText); }

          }); 
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });
      
    }
    else
    {
         swal("Oops...", "Something went wrong!", "error");
    }
    
   
}




//delete a cheque details
function delete_cheque(id)
{
  swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
    
        $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/Cheque/delete",
        type: 'post',

        data: {
            cheque_id: id


        },
        success: function (data) {
            window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Cheque/details";
        },
        error: function(ts) { alert(ts.responseText); }

    }); 
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
    
    
   
}










function validate(form) {
    // validation code here ...
var valid=false;
//var old_Pwd=$('#fname').val();
alert("old_Pwd");


swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false,
  html: false
}, function(){
  swal("Deleted!",
  "Your imaginary file has been deleted.",
  "success");
});

    if(!valid) {
        alert('Please correct the errors in the form!');
        return false;
    }
    else {
        return confirm('Do you really want to submit the form?');
    }
}


function get_all_sale()
{
    var month=$('#month').val();
    alert(month);
        $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/Bike/all_sale",
        type: 'post',

        data: {
            month: month


        },
        success: function (data) {alert(data);
            window.location.href = "http://tvssaveen.000webhostapp.com/index.php/Bike/all_sale";
        },
        error: function(ts) { alert(ts.responseText); }

    });     
}


function generate_bill()
{
    var bike_id=$("#bike_id").val();
    var price=$("#price").val();
    var fname=$("#bike_id").val();
    var lname=$("#price").val();
    var tel=$("#bike_id").val();
    var address=$("#price").val();
//
alert(fname);
////    
//                    alertify.confirm("Do you want to continue?",
//                function(){
//                 
//    
//        $.ajax({
//        url: "http://tvssaveen.000webhostapp.com/index.php/Bike/bill",
//        type: 'post',
//
//        data: {
//            bike_id: bike_id,
//            price: price,
//            fname: fname,
//            lname: lanem,
//            tel : tel,
//            address : address
//
//
//        },
//        success: function (data) {
//        },
//        error: function(ts) { alert(ts.responseText); }
//
//    });
//    
//                });
var valid=false;

if(valid==false)
{
   
                alertify.defaults.glossary.title ="Student Registration";
                alertify.defaults.glossary.ok ="Yes";
                alertify.defaults.glossary.cancel ="No";

                alertify.confirm("Do you want to continue?",
                function(){
                   alert("s");
                            $.ajax({
        url: "http://tvssaveen.000webhostapp.com/index.php/Bike/bill",
        type: 'post',

        data: {
            bike_id: bike_id,
            price: price,
            fname: fname,
            lname: lname,
            tel : tel,
            address : address


        },
        success: function (data) {
           // alert(data);
        },
        error: function(ts) { alert(ts.responseText); }

    });
                    
                    
                },
                                        function(){
                  alertify.error('Cancel');
                });




            }
            


}