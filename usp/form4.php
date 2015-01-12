<?php
ob_start();
session_start();
require_once('config/configure.php');
require_once('includes/function/autoload.php');

$loginObj = new Login();
$loginObj->checkSession();
$pageName = getPageName();

$formObj = new Form4();
$generalObj = new GeneralFunctions();

require_once('validation_class.php');
$obj = new validationclass();

if(isset($_SESSION['form1_id']) || isset($_GET['data']))
{
	$form_id = base64_decode($_GET['data']);

	if(!empty($form_id))
	{
		//$_SESSION['form1_id'] = $form_id;
		$formArray = $formObj->getFormArray($form_id,'form4');
	} else{
		$formArray = $formObj->getFormArray($_SESSION['form1_id'],'form4');
	}
	

	$ntap_sub_flag 	= (($formArray['ntap_sub_flag'] == 'on') ? 'checked="checked"' : '');
	$ntap_sch_flag 	= (($formArray['ntap_sch_flag'] == 'on') ? 'checked="checked"' : '');

	if(isset($_POST['form4_submit'])) {
		 $_SESSION['form4_isdone'] = $_POST['form4_submit'];
		 
		$_POST = postwithoutspace($_POST);
	   
		if(!empty($formArray))
		{
			$formObj->updateForm4($_POST,$form_id);
		}
		else{
			$formObj->addForm4($_POST);
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
		
			$("#form4").validationEngine(); 
			fillclick("ntap_sub_date","ntap_sub_flag");
			fillclick("ntap_sch_date","ntap_sch_flag");
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
			
			<div class="stepContainer content" style="height: 270px;">	
			
					<div id="step-4">
						<h2 class="StepTitle">Equipment Ordering for Service</h2>				
						<form class="form-style-9" id="form4" action="#" method="post" enctype="multipart/form-data">
							<ul>				
								<li>					
									<label class="label align-left" style="width:100px;"></label>
									<input type="checkbox" class="field-style" name="ntap_sub_flag" id="ntap_sub_flag" <?php echo $ntap_sub_flag;?> <?php echo $acn_readonly;?> data-validation-engine="validate[required]" /><label class="label align-left">NetApp submits internal order via SFDC </label>  
									<input type="text" name="ntap_sub_date" id="ntap_sub_date" class="field-style" size="30" placeholder="dd-mm-yyyy hh:mm:ss" style="left: 276px;position: absolute;top: 125px;" value="<?php echo $formArray['ntap_sub_date'];?>" <?php echo $acn_readonly;?> />
								
									<input type="checkbox" class="field-style" name="ntap_sch_flag" id="ntap_sch_flag" <?php echo $ntap_sch_flag;?> <?php echo $acn_readonly;?> data-validation-engine="validate[required]" style="margin-left:18px;"/><label class="label align-left">NetApp schedules installation </label>  
									<input type="text" name="ntap_sch_date" id="ntap_sch_date" class="field-style" size="30" placeholder="dd-mm-yyyy hh:mm:ss" style="left: 505px;position: absolute;top: 125px;" value="<?php echo $formArray['ntap_sch_date'];?>" <?php echo $acn_readonly;?> />												
								
								</li>
								<br><br><br>					
							</ul>
						
		
						<div class="actionBar">
								<div class="loader">Loading</div>
								<a id="finish" href="javascript:void(0);" class="buttonFinish buttonDisabled">Finish</a>
								<input type="submit" class="buttonNext" name="form1-next" id="next" value="Next"/>
								<a id="previous" href="form3.php" class="buttonPrevious">Previous</a>
						</div>
						<input name="form4_submit" type="hidden" value="1"/>
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