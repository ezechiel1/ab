<?php
	session_start();
	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = ''.$db->url;

	if(isset($_POST['register']))
	{
		$allP=$db->getRows('ab_products',array('where'=>array('id'=>$_POST['ID'])));
		if(!empty($allP)): foreach($allP as $show):
			$rQTY=$show['quantity']-$_POST['quantity_vente'];

			if($_POST['quantity_vente']<=0):
				$sessData['status']['type'] = 'error';
				$sessData['status']['msg'] = 'Impossible \'effectuer cette vente. la quantite doit etre superieure a 0!';
				//set redirect url
				$redirectURL .= '../execute.php?request=new_vente&st=qt_vt';
			elseif($_POST['quantity_vente']>$show['quantity']):
				$sessData['status']['type'] = 'error';
				$sessData['status']['msg'] = 'Impossible d\'effectuer cette vente. la quantite est superieure a celle disponible en stock!';
				//set redirect url
				$redirectURL .= '../execute.php?request=new_vente&st=qt_dp';
			else:
			  $tblName='ab_ventes';
				$pvt=$_POST['quantity_vente']*$_POST['pvu'];
				$Data = array
				(
          'product_id' => $_POST['ID'],
					'quantity_vente' => $_POST['quantity_vente'],
					'pvu' => $_POST['pvu'],
					'pvt' => $pvt,
					'added_by'=> $_SESSION['ID'],
					'c_date' => $db->showDate('datetime')
				 );
				$insert = $db->insert($tblName, $Data);
				if($insert)
				{
								  $tblName='ab_products';
									if($rQTY==0):
											$Data = array('quantity' => $rQTY, 'status'=>0);
									else:
											$Data = array('quantity' => $rQTY);
									endif;
									$Condition=array('id'=>$_POST['ID']);

										$update = $db ->update($tblName, $Data, $Condition);
										if($update):
												$sessData['status']['type'] = 'success';
				          			$sessData['status']['msg'] = 'La Vente a ete enregistree correctement!';
												//set redirect url
												$redirectURL .= '../execute.php?request=list_vente';
									 else:
											 $sessData['status']['type'] = 'error';
											 $sessData['status']['msg'] = 'Il y a une erreur!';
											 //set redirect url
											 $redirectURL .= '../execute.php?request=new_vente&st=prod';
									 endif;
				}
				else{
								$sessData['status']['type']='error';
								$sessData['status']['msg']='Il y a une erreur. Essayez encore!';
								//set redirect url
								$redirectURL .= '../execute.php?request=new_vente&st=vente'.$_POST['pvt'];
				}

			endif;
			endforeach;
		endif;
}
// update
if(isset($_POST['update']))
{
    //check if the form is not empty
     $tblName = 'ab_products';
            //insert data
            $Data = array
            (
							'category_id' => $_POST['category'],
							'name' => $_POST['name'],
							'model' => $_POST['model'],
							'unity' => $_POST['unity'],
							'quantity' => $_POST['quantity'],
							'pau' => $_POST['pau'],
							'pat' => $_POST['pat'],
							'pvu' => $_POST['pvu'],
							'stock_no'=> $_POST['stock_no'],
            );

            $condition=array('id' => $_POST['ID'], );
            $update = $db->update($tblName, $Data,$condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Modification has been saved successfuly!';
            }
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some errors occured. Please try again later!';
            }
						//set redirect url
						if($_POST['category']==1):
						$redirectURL .= '../execute.php?request=list_admin';
						elseif($_POST['category']==2):
						$redirectURL .= '../execute.php?request=list_gerant';
						elseif($_POST['category']==3):
						$redirectURL .= '../execute.php?request=list_employee';
						endif;

}
// delete
if(isset($_POST["delete"]) )

{
            $tblName='ab_users';
            $Condition = array('id'=> $_POST['ID']);
            $delete = $db->delete($tblName,$Condition);
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Administrator\'s Account has been deleted successfuly!';
            }
						//Set redirect url
            else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some errors occured. Please try again later!';
            }
						if($_POST['category']==1):
						$redirectURL .= '../execute.php?request=list_admin';
						elseif($_POST['category']==2):
						$redirectURL .= '../execute.php?request=list_gerant';
						elseif($_POST['category']==3):
						$redirectURL .= '../execute.php?request=list_employee';
						endif;
}


//store status into the session
$_SESSION['sessData'] = $sessData;

//redirect to the list page
header("Location:".$redirectURL);

?>
