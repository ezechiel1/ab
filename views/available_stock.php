
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title" >
                    <h2 class="col-md-9" >LISTE DES PRODUITS DISPONIBLE EN STOCK
                    
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
                          <th style="width: 10%;">Stock</th>
                          <th style="width: 25%;">Designation</th>
                          <th>Mark/Model</th>
                          <th style="width: 10%;">Unite</th>
                          <th style="width: 10%;">Quantite</th>
                          <th style="width: 10%;">P.V.U Min</th>
                          <th style="width: 10%;">P.V.U Max</th>
                        </tr>
                      </thead>
                      <tbody>
<?php $all=$db->getRows('ab_products', array('order_by'=>'id desc', 'where'=>array('status'=>1)));
      if(!empty($all)): $count=0; foreach($all as $show):$count++;
      ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <th><?php echo $show['stock_no'] ?></th>
                          <td><?php echo $show['name']; ?></td>
                          <td><?php echo $show['model'] ?></td>
                          <td><?php echo $show['unity'] ?></td>
                          <td><?php echo $show['quantity'] ?></td>
                          <td><?php echo $show['pvu_min'] ?> $</td>
                          <td><?php echo $show['pvu_max'] ?> $</td>
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

<?php endforeach; endif; ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
