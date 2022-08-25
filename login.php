<?php 
include_once 'include/session.php';
include("include/globals.php");
include("header.php");
include ("mainmenu.php");
include("include/functions.php");
include("include/connect.php");
include("logincheckfunction.php");
$token = get_token(20);
$_SESSION['token'] = $token;
$referer = filter_input(INPUT_SERVER, 'HTTP_REFERER');
//$referer= $_SERVER['HTTP_REFERER'];   
///include("login_action.php");  
if ($isLogged):
    redirect('index.php');
endif;


$query = "select
			callingcode
			from
			user
			where psi_name ='$hostname'" ;
			
			
	$re = $mysqli->query($query); 
						  foreach ($re as $data) {
							$callingcode=$data['callingcode'];
}		
			
if($hostname=="ecoparksg.com"):


$webnameeco=$_SESSION['webdata'];
$querydata = "SELECT shop_name,shoplogo_web,shoplogo_web_darkbg,uniqueId,webname FROM user WHERE webname = '$webnameeco'";




$results = $mysqli->query($querydata);

 while ($row = $results->fetch_array(MYSQLI_BOTH)) {
                $shopnamedata = strtoupper($row['shop_name']);
                $shoplogo_webdata = $row['shoplogo_web'];
                $shoplogo_web_darkbgdata = $row['shoplogo_web_darkbg'];
				 $uniqueIddata = $row['uniqueId'];
 }

$logo_popupdata =$bucketurl.$uniqueIddata."/".$shoplogo_web_darkbgdata;   	
endif;


			                          

//$updatesarray = $updates->profilewallUpdates($uid1, $lastid);  
function redirect($filename) {
    if (!headers_sent())
        header('Location: ' . $filename);
    else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $filename . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $filename . '" />';
        echo '</noscript>';
    }
}
?><br></br><br></br>
<style type="text/css">
  
.container-mm {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
  @media (min-width: 568px) {
  .container-mm {
    width: 550px;
  }
}
@media (min-width: 992px) {
  .container-mm {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container-mm {
    width: 900px;
  }

} 
.modal-dialogx {
	width: 350px;
	margin: 20px auto;
	text-align: center;
}
@media screen and (min-width: 320px) and (max-width:640px) {
.modal-dialogx {
	width: 100% !important;
}
}
</style>
<div class="container">
    <div class="container-mm"> 
    <div id="login-overlay" class="modal-dialogx modal-contentx">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabelc">
				<div class="bootstrap-dialog-title">
					<?php if($hostname != "ecoparksg.com"){ ?>
					<p class="lead">
						<?php if($logo_popup==""){ ?>
							<label><?php echo $shopname; ?></label>
						<?php }else{ ?>
							<img src="<?php echo $logo_popup; ?>" alt="<?php echo $shopname; ?>" width="200px" height="50px">
					   <?php } ?>
					</p>
					<?php } else{ ?>
						<p class="lead">
						<?php if($logo_popupdata==""){ ?>
						<label><?php echo $shopnamedata; ?></label>
						<?php }else{ ?>
							<img src="<?php echo $logo_popupdata; ?>" alt="<?php echo $shopnamedata; ?>" width="200px" height="50px">
					   <?php } ?>
						
					 	</p>
					 <?php } 
					 
					 
					 ?>
					
				</div>
			</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-title">LOGIN  </h4>
                    <div class="well">
                        <form class="signin" id="formID" name="formID" method="post" action="">    
                            <input type="hidden" name="action" id="action" value="login" />    
                            <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />  
                      
                           <!-- <label for="username" class="control-label">Mobile Number</label> -->
                            <div class="form-group">
                                <div class="in-grp" style="padding: 0;">

                                    <div class="input-group inp">
                                        <span class="input-group-addon">+</span>
                                        <input class="form-control" type="text" placeholder="code" id="ccode" name="ccode" value="<?php echo $callingcode; ?>" style="width: 20%;">
                                        <input type="text" class="form-control" id="s-user" name="s-user" value="" style="width: 80%;" required="" title="Please enter you mobile number" placeholder="Mobile Number">
                                    </div>
                                </div>
                            </div> 
                           <!-- <label for="password" class="control-label">Password</label>-->
                            <div class="form-group">

                                <input type="password" class="form-control" id="s-pass" name="s-pass" value="" required="" title="Please enter your password" placeholder="password">
                                <span class="help-block"></span>
                            </div>
			<button type="submit" class="btn btn-success btn-block btns-block">Login</button><br/>
		<p style="text-align:left; margin-top: 15px; font-size: 12px;">By clicking "Login" you agree to <a href="/terms_policy.php">Terms of Service</a></p>
                            <div id="loginErrorMsg" class="alert alert-error hide">Wrong username name or  password</div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" id="remember" type="checkbox"  />
                                    Remember login 
                                </label>                                
                            </div>
                            <input type="hidden" name="referer" id="referer" value="<?php echo $referer ?>" />  
                            <div id="preview" ></div>        
                            <input type="hidden" name="action" id="action" value="login" />    
                            <input type="hidden" name="url" id="url" value="<?php echo $siteurl; ?>" /> 
                            
                            <p> <a href="javascript: void(0)" onclick="javascript: forgotpass()">Forgot Password?</a></p>
                        </form>
						<p style="text-align:center"> <a href="/registration.php"> Create your New Account </a></p>
						<div id="loader" style="color: #e84d1c;"></div>
                    </div>
                </div>
                <div class="col-md-6" style="display: none;">
                    <p class="lead">Register now for <span class="text-success">FREE</span></p>
                    <p style="font-size: 16px;word-break:break-word;color: #008000;">* Single login for all streetbell powered sites</p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> By sign in you are agreeing to our Terms and Conditions and Privacy Policy  </li>
                          
                      </ul>
                    <p><a href="/registration.php" class="btn btn-info btn-block">Yes please, register now!</a></p>

                </div>
            </div>
        </div>
    </div>
	</div>
</div>
      
    <script>
$(document).ready(function(){$("#formID").submit(function(e){var mobile=$("#s-user").val();var pass=$("#s-pass").val();var ccode=$("#ccode").val();var token=$("#token").val();var decimalsOnly=/^\d+$/;if(!decimalsOnly.test(mobile)){$("#loader").html('Plese check number');return!1}
if(!decimalsOnly.test(ccode)){$("#loader").html('Plese check country code');return!1}
if($('#remember').is(":checked"))
{remember=1}
else{remember=0}
var dataString='mobile='+mobile+'&pass='+pass+'&ccode='+ccode+'&remember='+remember+'&token='+token;$.ajax({type:"POST",url:"/signregister_ajax.php",data:dataString,cache:!1,beforeSend:function(){$("#loader").html('<img src="/images/loader.gif" />')},success:function(data)
{if($.trim(data)=="OTP"){showOTP(ccode,mobile,pass);return!1}
else if($.trim(data)=="mismatch")
{$("#loader").html('<b>Password mismatch</b>');return!1}
else if($.trim(data)=="loginsucess")
{location.reload();}
else{return!1}}});e.preventDefault()})});</script>
    <?php include('footer.php'); ?>   
