<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script>
  function myAjax() {
        $.ajax({
             type: "POST",
             url: '../test.php',
             data:{action:'call_this'},
             success:function(html) {
               alert(html);
             }

        });
   }
</script>
  <a href="" onclick="myAjax()">Delete</a>
  <?php
  if($_POST['action'] == 'call_this') {
    echo "it works!";
  }
  else {
    echo "versagt!";
  }
  ?>
</body>
</html>
