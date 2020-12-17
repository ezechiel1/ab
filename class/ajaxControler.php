<?php
  session_start();

  if(isset($_POST['getTotal'])):
    $total=$_POST['getTotal'];
    list($qy, $pu)=explode('|', $total);
    $tot=(int)$qy*(int)$pu;
     ?>
            <input class="form-control col-md-7 col-xs-12" name="pvt" value="<?php echo $tot; ?>" type="number" >
     <?php
  endif;
?>
