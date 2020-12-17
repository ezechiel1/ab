<?php include 'ajax.php'; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" >
                    <h2 class="col-md-10">LISTE DES PRODUITS DISPONIBLE A VENDRE
                      <!-- Display Dynamic Notification from Session -->
                      <?php
                      $sssData=array();
                      $sssData=$_SESSION['sessData'];
                      if($sssData!=''):
                        if($sssData['status']['type']=='error'): ?>
                            <small style="margin: 0px; padding: 4px; font-size: 13px;" class="alert alert-danger alert-dismissible fade in pull-right text-danger"><?php echo $sssData['status']['msg']; ?></small>
                    <?php  else: ?>
                            <small style="margin: 0px; padding: 4px; font-size: 13px;" class="alert alert-success alert-dismissible fade in pull-right text-success"><?php echo $sssData['status']['msg']; ?></small>
                      <?php endif;
                    endif; ?>
                      <!-- End Display Dynamic Notification -->
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 5%;">#No.</th>
                          <th style="width: 5%;">Stock_No</th>
                          <th style="width: 15%;">Categorie</th>
                          <th>Designation</th>
                          <th style="width: 8%;">Mark/Model</th>
                          <th style="width: 8%;">Unite</th>
                          <th style="width: 8%;">Quantite</th>
                          <th style="width: 8%;">P.V.U Min</th>
                          <th style="width: 8%;">P.V.U Max</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
<?php $allP=$db->getRows('ab_products', array('order_by'=>'id desc', 'where'=>array('status'=>1)));
            if(!empty($allP)): $count=0; foreach($allP as $row):
                  $allC=$db->getRows('ab_product_category', array('order_by'=>'id desc', 'where'=>array('id'=>$row['category_id'])));
                        if(!empty($allC)):  foreach($allC as $show): $count++;
$title='getTotal'.$row['id'].'()'; $vQTY='var vqty="qty'.$row['id'].'";'; $QTY='qty'.$row['id']; $vPVU='var vpvu="pvu'.$row['id'].'";'; $PVU='pvu'.$row['id'];
$vDISPLAY='var vdisplay="display'.$row['id'].'";'; $DISPLAY='display'.$row['id'];
      ?>
<script type="text/javascript">
function <?php echo $title; ?>{
      if(XMLHttpRequestObject){
        XMLHttpRequestObject.open("POST","class/ajaxControler.php");
        XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        XMLHttpRequestObject.onreadystatechange=function(){

            if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
              var datar=XMLHttpRequestObject.responseText;
              <?php echo $vDISPLAY; ?>
              var divsee=document.getElementById(vdisplay);/// la ou ca va afficher
              divsee.innerHTML=datar;
            }
        }
        //les variables a etre envoyer et utiliser
        <?php echo $vQTY; ?>
        <?php echo $vPVU; ?>
        var qt=document.getElementById(vqty).value;
        var pu=document.getElementById(vpvu).value;
        var data=qt+'|'+pu+'|'; //pour concatener plusieures variables
        XMLHttpRequestObject.send("getTotal=" + data); // Send variables
      }
      return false;
    }
</script>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <th><?php echo $row['stock_no'] ?></th>
                          <th><?php echo  $show['name']?></th>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['model'] ?></td>
                          <td><?php echo $row['unity'] ?></td>
                          <td><?php echo $row['quantity'] ?></td>
                          <td><?php echo $row['pvu_min'] ?> $</td>
                          <td><?php echo $row['pvu_max'] ?> $</td>
                          <th><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#vendre<?=$row['id']?>ezpk">
                            <i class="fa fa-plus"> </i> Vendre
                          </button></th>
                </tr>

                <div class="modal fade " id="vendre<?=$row['id']?>ezpk" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form method="post" action="class/venteController.php" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Amani Business</h4>
                      </div>

                          <div class="modal-body">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nom">Categorie<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <select id="first-name" readonly required="required" name="category" class="form-control col-md-7 col-xs-12">
                                    <option value="<?php $show['category_id'] ?>" hidden><?php echo $show['name'] ?></option>

                                </select>
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Stock_no</label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <select id="middle-name" readonly class="form-control col-md-7 col-xs-12"  name="stock_no">
                                  <option value="<?php echo $row['stock_no'] ?>" hidden><?php echo 'DEPOT-'. $row['stock_no'] ?></option>

                                </select>
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nom">Nom<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <input type="text" readonly value="<?php echo $row['name'] ?>" id="first-name" required="required" name="name" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Model<span class="required">*</span>
                              </label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" readonly value="<?php echo $row['model']; ?>" required="required" name="model" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unite</label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <select id="middle-name" readonly  class="form-control col-md-7 col-xs-12"  name="unity">
                                  <option value="<?php $row['unity'] ?>" hidden><?php echo $row['unity'] ?> </option>

                                </select>
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <input id="middle-name" readonly value="<?php echo $row['quantity'] ?>" class="form-control col-md-7 col-xs-12" type="number" name="quantity">
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prix Vente unit Min</label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <input id="middle-name" readonly value="<?php echo $row['pvu_min'] ?>" class="form-control col-md-7 col-xs-12" type="number" name="pau">
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prix vente unit Max</label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <input id="middle-name" readonly value="<?php echo $row['pvu_max'] ?>" class="form-control col-md-7 col-xs-12" type="number" name="pvu">
                              </div>
                            </div>
                            <br><br>

                          </div>
                          <div class="modal-footer">
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity A Vendre <span id="qty"></span> </label>
                              <div class="col-md-9 col-sm-6 col-xs-12" >
                                <input id="<?php echo $QTY; ?>" value="0" oninput="<?php echo $title; ?>;"  class="form-control col-md-7 col-xs-12" type="number" name="quantity_vente">
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prix Vente unit</label>
                              <div class="col-md-9 col-sm-6 col-xs-12">
                                <input id="<?php echo $PVU; ?>" oninput="<?php echo $title; ?>;"  value="<?php echo $row['pvu_max']; ?>" class="form-control col-md-7 col-xs-12" type="number" name="pvu">
                              </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prix vente Total</label>
                              <div class="col-md-9 col-sm-6 col-xs-12" id="<?php echo $DISPLAY; ?>" >
                                <input class="form-control col-md-7 col-xs-12" value="0" type="number" name="pvt">
                              </div>
                            </div>
                            <br><br>
                            <input type="hidden" name="category" value="1">
                            <input type="hidden" name="ID" value="<?php echo $row['id']; ?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="register" class="btn btn-primary">Enregistrer la Vente</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>

<?php endforeach; endif; endforeach; endif; ?>
                </tbody>
                        </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
