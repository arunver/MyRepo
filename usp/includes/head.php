<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome To
<?=SITENAME?> 
administrative panel</title>

<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>

<script src="js/jquery-1.9.1.js"></script>

<SCRIPT src="js/ajax.js" language="javascript" type="text/javascript"></SCRIPT>
<SCRIPT src="js/common.js" language="javascript" type="text/javascript"></SCRIPT>

<!--				Light Box 	Start		-->
<link rel="stylesheet" type="text/css" href="lightbox/doc/css/style.css">
<script type="text/javascript" src="lightbox/src/adapter/shadowbox-base.js"></script>
<script type="text/javascript" src="lightbox/src/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.loadSkin('classic', 'lightbox/src/skin');
Shadowbox.loadLanguage('en', 'lightbox/src/lang');
Shadowbox.loadPlayer(['flv', 'html', 'iframe', 'img', 'qt', 'swf', 'wmp'], 'lightbox/src/player');
window.onload = function(){
	Shadowbox.init();
};
</script>
<!--light box end-->

<link href="css/smart_wizard.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.smartWizard-2.0.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
	
		/* 		side panel js 		*/
		
		/* var menu_ul = $('.menu > li > ul'),
	           menu_a  = $('.menu > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        e.preventDefault();
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    }); */
		
		/*     side panel js end 	*/
	
    	// Smart Wizard 	
  	//	$('#wizard').smartWizard();
      
		  function onFinishCallback(){
			$('#wizard').smartWizard('showMessage','Finish Clicked');
		  }  
		  	
	});
	  
	function fillclick(txtid,checkid){
			  $("#" + checkid).click(function () {

						if (this.checked) {

							var myDate = new Date();

						//	var prettyDate =  myDate.getDate() + '-' + (myDate.getMonth() + 1) + '-' + myDate.getFullYear() + ' '+myDate.getHours()+':'+myDate.getMinutes()+':'+myDate.getSeconds();
							var today = "<?php echo date("d-m-Y H:i:s");?>";

							$("#" + txtid).val(today);

						} else { //if not checked

							$("#" + txtid).val('');

						}

					});
		}
</script>

<script src="js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
