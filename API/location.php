<html>
<head>
	<title>Location test</title>
</head>
<body>
<script type="application/javascript">
    function getgeoip(json){
    	document.write("Country : ", json.country);
    	document.write("<br>Latitude : ", json.lat);
    	document.write("<br>Longitude : ", json.lon);
    	document.write("<br>City :", json.city);
    	document.write("<br>region Name :", json.regionName);
    	document.write("<br>ip :", json.query);
     	document.write("<br>as :", json.as);
      	document.write("<br>timezone :", json.timezone);
    }
</script>
<script type="application/javascript" src="http://ip-api.com/json?callback=getgeoip"></script>
</body>
</html>