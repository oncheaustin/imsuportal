 var a="";
              function accessAppletMethod()
{
   document.AppletABC.submitveri(); 
}
 
function state(res)
{   alert(res);
a="";

}
function message(res)
{   alert(res);
a="";

}
function fmsubmit()
{ 

a="submit";
  
}
 
$(function() { 

 


  $(document).ready(function () {  
               
              
$("#myForm").submit(function(e){
    if (a!=""){

    location.reload();
    }    else{
 
            e.preventDefault();  
      
    
    
    }         
       
            });
          
          }); 
  
});
 