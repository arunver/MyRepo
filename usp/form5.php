<?php
ob_start();
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();

$formObj = new Form5();
$generalObj = new GeneralFunctions();

require_once('validation_class.php');
$obj = new validationclass();

if(isset($_SESSION['form1_id']) || isset($_GET['data']))
{
	$form_id = base64_decode($_GET['data']);

	if(!empty($form_id))
	{
		//$_SESSION['form1_id'] = $form_id;
		$formArray = $formObj->getFormArray($form_id,'form5');
	} else{
		$formArray = $formObj->getFormArray($_SESSION['form1_id'],'form5');
	}
		

	$acn_conf_flag 		= (($formArray['acn_conf_flag'] == 'on') ? 'checked="checked"' : '');
	$ntap_conf_flag 	= (($formArray['ntap_conf_flag'] == 'on') ? 'checked="checked"' : '');

	if(isset($_POST['form5_submit'])) {
		 $_SESSION['form5_isdone'] = $_POST['form5_submit'];
		 
		$_POST = postwithoutspace($_POST);
		
		if(!empty($formArray))
		{
			if(!empty($_GET['data']))
				{
					$formObj->updateForm5($_POST,$_GET['data'], $_SESSION['ADMIN_TYPE']);
				}
				else{
					$formObj->updateForm5($_POST,base64_encode($_SESSION['form1_id']), $_SESSION['ADMIN_TYPE']);
				}
		}
		else{
			$formObj->addForm5($_POST);
		}
		    
		exit;
	}
}
else
{
	if(!empty($_GET['data']))
	{
		echo "<script>window.location.href='form1.php?data=".$_GET['data']."'</script>";
	}
	else{
		echo "<script>window.location.href='form1.php'</script>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <? include('includes/head.php'); ?> 
  
     <script>
		$(document).ready(function(){
			
			$("#form5").validationEngine(); 
			
			fillclick("acn_conf_date","acn_conf_flag");
			fillclick("ntap_conf_date","ntap_conf_flag");
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
			
		<div class="stepContainer" style="height: 709px;">		
		
			<div class="stepContainer content" style="height: 303px;">	
			
				<div id="step-5">
					<h2 class="StepTitle">Installation, Acceptance, Usage, Billing</h2>				
					<form class="form-style-9" id="form5" action="" method="post" enctype="multipart/form-data">
						<FIELDSET style="width:410px;" class="label">
						<LEGEND><b>Netapp User</b></LEGEND>
							<ul>
							<!--style="left: 127px;position: absolute;top: 162px;" 
							style="left: 527px;position: absolute;top: 162px;"
							-->
								<li>
									<input type="checkbox" class="field-style" name="ntap_conf_flag" id="ntap_conf_flag" <?php echo $ntap_conf_flag;?> <?php echo $acn_readonly;?> />  NetApp Completes Installation *
									<input type="text" name="ntap_conf_date" id="ntap_conf_date" class="field-style" size="32" placeholder="dd-mm-yyyy hh:mm:ss" style="margin-top:20px;" value="<?php echo $formArray['ntap_conf_date'];?>" <?php echo $acn_readonly;?> />
								</li>	
							</ul>
						
						</FIELDSET>
						
						<FIELDSET style="width:410px;position:absolute;" class="label">
						<LEGEND><b>Accenture User</b></LEGEND>
							<ul>
								<li>
									<input type="checkbox" class="field-style" name="acn_conf_flag" id="acn_conf_flag" <?php echo $acn_conf_flag;?> <?php echo $ntap_readonly;?> />  Accenture Completes Config per spec, then UAT *
									<input type="text" name="acn_conf_date" id="acn_conf_date" class="field-style" size="32" placeholder="dd-mm-yyyy hh:mm:ss" style="margin-top:20px;" value="<?php echo $formArray['acn_conf_date'];?>" <?php echo $ntap_readonly;?> />
								</li>	
							</ul>
						
						</FIELDSET>	
					<div class="actionBar">
							<div class="loader">Loading</div>
							<a id="finish" href="javascript:void(0);" class="buttonFinish">Finish</a>
							<input type="submit" class="buttonNext" name="form1-next" id="next" value="Next"/>
							<?php 
								if(!empty($_GET['data']))
										{ 
											echo "<a id='previous' href='form4.php?data=".$_GET['data']."' class='buttonPrevious'>Previous</a>";
										} 
										else{
											echo "<a id='previous' href='form4.php' class='buttonPrevious'>Previous</a>";
										}							
								?>							
					</div>
					
				<input name="form5_submit" type="hidden" value="1"/>	
					
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