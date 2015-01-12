
<!--span class="stepNumber">1</span-->
<?php
//session_destroy();
?>


<ul class="anchor">
		<li>
		<?php	
			if(($_SESSION['form1_isdone'] == "1" || $_GET['data']) && $current_page != "form1.php")
			{		
				if(!empty($_GET['data']))
				{
					$anchor = "<a href='form1.php?data=".$_GET['data']."' class='done'>";	
					
				}
				else{
					$anchor = "<a href='form1.php' class='done'>";	
				}
			}
			else{
				$class=(($current_page == "form1.php") ? " selected":"disabled");
				$anchor = "<a href='javascript:void(0);' class=".$class.">";	
			}
			echo $anchor;
		?>		
				<span class="stepDesc">
				   <small>1. Initiate Provisioning Of Service</small>
				</span>
				<div id="arrow"></div>
			</a>			
		</li>	
		
		<li>
		<?php	
			if($current_page != "form2.php")
			{
				if($_SESSION['form1_isdone'] == "1" || $_GET['data'])
					{
						if(!empty($_GET['data']))
							{
								$anchor = "<a href='form2.php?data=".$_GET['data']."' class='done'>";	
								
							}
							else{
								$anchor = "<a href='form2.php' class='done'>";	
							}											
					}
				else
					{
						$anchor = "<a href='javascript:void(0);' class='disabled'>";	
					}
			}
			else{
				$anchor = "<a href='form2.php' class='selected'>";				
			}
			echo $anchor;
		?>				
				<span class="stepDesc">
				   <small>2. Requirement To Configuration</small>
				</span>
				<div id="arrow"></div>
			</a>
			
		</li>
		
		<li>
		<?php	
			if($current_page != "form3.php")
			{
				if($_SESSION['form1_isdone'] == "1" || $_GET['data'])
					{
						if(!empty($_GET['data']))
							{
								$anchor = "<a href='form3.php?data=".$_GET['data']."' class='done'>";	
								
							}
							else{
								$anchor = "<a href='form3.php' class='done'>";	
							}			
					}
				else
					{
						$anchor = "<a href='javascript:void(0);' class='disabled'>";	
					}
			}
			else{
				$anchor = "<a href='form3.php' class='selected'>";			
			}
			echo $anchor;
		?>
			
				<span class="stepDesc">
				   <small>3. Pre-Order Commitment And Preparation Control Sheet</small>
				</span>  
				<div id="arrow"></div>	
			</a>
			
		</li>
		 
		<li>
		<?php	
			if($current_page != "form4.php")
			{
				if($_SESSION['form1_isdone'] == "1" || $_GET['data'])
					{
						if(!empty($_GET['data']))
							{
								$anchor = "<a href='form4.php?data=".$_GET['data']."' class='done'>";	
								
							}
							else{
								$anchor = "<a href='form4.php' class='done'>";	
							}												
					}
				else
					{
						$anchor = "<a href='javascript:void(0);' class='disabled'>";							
					}
			}
			else
			{
				$anchor = "<a href='form4.php' class='selected'>";	
			}
			echo $anchor;
		?>			
				<span class="stepDesc">
				   <small>4. Equipment Ordering for Service</small>
				</span>    
				<div id="arrow"></div>	
			</a>
			
		</li>
		
		<li>
		<?php	
			if($current_page != "form5.php")
			{
				if($_SESSION['form1_isdone'] == "1" || $_GET['data'])
					{
						if(!empty($_GET['data']))
							{
								$anchor = "<a href='form5.php?data=".$_GET['data']."' class='done'>";	
								
							}
							else{
								$anchor = "<a href='form5.php' class='done'>";	
							}											
					}
				else
					{
						$anchor = "<a href='javascript:void(0);' class='disabled'>";		
					}
			}
			else{
				$anchor = "<a href='form5.php' class='selected'>";		
			}
			echo $anchor;
		?>			
				<span class="stepDesc">
				   <small>5.Installation, Acceptance, Usage, Billing</small>
				</span>     
				<div id="arrow"></div>
			</a>
		</li>			
 </ul>