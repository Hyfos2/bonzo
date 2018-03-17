<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Email</title>
    <style>
    .button {
    border-radius: 3px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
    color: #FFF;
    display: inline-block;
    text-decoration: none;
    -webkit-text-size-adjust: none;
}
.btn {
    border: none; 
    color: white; 
    padding: 7px 16px; 
    cursor: pointer; 
}

.success {background-color: #4CAF50;} 
.success:hover {background-color: #46a049;}

.info {background-color: #2196F3;}
.info:hover {background: #0b7dda;}

.warning {background-color: #ff9800;} 
.warning:hover {background: #e68a00;}

.danger {background-color: #f44336;} 
.danger:hover {background: #da190b;}

.default {background-color: #e7e7e7; color: black;}
.default:hover {background: #ddd;}

</style>

</head>

<body style="margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;">


<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
    <tbody class="vl">
    <tr>
        <td width="100%" height="35">
        </td>
    </tr>
    </tbody>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; background-color: #F4F5F7; marign-top:50px;">

    <tbody>
    <tr>
        <td align="center" style="border-collapse: collapse;">

            <table cellpadding="0" cellspacing="5" border="0" width="560" style="border:0; border-collapse:collapse; background-color:#ffffff; border-radius:6px;">
                <tbody>
                <tr>
                    <td  class="v1" style="border-collapse:collapse; vertical-align:middle; text-align:center; padding:20px;">

                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; margin-top:5px;">
                            <tbody>
                            <tr>
                                <td width="100%" style="font-family: helvetica, Arial, sans-serif; font-size: 18px; letter-spacing: 0px; color:#87919F;">
                                   <img class="profile-pic animated" src="{{asset('img/main.png')}}" alt="HowMine" style="width:50px; height:50px; margin-left:-20px; border-radius: 50%;">
                                    <small> How Mine EMS Notifications</small>
                                </td>
                            </tr>

                            <tr>
                                <td width="100%" height="15">

                                </td>
                            </tr>

                            <tr>
                                <td class="m_5210098864014348207mcnDividerBlockInner" style="min-width:100%;padding:2px" height="8">
                                    <table class="m_5210098864014348207mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-top-color:#eaeaea;border-top-style:solid;border-top-width:2px;min-width:100%">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>

                            <tr>
                                <td width="100%"  height="20">
                                </td>
                            </tr>
                            <tr>
                                <td width="100%" style="font-family: helvetica, Arial, sans-serif; font-size: 15px; text-align: left; color:#2E363F;">


                                         Hi <strong> {{ucfirst($name)}} {{ucfirst($surname)}}.</strong>

                                        

                                </td>
                            </tr>

                             <tr>
                                <td width="100%"  height="20"></td>
                            </tr>


                            <tr>
                                <td width="100%" style="font-size: 14px; text-align: left; color:#2E363F; line-height: 24px; " height="20">

                                   You have sign up an account with How Mine Employee Management System.Below are your credentials;<br>
                                    - email :   {{$email}}<br>
                                    - password: <strong> {{$password}}</strong><br>
                                
                                </td>
                            </tr>

                        <tr>
                                <td width="100%"  height="25"></td>
                            </tr>




                            <tr>
                                <td width="100%" style="font-size: 14px; text-align: center; color:#87919F; line-height: 24px; " height="20">
                                    <button class="btn info"   href="http://localhost:8000">Log in</button>
    
                                </td>
                            </tr>
                            <tr>
                                <td width="100%"  height="35"></td>
                            </tr>

                            <tr>
                                <td width="100%" style="text-align: left; color:#2E363F; line-height: 19px;">
                                    <small style="font-size: 14px">Thank you,<br >How Mine EMS.</small>
                                </td>
                            </tr>


                                 <tr>
                                <td width="100%"  height="35">
                                </td>
                            </tr>


                            <tr>
                                <td width="100%" style="font-family:helvetica, Arial, sans-serif; font-size: 14px; text-align: left; color:#87919F; line-height: 24px;">
                                     <tr>
                                <td class="m_5210098864014348207mcnDividerBlockInner" style="min-width:100%;padding:2px" height="8">
                                    <table class="m_5210098864014348207mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;border-top-color:#eaeaea;border-top-style:solid;border-top-width:2px;min-width:100%">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <span></span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </td>
                            </tr>



                            </tbody>
                        </table>

                    </td>
                </tr>
                </tbody>

              
            </table>
              <table cellpadding="0" cellspacing="5" border="0" width="560" style="border:0; border-collapse:collapse; background-color:#ffffff; border-radius:6px;">
                <tbody>
                <tr >
                    <td width="100%" height="35" width="560">
                    
                                <p  style="height:90px; margin-bottom:8px; background-color:whitesmoke; padding:8px; color:#A3B5B5; text-align: center; font-size:10;">
                                    This message is intended for a registered  user ({{$email}}) to  How Mine,Employmee Management System.If you are not this person please delete this message.Else, if you are having a problem with the button above use this  link (http://localhost:8000) instead.All rights reserved.  
                            
                        </p>

                    </td>
                </tr>
                </tbody>
            </table>
            <!-- /Headline Header -->



            <!-- Space -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                <tbody>
                <tr>
                    <td width="100%" height="35" width="560">
                    


                    </td>
                </tr>
                </tbody>
            </table>


        </td>
    </tr>
    </tbody>
</table>
<!-- /ROW 2 IMGS -->

<!-- Space -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="left" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
    <tbody>
    <tr>
        <td width="100%" height="50"></td>
    </tr>
    </tbody>
</table>


</body>
</html>