// var p_regNo=/^[I][T][0-9]{8}$/;
//    var p_email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
//    var p_name = /^[a-zA-Z ]{2,30}$/;
//    var p_nic = /^[0-9]{9}[vVxX]$/;
//    var p_tel = /^[0-9]{10}$/;
//    var p_pwd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;


function checkName(name)
{
    var p_name = /^[a-zA-Z ]{2,30}$/;

    if(!p_name.test(name))
    {
            //swal("Oops...", "Invalid Name", "error");
            return false;
    }
    else
    {
        return true;
    }

}

function checkEmail(email)
{
    var p_email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if(!p_email.test(email))
    {
             //swal("Oops...", "Invalid Email", "error");
            return false;
    }
    else
    {
        return true;
    }

}

function checkNic(nic)
{
    var p_nic = /^[0-9]{9}[vVxX]$/;

    if(!p_nic.test(nic))
    {
            //swal("Oops...", "Invalid NIC", "error");
            return false;
    }
    else
    {
        return true;
    }

}

function checkTelNo(telNo)
{
    var p_tel = /^[0-9]{10}$/;

    if(!p_tel.test(telNo))
    {
            //swal("Oops...", "Invalid Contact Number", "error");
            return false;
    }
    else
    {
        return true;
    }

}

function checkNumbers(number)
{
    var p_number=/^[0-9]+$/;

    if(!p_number.test(number))
    {
        //swal("Oops...", "Invalid Input", "error");
        return false;
    }
    else
    {
        return true;
    }

}


function passwordMatch(pwd) 
{    
    //var p_pwd=/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/;
    var p_pwd=/^[(0-9A-Za-z)]{8,}$/;
    if(!p_pwd.test(pwd))
    {
        //swal("Oops...", "Password should contain at least one number, one letter and at least 8 charactersr", "error");
        return false;
    }
    else
    {
        return true;
    }

}