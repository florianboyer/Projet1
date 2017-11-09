<!DOCTYPE html> 
<html lang=fr>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href=".css">

<title>Tableaux JavaScript</title>
</head>
<body> 

<div id="msg"></div>
<script>

var language=["C++","PHP","JavaScript","Python","HTML","CSS","SQL","Lisp","Ruby"];

for (i in language) 
{
	document.getElementById("msg").innerHTML+="<br>"+language[i];
}
</script>
</body>
</html>
