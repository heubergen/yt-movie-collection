<?php
function ownList($movname, $i){
return '
<div class="first_div">
<!-- THIS BUTTON CALLS AJAX SCRIPT -->
<button id="showAjax" onclick="showAjaxStuff_'.$i.'();">Show Video {php}</button>
</div>

<div class="second_div" id="ajax_auto_'.$i.'">
	<!-- AJAX CONTENT WILL BE LOADED INTO THIS DIV -->
</div>
<script type="text/javascript">
	function showAjaxStuff_'.$i.'() {
   
        if (window.XMLHttpRequest) {
        	// MODERN BROWSERS
            xmlhttp = new XMLHttpRequest();
        } else {
        	// VERY OLD BROWSERS
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        	// IF THE AJAX CALL IS SUCCESSFULL
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("ajax_auto_'.$i.'").innerHTML = xmlhttp.responseText;
            }
        };
        // CALLING THE PHP FILE
        xmlhttp.open("GET","ajax-code.php");
        xmlhttp.send();
}
</script>';
    }
?>