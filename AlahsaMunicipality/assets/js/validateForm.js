function validate_Register(){
    
    var id = document.Register.ID.value;
    var Fn = document.Register.fullname.value;
    var date = document.Register.date.value;
    var Em = document.Register.email.value;
    var phone = document.Register.phone.value;
//    var gander = document.Register.gander.value;
    var pwd = document.Register.password.value;
    var pwdcon = document.Register.confirmpassword.value;
    
    
    var id_span=document.getElementById("ID");
    var Fn_span=document.getElementById("fullname");
    var date_span=document.getElementById("date");
    var Em_span=document.getElementById("email");
    var phone_span=document.getElementById("phone");
    var pwd_span=document.getElementById("password");
    var pwdcon_span=document.getElementById("confirmpassword");
    
    var condition1 =document.getElementById("condition1");
    var condition2 =document.getElementById("condition2");
    
    var condition1__span =document.getElementById("condition_two");
    var condition2__span =document.getElementById("condition_one");

    
    var valid=true;
    
   // if((condition1.checked) && (condition2.checked)){
        
     //   if(pwd === pwdcon){
        
            if(id === ""){   
            valid=false;
            id_span.setAttribute("style","visibility: visible");

            }
            else{
                id_span.setAttribute("style","visibility: hidden");

            }

            if(Fn === ""){   
            valid=false;
            Fn_span.setAttribute("style","visibility: visible");    
            }
            else{
                Fn_span.setAttribute("style","visibility: hidden");
            }

            if(date === ""){   
            valid=false;
            date_span.setAttribute("style","visibility: visible");    
            }
            else{
            date_span.setAttribute("style","visibility: hidden");
            }

            if(Em === ""){   
            valid=false;
            Em_span.setAttribute("style","visibility: visible");    
            }
            else{
            Em_span.setAttribute("style","visibility: hidden");
            }

            if(phone === ""){   
            valid=false;
            phone_span.setAttribute("style","visibility: visible");    
            }
            else{
            phone_span.setAttribute("style","visibility: hidden");
            }
            
            if(pwd === ""){   
            valid=false;
            pwd_span.setAttribute("style","visibility: visible");    
            }
            else{
            pwd_span.setAttribute("style","visibility: hidden");
            
               if(pwd !== pwdcon){
                   
                valid=false;
        
                pwdcon_span.innerHTML="غير متطابق";
                pwdcon_span.setAttribute("style","visibility: visible");
        
                pwd_span.innerHTML= "غير متطابق";
                pwd_span.setAttribute("style","visibility: visible");
                   
               }
            
            }
            
            if((!condition1.checked) && (!condition2.checked)){
                
                valid=false;
                condition1__span.setAttribute("style","visibility: visible");
                condition2__span.setAttribute("style","visibility: visible");
            }
         
 
    
    if(valid)
    {
        return true;
    }
    else
    {
        return false;
    }
    
    
    
}

function validate_login(){
    
    var uid = document.login.id.value;
    var pwd = document.login.pwd.value;
   // var pwdDB = document.login.pwdDB.value;
    
    var ename=document.getElementById("ename");
    //var epwd=document.getElementById("epwd");
    
    
    var valid=true;
    
     if((uid == "")|| (pwd == ""))
    {
        valid=false;
        ename.setAttribute("style","visibility: visible");
      
    }
    else
    {
        valid=true;
            ename.setAttribute("style","visibility: hidden");
        
    }

   
    if(valid)
    {
            return true;
    }
    else
    {
            return false;
    }
}