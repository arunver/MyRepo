<?php
ob_start();
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();

/* echo genPassword()."<br> /";
echo uniqid(); */

//$timestamp = 1419333890 ;
//$format	= "l jS F Y/m/d h:m:i G:ia";
//echo $date_my = date_my_format($timestamp,$format);


/* $ntap_readonly = (($_SESSION['ADMIN_TYPE'] == 2) ? 'readonly = true' : '');
$acn_readonly = (($_SESSION['ADMIN_TYPE'] == 3) ? 'readonly = true' : ''); */

$formObj = new Form1();
$generalObj = new GeneralFunctions();

require_once('validation_class.php');
$obj = new validationclass();

$form_id = base64_decode($_GET['data']);

if(!empty($form_id))
{
	//$_SESSION['form1_id'] = $form_id;
	$formArray = $formObj->getFormArray($form_id,'form1');
} else{
	$formArray = $formObj->getFormArray($_SESSION['form1_id'],'form1');
} 

//$formArray = $formObj->getFormArray(1,'form1');

/* echo "<pre>";
print_r($_SESSION);
exit; */

if(isset($_POST['form1_submit'])) {
	 $_SESSION['form1_isdone'] = $_POST['form1_submit'];
	 
/* 	  echo"<pre>";
	// print_r($_POST);
	 echo "-------";
	print_r($_SESSION);
	 exit; */

  $_POST = postwithoutspace($_POST);
  
  if(!empty($formArray))
  {
	$formObj->updateForm1($_POST,$_GET['data']);
  }
  else{
	$formObj->addForm1($_POST);
  }
  exit; 
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <? include('includes/head.php'); ?> 
  
  <script>
		$(document).ready(function(){
			$("#form1").validationEngine();
		});	

	</script>
	
	
</head>

<body onLoad="initialize()">
<?php include('includes/header.php'); ?>

<div id="nav-under-bg"><!-- --></div>

 <table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td> 
<!-- Smart Wizard -->
  		<div class="swMain" id="wizard">
		
		<?php include_once('includes/uppermenu.php'); ?>	
			
		<div style="margin-top:20px;">
			<? 
			echo $_SESSION['SESS_MSG']; 
			unset($_SESSION['SESS_MSG']); 
			?>
		</div>	
			
  		<div class="stepContainer" style="height: 709px;">		
		
			<div class="stepContainer content" style="height: auto;">	
		
					<div id="step-1">	
						<h2 class="StepTitle">Initiate Provisioning Of Service</h2>
						 <div class="form-style-3">
							<form class="form-style-9" id="form1" action="#" method="post" enctype="multipart/form-data">
							
								<ul>
								<li>
									<label class="label align-left">Accenture Lead(ACN) <span class="spancolor">*</span></label>
									<input type="text" placeholder="Accenture Lead" class="field-style field-split" name="acn_lead" id="acn_lead" value="<?php echo $formArray['acn_lead'];?>" <?php echo $ntap_readonly;?>/>

									<label class="label align-right">NetApp Lead(NTAP) <span class="spancolor">*</span></label>
									<input type="text" placeholder="NetApp Lead(NTAP)" class="field-style field-split align-right" name="ntap_lead" id="ntap_lead" value="<?php echo $formArray['ntap_lead'];?>" data-validation-engine="validate[required]" <?php echo $acn_readonly;?>/>
								</li>
								
								<li>
									<label class="label align-left">Email Address <span class="spancolor">*</span></label>
									<input type="text" placeholder="Email Address" class="field-style field-split" name="acn_email" id="acn_email" data-validation-engine="validate[required,custom[email]" value="<?php echo $formArray['acn_email'];?>" <?php echo $ntap_readonly;?>>
									
									<label class="label align-right">Email Address <span class="spancolor">*</span></label>
									<input type="text" placeholder="Email Address" class="field-style field-split align-right" name="ntap_email" id="ntap_email" data-validation-engine="validate[required]" value="<?php echo $formArray['ntap_email'];?>" <?php echo $acn_readonly;?>>
								</li>
								
								<li>
									<label class="label align-left">Role <span class="spancolor">*</span></label>
									<input type="text" placeholder="Role" class="field-style field-split" name="acn_role" id="acn_role" data-validation-engine="validate[required]" value="<?php echo $formArray['acn_role'];?>" <?php echo $ntap_readonly;?>>
									
									<label class="label align-right">Role <span class="spancolor">*</span></label>
									<input type="text" placeholder="Role" class="field-style field-split align-right" name="ntap_role" id="ntap_role" data-validation-engine="validate[required]" value="<?php echo $formArray['ntap_role'];?>" <?php echo $acn_readonly;?>>
								</li>
								
								<li>
									<label class="label align-left">Phone Number <span class="spancolor">*</span></label>
									<input type="text" placeholder="Phone Number" class="field-style field-split" name="acn_phone" id="acn_phone" data-validation-engine="validate[required,custom[phone],minSize[8],maxSize[18]]" value="<?php echo $formArray['acn_phone'];?>" <?php echo $ntap_readonly;?>>
									
									<label class="label align-right">Phone Number <span class="spancolor">*</span></label>
									<input type="text" placeholder="Phone Number" class="field-style field-split align-right" name="ntap_phone" id="ntap_phone" data-validation-engine="validate[required,custom[phone],minSize[8],maxSize[18]]" value="<?php echo $formArray['ntap_phone'];?>" <?php echo $acn_readonly;?>>
								</li>
								
								<br><hr><br>	
								
								<li>
									<label class="label align-left">Provisioning Case Serial Number (PCSN) <span class="spancolor">*</span></label>
									<input type="text" placeholder="Provisioning Case Serial Number (PCSN)" class="field-style field-split" name="pcsn_num" id="pcsn_num" data-validation-engine="validate[required]" value="<?php echo (($formArray['pcsn_num']) ?  $formArray['pcsn_num'] : genPassword());?>">
								</li>	
								
								
								<li>
									<label class="label align-left">Site Location <span class="spancolor">*</span></label>
									<input type="text" placeholder="Site Location" size="70" class="field-style" id="site_loc" name="site_loc" value="<?php echo $formArray['site_loc'];?>" data-validation-engine="validate[required]">
								</li>
								
								<li>
								<label class="label align-left">Requirement Descriptions <span class="spancolor">*</span></label>
								<textarea placeholder="Message" class="field-style" id="req_detail" name="req_detail" data-validation-engine="validate[required]"><?php echo $formArray['req_detail'];?></textarea>
								</li>
								
								
								
								</ul>	
				
						<div class="actionBar">
							<div class="loader">Loading</div>
							<a id="finish" href="javascript:void(0);" class="buttonFinish buttonDisabled">Finish</a>				
							<input type="submit" class="buttonNext" name="form1-next" id="next" value="Next"/>
							<a id="previous" href="javascript:void(0);" class="buttonPrevious buttonDisabled">Previous</a>
						</div>
						
						<input name="form1_submit" type="hidden" value="1"/>
					</form>
			</div>    		
						
		</div>
		
		</div>
			
		</div>
			
		</div>	
		
<!-- End SmartWizard Content -->  		
 		
</td></tr>
</table>
 
 
  <div id="divTemp" style="display:none;"></div> 
<? unset($_SESSION['SESS_MSG']); ?>