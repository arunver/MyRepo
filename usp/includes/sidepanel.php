<?php 
$current_page = basename($_SERVER['SCRIPT_FILENAME']);

$userObj = new User();
$query = " SELECT * FROM ".TBL_ADMINUSER." where userType != '1'";
				
$sql = $userObj->executeQry($query);
$userCount = $userObj->getTotalRow($sql);

if($current_page != 'signup.php')
	{
?>	
<div id="sidemenu">

	<ul class="menu">
		<li class="item1"><a href="adminArea.php" <?php $class=(($current_page == "adminArea.php") ? " active":" ") ?> class="<?php echo $class;?>">Home </a>
			<!--ul>
				<li class="subitem1"><a href="#">Cute Kittens <span>14</span></a></li>
				<li class="subitem2"><a href="#">Strange "Stuff" <span>6</span></a></li>
				<li class="subitem3"><a href="#">Automatic Fails <span>2</span></a></li>
			</ul-->
		</li>
		
		<li class="item2"><a href="userlist.php" <?php $class=(($current_page == "userlist.php") ? " active":" ") ?> class="<?php echo $class;?>">User List <span><?php echo $userCount;?></span></a>		
		</li>
		
		<!--li class="item3"><a href="#" <?php $class=(($current_page == "setting.php") ? " active":" ") ?> class="<?php echo $class;?>">Settings</a>	
		</li-->
		
		<li class="item4"><a href="logout.php" <?php $class=(($current_page == "logout.php") ? " active":" ") ?> class="<?php echo $class;?>">Logout</a>	
		</li>
	</ul>

</div>
<?php 
	}
?>	