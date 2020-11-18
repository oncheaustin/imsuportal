<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UTMEreport</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
            line-height: 25px;
        }
        .clearfix {
            overflow: auto;
          }
        table {
            font-size: x-small;
        }
         table tr td {
            
            text-align:center;
            
        }
        tfoot tr td {
            font-weight: bold;
            text-align:center;
            font-size: x-small;
        }
      
      
        .information .logo {
            margin: 5px;
        }
        .container  {
            margin-left: 15px;
        }

        hr.style-three { 
        border-style: solid; border-color: rgb(22, 134, 0);  
        }
         
        .title{
             font-size: 19px;
          }

          .inline {
            vertical-align: top;
            display: inline-block; 
            margin: 1em; 
          }

          
      h3,h4,h5{
        margin-top: -12px;
        
        }
         
 #title {
            vertical-align: top;
            display: inline-block;
            width: 200px; 
            
        }

    #data {
    vertical-align: top; 
    width: 220px;  
    word-wrap: break-word;  
    display: inline-block;
    }
    
    </style>

</head>

<body>
 
<div class="information">
    <img src="{{URL::asset('public/setting/')}}/{{App\setting::where('description','portal')->value('value')}}"  height="98" alt="{{strtoupper(App\setting::where('description','name')->value('value'))}}">
<hr class="style-three">
<center> 
    <span class="title"><strong>  (PUTME - SCREENING) APPLICATION PRINTOUT
        </strong></span> </center>
   

</div>


<br/>

<div class="container">
 

<br>
 
 
 
 
</div>
 
<div class="information" style="   background-color: #944d7b65; position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                  {{strtoupper(App\setting::where('description','name')->value('value'))}} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">

              Date Printed : {{ date('Y-d-m h:m:i') }}
                 
            </td>
        </tr>

    </table>
</div>
</body>
</html>