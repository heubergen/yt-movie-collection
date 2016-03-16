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
