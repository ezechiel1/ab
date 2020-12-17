
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                  <h3>LISTE DES ADMINISTRATEURS
                    <?php
                    $sssData=array();
                    $sssData=$_SESSION['sessData'];
                    if($sssData!=''):
                      echo $sssData['status']['msg'];
                    ?>
                          <small style="margin: 0px; padding: 4px; font-size: 13px;" class="alert alert-success alert-dismissible fade in pull-right text-success"></small>
                    <?php endif; ?>
                  </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><a href="#">A</a></li>
                          <li><a href="#">B</a></li>
                          <li><a href="#">C</a></li>
                          <li><a href="#">D</a></li>
                          <li><a href="#">E</a></li>
                          <li>...</li>
                          <li><a href="#">W</a></li>
                          <li><a href="#">X</a></li>
                          <li><a href="#">Y</a></li>
                          <li><a href="#">Z</a></li>
                        </ul>
                      </div>

                      <div class="clearfix"></div>
<?php
$all = $db->getRows('ab_users', array('order_by'=>'fname asc', 'where'=>array('category_id'=>1))); if(!empty($all)): $count=0; foreach($all as $show): $count++;
 ?>
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Amani Business</i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $show['fname'].' '. $show['lname'] ?></h2>
                              <p><strong>Position: </strong> Administrateur </p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php echo $show['address'] ?> </li>
                                <li><i class="fa fa-phone"></i> Phone: <?php echo $show['phone'] ?> </li>
                                <li><i class="fa fa-building"></i> Email: <?php echo $show['email'] ?> </li>
                                <li><i class="fa fa-user"></i> Statut: <?php echo ($show['status']==1)?'Active':'Desactive'; ?> </li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/user.png" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?=$show['id']?>ezpk"> <i class="fa fa-pencil">
                              </i> <i class="fa ">Editer</i> </button>
                              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?=$show['id']?>ezpk">
                                <i class="fa fa-trash"> </i> Supprimmer
                              </button>

                              <div class="modal fade " id="delete<?=$show['id']?>ezpk" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                  <form method="post" action="class/userController.php">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                      <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                    </div>

                                        <div class="modal-body">
                                            <center>Voulez-vous supprimer cet Administrateur : <strong><?php echo $show['fname'].' '.$show['lname']; ?></strong> ? </center>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="ID" value="<?php echo $show['id']; ?>">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                          <button type="submit" name="delete" class="btn btn-primary">Supprimer</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                              <div class="modal fade " id="edit<?=$show['id']?>ezpk" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                  <form method="post" action="class/userController.php" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                      </button>
                                      <h4 class="modal-title" id="myModalLabel">Amami Business</h4>
                                    </div>

                                        <div class="modal-body">
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nom">Nom<span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                              <input type="text" id="first-name" required="required" value="<?php echo $show['fname'] ?>" name="fname" class="form-control col-md-9 col-xs-12">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Prenom">Prenom<span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                              <input type="text" id="last-name" required="required" value="<?php echo $show['lname'] ?>" name="lname" class="form-control col-md-9 col-xs-12">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                              <input id="middle-name" class="form-control col-md-9 col-xs-12" value="<?php echo $show['email'] ?>" type="email" name="email">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telephone</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                              <input id="middle-name" class="form-control col-md-9 col-xs-12" value="<?php echo $show['phone'] ?>" type="text" name="phone">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Addresse</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                              <input id="middle-name" class="form-control col-md-9 col-xs-12" value="<?php echo $show['address'] ?>" type="text" name="address">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <input type="hidden" name="category" value="1">
                                          <input type="hidden" name="ID" value="<?php echo $show['id']; ?>">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                          <button type="submit" name="update" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>

<?php endforeach; endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
