<?php

echo"
<script type=\"text/javascript\">

     $(document).ready(function() {
       $(\"#redirekt_to_start\").load(\"JQuery/redirekt_to_start.php\");
       var refreshId = setInterval(function() {
          $(\"#redirekt_to_start\").load('JQuery/redirekt_to_start.php?' + 1*new Date());
       }, 1000);
    });

setTimeout(function(){
   window.location.reload(1);
}, 10*60000);
</script>
";

?>