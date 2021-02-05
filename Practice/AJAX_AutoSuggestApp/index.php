<html>
    <head>
        <title>Autosuggest App with AJAX</title>
    </head>
    <script type="text/javascript">
        function findMatch() {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('results').innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', 'search.php?search_text='+document.search.search_text.value, true);
            xmlhttp.send();
        }
    </script>
    <body>
        <form id="search" name="search">
            Type a Name :
            <input type="text" name="search_text" onkeyup="findMatch();">
        </form>
        <div id="results"></div>
    </body>
</html>