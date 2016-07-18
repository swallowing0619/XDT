
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>test XSS_property</title>
<script type="text/javascript" >
	function writeToDom(str){
		document.writeln(str);
	}
	function writelnToDom(str){
		document.writeln("<br>"+str + "<br>");
	}
	function getQueryString(name) { 
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
		var r = window.location.search.substr(1).match(reg); 
		if (r != null) return unescape(r[2]); return null; 
	} 
	var scriptVar=getQueryString("name");
	document.getElementById("a").setAttribute("value",scriptVar);
</script>
</head>

<body>
	
	<p>
	<input type='text'  id='a' value=''>
	<?php
    $first=$_GET["name"];
    $ss=$_GET["age"];
	?>
	
</body>
<script>
	var scriptVar=getQueryString("name");
	document.getElementById("a").setAttribute("value",scriptVar);
	writelnToDom("original: " + scriptVar); 
</script>	
</html>

<!--http://localhost/test/third_property.php?name=as-->
<!--eval('alert(1)');void-->
<!--</script><script>alert(1)</script>-   ' onclick='alert(1)->