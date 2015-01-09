
var xmlHttp;

function getobject()
{
	var xmlHttp=null;
	try
	{
		xmlHttp=new XMLHttpRequest;
	}
	catch(e)
	{
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP")	;
		}	
	}
	return xmlHttp;
}


function changeStatus(divID , id , action)
{
 	xmlhttp=getobject();
	var query="id="+id+"&action="+action;
 	document.getElementById(divID).innerHTML='<img src="images/loading_icon.gif">';
	xmlhttp.onreadystatechange=function()
	{
		
		if (xmlhttp.readyState==4)
		{	
			//alert(xmlhttp.responseText);
			//alert("urvesh");
			//alert(divID);
			document.getElementById(divID).innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET","pass.php?type=changestatus&"+query,true);
	xmlhttp.send(null);	
}


function takeBackup()
{
	xmlhttp=getobject();
	var query="";
	document.getElementById("showMsg").innerHTML='<img src="images/indicator.gif">';
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4)
		{							
			document.getElementById("showMsg").innerHTML = "<font size='3'>DATABASE BACKUP IS COMPLETED.</font><br><b>It is stored in -- "+xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","pass.php?action=backup&type=takeBackup&"+query,true);
	xmlhttp.send(null);	
}

function getAllProducts(keyword)
{	
	xmlhttp=getobject();
	var query="keyword="+keyword+"&action=coupon";
	document.getElementById("divAllProducts").innerHTML='<img src="images/loading_icon.gif">';
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4)
		{				
			document.getElementById("divAllProducts").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","pass.php?type=getAllProducts&"+query,true);
	xmlhttp.send(null);	
}
 
function getCity(countryId)
	{	
		xmlhttp=getobject();
		var query="countryId="+countryId+"&action=getCity";
		document.getElementById("cityList").innerHTML='<img src="images/loading_icon.gif">';
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4)
			{		
				//alert(xmlhttp.responseText); return false;		
				document.getElementById("cityList").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","pass.php?type=getCity&"+query,true);
		xmlhttp.send(null);	
	}

function getSubCategory(categoryId)
	{	
		xmlhttp=getobject();
		var query="categoryId="+categoryId+"&action=getSubCategory";
		document.getElementById("subCategory").innerHTML='<img src="images/loading_icon.gif">';
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4)
			{		
			//	alert(xmlhttp.responseText); return false;		
				document.getElementById("subCategory").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","pass.php?type=getSubCategory&"+query,true);
		xmlhttp.send(null);	
	}

   function find_randomNumber(){
      
	 	  xmlhttp=getobject();
	 	  	var query="?action=managePsychologist&type=generateNumber";
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4)
		{							
			var chek = xmlhttp.responseText;			
			document.getElementById("Password").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","pass.php"+query,true);
	xmlhttp.send(null);	
	 
 }

function screenshot_del(id,tbl)
{	
	var r=confirm("Are you sure you want to delete Image");
	if (r==true)
		{
			$.get('pass.php?action=manageUser&type=screenshot_del',{imgid: id,table: tbl} , function(data) {	 																																														            		alert(data);	
					window.location.reload();																		  
			});				
		}
	else
		{
			alert("You pressed Cancel!");
		} 
	
}







