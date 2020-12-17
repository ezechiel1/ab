<?php
	session_start();
	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = ''.$db->url;

	if(isset($_POST['register']))
	{
			$tblName='ab_products';

			$pat=$_POST['pau']*$_POST['quantity'];
				$Data = array
				(
          'category_id' => $_POST['category'],
					'name' => $_POST['name'],
					'model' => $_POST['model'],
					'unity' => $_POST['unity'],
					'quantity' => $_POST['quantity'],
					'pau' => $_POST['pau'],
					'pat' => $pat,
					'pvu_min' => $_POST['pvu_min'],
					'pvu_max' => $_POST['pvu_max'],
					'stock_no'=> $_POST['stock_no'],
					'status'=>1,
					'added_by'=> $_SESSION['ID'],
					'c_date' => $db->showDate('datetime')
				 );
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
							$tblName='ab_achats';
								$Data = array
								(
									'product_id' => $db->getLastID('ab_products','id'),
									'quantity_achat' => $_POST['quantity'],
									'pau' => $_POST['pau'],
									'pat' => $pat,
									'added_by'=> $_SESSION['ID'],
									'c_date' => $db->showDate('datetime')
								 );
								$insert = $db ->insert($tblName, $Data);
								if($insert):
										$sessData['status']['type'] = 'success';
		          			$sessData['status']['msg'] = 'L\' Achat a ete enregistre correctement!';
										//set redirect url
										$redirectURL .= '../execute.php?request=list_achat';
							 else:
									 $sessData['status']['type'] = 'error';
									 $sessData['status']['msg'] = 'Il y a une erreur!';
									 //set redirect url
									 $redirectURL .= '../execute.php?request=new_achat';
							 endif;
				}
				else{
								$sessData['status']['type']='error';
								$sessData['status']['msg']='Il y a une erreur. Essayez encore!';
								//set redirect url
								$redirectURL .= '../execute.php?request=new_achat';
				}

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
