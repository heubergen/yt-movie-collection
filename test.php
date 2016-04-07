<?php
$someVar = 1;
?>

<script type="text/javascript">
    var javaScriptVar = "<?php echo $someVar; ?>";
    window.alert(javaScriptVar);
</script>