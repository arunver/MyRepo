<div id="menu">
        <div id="menu">
        <ul id="nav">           
          <li><a title="Welcome" <?php if ($current_page == "adminArea.php") { ?>class="active"<?php } ?> href="adminArea.php">Welcome</a></li>      
      <?php 
	  /*
      		if($_SESSION['ADMIN_TYPE'] == 2){
      	?>
      		 <li><a title="Advertiser Detail" href="manageUser.php" <?php if ($current_page == "userProfile.php" || $current_page == "changePassword.php") { ?>class="active"<?php } ?> id="62">Advertiser Profile</a></li>
      <?php			
      		}else{
      ?>	
      		 <li><a title="Advertiser Detail" href="manageUser.php" <?php if ($current_page == "manageUser.php" || $current_page == "addUser.php" || $current_page == "editUser.php") { ?>class="active"<?php } ?> id="62">Advertiser List</a></li>
      <?php			
      		}
	*/		
      ?>          
         
        <li><a title="Initiate Provisioning of Service" href="form1.php" <?php if ($current_page == "form1.php") { ?>class="active"<?php } ?> id="62">Form Panel</a></li>  
        <li><a title="Form List" href="formList.php" <?php if ($current_page == "formList.php") { ?>class="active"<?php } ?> id="62">List Forms</a></li>        
    </ul>
 </div>
</div>


					