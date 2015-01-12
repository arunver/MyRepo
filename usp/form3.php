<?php
ob_start();
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();

$formObj = new Form3();
$generalObj = new GeneralFunctions();

require_once('validation_class.php');
$obj = new validationclass();

/* echo "<pre>";
print_r($_SESSION);
exit; */

if(isset($_SESSION['form1_id']) || isset($_GET['data']))
{
	$form_id = base64_decode($_GET['data']);

	if(!empty($form_id))
	{
		//$_SESSION['form1_id'] = $form_id;
		$formArray = $formObj->getFormArray($form_id,'form3');
	} else{
		$formArray = $formObj->getFormArray($_SESSION['form1_id'],'form3');
	} 


	$ntap_checked 	= (($formArray['ntap_approve_doc'] == 'on') ? 'checked="checked"' : '');
	$acn_checked 	= (($formArray['acn_approve_doc'] == 'on') ? 'checked="checked"' : '');

	if(isset($_POST['form3_submit'])) {
		 $_SESSION['form3_isdone'] = $_POST['form3_submit'];
		
		$_POST = postwithoutspace($_POST);
		
		if(!empty($formArray))
		{
			$formObj->updateForm3($_POST,$form_id);
		}
		else{
			$formObj->addForm3($_POST);
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
			$("#form3").validationEngine();
			fillclick("acn_siteprep_date","acn_siteprep_flag");
			fillclick("ntap_approve_date","ntap_approve_doc");
			fillclick("acn_approve_date","acn_approve_doc");
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
			
			<div class="stepContainer content" style="height: 620px;">
			
				<div id="step-3">
				<h2 class="StepTitle">Pre-Order Commitment and Preparation Control Sheet</h2>	
				<h1>Text: Complete document set, check box showing each document is complete. Once document set has been completed, Accenture will approve the document set below, which will show contract acceptance.</h1>
					<form class="form-style-9" id="form3" action="#" method="post" enctype="multipart/form-data">
							<ul>					
							
							<li>
							 <label class="label align-left">U.S.S </label>
							<input type="file" name="uss_file" id="uss_file" placeholder="Upload Files"> 
							<a href="<?php echo ((!empty($formArray['uss_file'])) ? SITEPATH.$formArray['uss_file']: "javascript:void(0);");?>"><input type="button" class="attachment"/></a>
							<input type="text" name="uss_date" id="uss_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss" value="<?php echo $formArray['uss_date'];?>" />
							</li>
							
							<li>
							<label class="label align-left">SitePreparation</label>  
							<input type="file" name="site_prep_file" id="site_prep_file" placeholder="Upload Files"> 
							<a href="<?php echo ((!empty($formArray['site_prep_file'])) ? SITEPATH.$formArray['ntap_install_file']: "javascript:void(0);");?>"><input type="button" class="attachment"/></a>
							<input type="text" name="site_prep_date" id="site_prep_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss" value="<?php echo $formArray['site_prep_date'];?>" />
							</li>
							
							<li>
							<label class="label align-left">NetApp Install Guide </label> 
							<input type="file" name="ntap_install_file" id="ntap_install_file" placeholder="Upload Files"> 
							<a href="<?php echo ((!empty($formArray['ntap_install_file'])) ? SITEPATH.$formArray['ntap_install_file']: "javascript:void(0);");?>"><input type="button" class="attachment"/></a>
							<input type="text" name="ntap_install_date" id="ntap_install_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss"  value="<?php echo $formArray['ntap_install_date'];?>"/>
							</li>
							
							<li>
							<label class="label align-left">Site Config Guide </label> 
							<input type="file" name="site_conf_file" id="site_conf_file" placeholder="Upload Files"> 							
							<a href="<?php echo ((!empty($formArray['site_conf_file'])) ? SITEPATH.$formArray['site_conf_file']: "javascript:void(0);");?>"><input type="button" class="attachment"/></a>
							<input type="text" name="site_conf_date" id="site_conf_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss" value="<?php echo $formArray['site_conf_date'];?>" />
							</li>
							
							<li>
							<label class="label align-left"> BOM  </label> 
							<input type="file" name="bom_file" id="bom_file" placeholder="Upload Files"> 							
							<a href="<?php echo ((!empty($formArray['bom_file'])) ? SITEPATH.$formArray['bom_file']: "javascript:void(0);");?>"><input type="button" class="attachment"/></a>
							<input type="text" name="bom_date" id="bom_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss" value="<?php echo $formArray['bom_date'];?>" />
							</li>
												
							<br>
							
							
							<li>
							<input type="checkbox" name="acn_siteprep_flag" id="acn_siteprep_flag" <?php echo $acn_checked;?> <?php echo $ntap_readonly;?> data-validation-engine="validate[required]" />Accenture Completes Site Prep
							<input type="text" name="acn_siteprep_date" id="acn_siteprep_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss" value="<?php echo $formArray['acn_approve_date'];?>" <?php echo $ntap_readonly;?> />
							</li>
							
							<li>
							<input type="checkbox" name="acn_approve_doc" id="acn_approve_doc" <?php echo $acn_checked;?> <?php echo $ntap_readonly;?> data-validation-engine="validate[required]" />Document Set Approved(ACN)
							<input type="text" name="acn_approve_date" id="acn_approve_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss" value="<?php echo $formArray['acn_approve_date'];?>" <?php echo $ntap_readonly;?> />
							</li>							
							
							<li>
							<input type="checkbox" name="ntap_approve_doc" id="ntap_approve_doc" <?php echo $ntap_checked;?> <?php echo $acn_readonly;?> data-validation-engine="validate[required]" /> Document Set Approved(NTAP)
							<input type="text" name="ntap_approve_date" id="ntap_approve_date" class="field-style" size="50" placeholder="dd-mm-yyyy hh:mm:ss"  value="<?php echo $formArray['ntap_approve_date'];?>" <?php echo $acn_readonly;?> />
							</li>
							
							</ul>
					
		
						<div class="actionBar">
								<div class="loader">Loading</div>
								<a id="finish" href="javascript:void(0);" class="buttonFinish buttonDisabled">Finish</a>
								<input type="submit" class="buttonNext" name="form1-next" id="next" value="Next"/>
								<a id="previous" href="form2.php" class="buttonPrevious">Previous</a>
						</div>
						<input name="form3_submit" type="hidden" value="1"/>
				</form>
	</div>		
	</div>
	</div>				
		
	</div>	
<!-- End SmartWizard Content -->  		
 		
</td></tr>
</table>
 
 
  <div id="divTemp" style="display:none;"></div> 
<? unset($_SESSION['SESS_MSG']); ?>