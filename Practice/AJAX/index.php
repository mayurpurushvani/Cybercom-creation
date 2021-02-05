<html>

<head>

    <script type="text/javascript">
        function load($thetag, $thefile) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById($thetag).innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', $thefile, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <input type="submit" onclick="load('adiv','include.php');">
    <div id="adiv">
        <div>
</body>

</html>