<?php
ob_start();
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();

$formObj = new Form2();
$generalObj = new GeneralFunctions();

require_once('validation_class.php');
$obj = new validationclass();

if(isset($_SESSION['form1_id']) || isset($_GET['data']))
{

$form_id = base64_decode($_GET['data']);

if(!empty($form_id))
{
	//$_SESSION['form1_id'] = $form_id;
	$formArray = $formObj->getFormArray($form_id,'form2');
} else{
	$formArray = $formObj->getFormArray($_SESSION['form1_id'],'form2');
} 


$ntap_checked 	= (($formArray['ntap_agr_flag'] == 'on') ? 'checked="checked"' : '');
$acn_checked 	= (($formArray['acn_agr_flag'] == 'on') ? 'checked="checked"' : '');
$admin_checked 	= (($formArray['admin_action_flag'] == 'on') ? 'checked="checked"' : '');


if(isset($_GET['data']))
{
	$id= base64_decode($_GET['data']);
	$pcsn_no= $formObj->fetchValue(TBL_FORM1, "pcsn_num", "form1_id='".$id."'");
}
else
{
	$pcsn_no = $formObj->fetchValue(TBL_FORM1, "pcsn_num", "form1_id='".$_SESSION['form1_id']."'");
}

	if(isset($_POST['form2_submit'])) {
		 $_SESSION['form2_isdone'] = $_POST['form2_submit'];
		
	  $_POST = postwithoutspace($_POST);
	  
	  if(!empty($formArray) && isset($_GET['data']))
	  {
		$formObj->updateForm2($_POST,$form_id);
	  }
	  else{
		$formObj->addForm2($_POST);
	  }
	  
	  
	  exit;
	  
	  
	}
	
}
else
{
	echo"<script>window.location.href='form1.php'</script>";

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <? include('includes/head.php'); ?> 
  
   <script>
		   
		$(document).ready(function(){
			$("#form2").validationEngine(); 	
			fillclick("acn_agr_date","acn_agr_flag");
			fillclick("ntap_agr_date","ntap_agr_flag");
			fillclick("admin_action_date","admin_action_flag");
		});	

	</script>
	
</head>

<body onLoad="initialize()">
<?php include('includes/header.php'); ?>

<div id="nav-under-bg"><!-- --></div>

 <table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td> 
<!-- Smart Wizard -->
  		<div id="wizard" class="swMain">
		
  		<?php include_once('includes/uppermenu.php'); ?>
		
		<div style="margin-top:20px;">
			<? 
			echo $_SESSION['SESS_MSG']; 
			unset($_SESSION['SESS_MSG']); 
			?>
		</div>	
			
		<div class="stepContainer" style="height: 709px;">		
			<div class="stepContainer content" style="height: auto;">
			
				<div id="step-2">
					<h2 class="StepTitle">Requirement To Configuration</h2>	
					<h1>PCSN : [<?php echo $pcsn_no; ?>]</h1>
					<h1>Note : Sample text that explains the process of attaching the needed documents to the form TBD</h1>
					<form class="form-style-9" id="form2" action="#" method="post" enctype="multipart/form-data">
					
							<ul>
							
							<li>
								<label class="label align-left">Customer Needs Profile Document <span class="spancolor"></span></label>

								<input type="file" placeholder="Upload Files" name="profile_doc_file" id="profile_doc_file" value="<?php echo $formArray['profile_doc_file'];?>" /> 								
								
								<a href="<?php echo ((!empty($formArray['profile_doc_file'])) ? SITEPATH.$formArray['profile_doc_file']: "javascript:void(0);");?>"><input type="button" class="attachment"/></a>
								
								<input type="text" placeholder="dd-mm-yyyy hh:mm:ss" size="50" class="field-style" id="profile_doc_date" name="profile_doc_date" value="<?php echo $formArray['profile_doc_date'];?>" />
								</li>

							<li>
							<label class="label align-left">Configuration Specification </label>
							<input type="file" name="config_spec_file" id="config_spec_file"> 
							
							<a href="<?php echo ((!empty($formArray['config_spec_file'])) ? SITEPATH.$formArray['config_spec_file']: "javascript:void(0);");?>"><input type="button" class="attachment"/></a>
							
							<input type="text" name="config_spec_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss" value="<?php echo $formArray['config_spec_date'];?>" />
							</li>
							<br/>
							<li>
							<label class="label align-left">Agreement on Config *</label>
								
								<input type="checkbox" class="field-style" name="acn_agr_flag" id="acn_agr_flag" <?php echo $acn_checked;?> <?php echo $ntap_readonly;?> data-validation-engine="validate[required]" />  <label class="label align-left">Accenture agrees?</label>
								<input type="text" id="acn_agr_date" name="acn_agr_date" class="field-style" size="30" placeholder="dd-mm-yyyy-hh:mm:ss" style="left: 276px;position: absolute;top: 310px;" value="<?php echo $formArray['acn_agr_date'];?>" <?php echo $ntap_readonly;?> />
							
							<input type="checkbox" class="field-style" name="ntap_agr_flag" id="ntap_agr_flag" <?php echo $ntap_checked;?> <?php echo $acn_readonly;?> data-validation-engine="validate[required]" /><label class="label align-left">NetApp agrees?</label>  
							<input type="text" name="ntap_agr_date" id="ntap_agr_date" class="field-style" size="30" placeholder="dd-mm-yyyy hh:mm:ss" style="left: 509px;position: absolute;top: 310px;" value="<?php echo $formArray['ntap_agr_date'];?>" <?php echo $acn_readonly;?> />
												
							
							</li>						
							<br><br><br>
							<li>
							<p>
								Text: If both parties are in agreement with the configuration and sizing, enter opportunity into SFDC
							</p>
							</li>
							
							<li>
							<label class="label align-left">Action Completed *</label>
							<input type="checkbox" class="field-style" name="admin_action_flag" id="admin_action_flag" <?php echo $admin_checked;?> <?php echo $admin_readonly;?> data-validation-engine="validate[required]" />  (Only For Admin User)
							</li>
							
							<li>
							<label class="label align-left">Date *</label>
							<input type="text" name="admin_action_date" id="admin_action_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss"  value="<?php echo $formArray['admin_action_date'];?>" <?php echo $admin_readonly;?> />
							</li>
							
							</ul>					
						
		
							<div class="actionBar">
									<div class="loader">Loading</div>
									<a id="finish" href="javascript:void(0);" class="buttonFinish buttonDisabled">Finish</a>
									<input type="submit" class="buttonNext" name="form1-next" id="next" value="Next"/>
									<a id="previous" href="form1.php" class="buttonPrevious">Previous</a>
							</div>
							
						<input name="form2_submit" type="hidden" value="1"/>
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