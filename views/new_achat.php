
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enregistrer <small>Achat</small></h2>
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
                    <br />
                    <form method="post" action="class/achatController.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nom">Categorie<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="first-name" required="required" name="category" class="form-control col-md-7 col-xs-12">
                              <option value="" hidden>Choisir Categorie</option>
<?php $allC=$db->getRows('ab_product_category', array('order_by'=>'name asc'));
        if(!empty($allC)): foreach($allC as $row):?>
                              <option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
<?php endforeach; endif; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nom">Nom<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="name" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="model">Model<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" required="required" name="model" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unite</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="middle-name" required class="form-control col-md-7 col-xs-12"  name="unity">
                            <option value="" hidden>Choisir Unite </option>
                            <option value="Carton">Carton</option>
                            <option value="Piece">Piece</option>
                            <option value="Box">Box</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" required class="form-control col-md-7 col-xs-12" type="number" name="quantity">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prix achat unit</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" required class="form-control col-md-7 col-xs-12" type="number" name="pau">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prix vente unit Min</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" required class="form-control col-md-7 col-xs-12" type="number" name="pvu_min">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Prix vente unit Max</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" required class="form-control col-md-7 col-xs-12" type="number" name="pvu_max">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Stock_no</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="middle-name" required class="form-control col-md-7 col-xs-12"  name="stock_no">
                            <option value="" hidden>Choisir Stock </option>
                            <option value="Boutique-1">Boutique-1</option>
                            <option value="Boutique-2">Boutique-2</option>
                            <option value="Depot-1">Depot-1</option>
                            <option value="Depot-2">Depot-2</option>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary" type="reset">Annuler</button>
                          <button type="submit" name="register" class="btn btn-success">Enregistrer</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
