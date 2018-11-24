  <script src=<?php echo base_url('public/jquery/jquery-3.1.1.min.js'); ?>></script>
  <script src=<?php echo base_url('public/semantic/dist/semantic.js'); ?>></script>
  <script>
    $(document).ready(function () {
      <?php
      if (isset($formRules)) {
        echo "$('.ui.form').form(".$formRules.");";
      }

      if (isset($jqueries)) {
        foreach($jqueries as $element => $funs) {
          // print the selector
          echo "$('".$element."')";
          // print the functions as a chain
          foreach($funs as $fun => $args) {
            echo ".".$fun."(";
            // print arguments as-is
            if (is_array($args)) {
              foreach($args as $arg) {
                echo $arg.",";
              }
            } else {
              echo $args;
            }
            echo ")";
          }
          echo ";";
        }
      }
      ?>

    })
  </script>
</body>
</html>