
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" >
                    <h2 class="col-md-10">LISTE DES VENTES
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
                          <th>Stock_No</th>
                          <th style="width: 25%;">Designation</th>
                          <th>Mark/Model</th>
                          <th>Unite</th>
                          <th style="width: 5%;">Quantite</th>
                          <th style="width: 5%;">P.V.U</th>
                          <th style="width: 5%;"> P.V.T</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
<?php $all=$db->getRows('ab_ventes', array('order_by'=>'id desc'));
      if(!empty($all)): $count=0; foreach($all as $show):
            $allP=$db->getRows('ab_products', array('order_by'=>'id desc', 'where'=>array('id'=>$show['product_id'])));
            if(!empty($allP)): foreach($allP as $row): $count++;
      ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <th><?php echo 'DEPOT-'. $row['stock_no'] ?></th>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['model'] ?></td>
                          <td><?php echo $row['unity'] ?></td>
                          <td><?php echo $show['quantity_vente'] ?></td>
                          <td><?php echo $show['pvu'] ?> $</td>
                          <td><?php echo $show['pvt'] ?> $</td>
                          <td><?php echo $row['c_date'] ?> </td>

                </tr>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Text in a modal</h4>
                          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>

                      </div>
                    </div>
                  </div>

<?php endforeach; endif;
endforeach; endif; ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
