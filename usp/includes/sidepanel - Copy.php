<?php 
$current_page = basename($_SERVER['SCRIPT_FILENAME']);

if($current_page != 'signup.php')
	{
?>	
<div id="sidemenu">

	<ul class="form">
		<li <?php $class=(($current_page == "adminArea.php") ? " selected":" ") ?> class="<?php echo $class;?>"><a class="profile" href="adminArea.php"><i class="icon-user"></i>Home</a></li>
		<li <?php $class=(($current_page == "userlist.php") ? " selected":" ") ?> class="<?php echo $class;?>"><a class="messages" href="userlist.php"><i class="icon-envelope-alt"></i>User List <em>3</em></a></li>
		<li <?php $class=(($current_page == "setting.php") ? " selected":" ") ?> class="<?php echo $class;?>"><a class="settings" href="setting.php"><i class="icon-cog"></i>Settings</a></li>
		<li <?php $class=(($current_page == "logout.php") ? " selected":" ") ?> class="<?php echo $class;?>"><a class="logout" href="logout.php"><i class="icon-signout"></i>Logout</a></li>
	</ul>
		
</div>
<?php 
	}
?>	