<!-- <script language="javascript" src="js/jquery-1.3.min.js"></script> -->
<script type="text/javascript">

function goBack(url)
{
	/*window.history.go(-1);
	url = '<?php echo basename($_SERVER["HTTP_REFERER"]);?>';		*/	
	window.parent.location.href = url;
	return false;
}

function mainmenu(){
$(" #nav ul ").css({display: "none"});
	$(" #nav li").click(function(){
	$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown('fast').show();
	},function(){
		$(this).find('ul:first:hidden').css({display: "none"}).slideUp('slow');
	});
	$(" #nav li").hover(function(){
		$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown('fast').show();
		},function(){
			$(this).find('ul:first').slideUp('slow');
		});
}

$(document).ready(function(){
	mainmenu();		
});
</script>




<script type="text/javascript">
$(document).ready(function(){ 

	$('table.Success-Msg').delay(2000).fadeOut(2000, function() {$(this).hide(2000);});		

	//****************check all start *************		
		var a = $('[name="chk[]"]');
		if(a.length == a.filter(":checked").length){
			$('#checkall').prop('checked', true);
		}
		
	 	$('#checkall').on("click",function(e)
	 	{
	 		if($('#checkall').is(':checked'))
	 		{
	 			$('[name="chk[]"]').prop('checked', true);
	 		}
	 		else{
	 			$('[name="chk[]"]').prop('checked', false);
	 		}
	 	});
	 	
	 	$('[name="chk[]"]').on("click",function(e)
	 	{	 		
	   		var b = $('[name="chk[]"]');
			if(b.length == b.filter(":checked").length){
				$('#checkall').prop('checked', true);
			}else{
				$('#checkall').prop('checked', false);
			}
	 	});

	//****************check all end ***************
});
</script>
<!-- ************************ Left Nav Ends **************************  -->

<div id="main">
	<div id="head">
		<div id="head-left" style=" width:500px;">
		  <h1><?=SITENAME?> <!-- <a href="../" target="_blank">(view site*)</a> --></h1>
		</div>
<?php 
$current_page = basename($_SERVER['SCRIPT_FILENAME']);

if($current_page != 'signup.php')
	{
?>		
		<div id="head-right">
			<ul>
				<li class="face">Hello</li>
				<li class="admn"><b><?=$_SESSION['ADMIN_USERNAME']?></b></li>				
			</ul>
			<h2>Last login: <?=$_SESSION['ADMIN_LAST_LOGIN']?></h2>
		</div>

<?php 
	}
?>	


	</div>
	
</div>

<?
/************ Display Top Menu (START) *********** */                      

//	$menuClass = new webClass;
//	$menuData  = $menuClass->displayMenu($pageName);
/************ Display Top Menu (END) ************* */                

?>
<div style="clear:both"></div>
<div id="menu">
<? 	
	
	if($current_page != 'signup.php')
	{
		include_once('sidemenu.php');	
	}
	

	/*$menuClass = new  Menu;
	// basename($_SERVER['SCRIPT_FILENAME'])
	$menuData  = $menuClass->displayMenu_new(basename($_SERVER['SCRIPT_FILENAME']));	*/
?>
</div>

<?php
include_once('sidepanel.php');	

	
$admin_readonly = (($_SESSION['ADMIN_TYPE'] == 1) ? '' : 'disabled="disabled"');
$ntap_readonly = (($_SESSION['ADMIN_TYPE'] == 2) ? 'disabled="disabled"' : '');
$acn_readonly = (($_SESSION['ADMIN_TYPE'] == 3) ? 'disabled="disabled"' : '');

?>

<div class="breadcrum" style="clear:both;">
<?php
//$breadCrumObj = new BreadCrum();
//$breadCrumObj->getBreadCrum();
?>
</div>