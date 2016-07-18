<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>test XSS_script</title>
</head>
    <body>
    	name:<input type="text" name="name" >

    <?php
	
 	?>
    </body>
</html>

<script type='text/javascript'>
	function writeToDom(str){
		document.writeln(str);
	}
	function getQueryString(name) { 
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
		var r = window.location.search.substr(1).match(reg); 
		if (r != null) return unescape(r[2]); return null; 
	} 

	var scriptVar=getQueryString("name")
	var script = document.createElement("script");
	//writeToDom("original: " + scriptVar); 
	
    script.innerHTML = scriptVar;
   	document.getElementsByTagName('body')[0].appendChild(script);
    //document.getElementsByTagName('script')[0].appendChild(script);


</script>

<!--http://localhost/test/forth_script.php?name=aaaa-->