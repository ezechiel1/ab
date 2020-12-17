<?php
	session_start();
	//load and initialize database class
	require_once '../core/db.php';
	$db = new DB();

	//set default redirect url
	$redirectURL = ''.$db->url;

	if(isset($_POST['register']))
	{
			$tblName='ab_users';

				$Data = array
				(
          'fname' => $_POST['fname'],
					'lname' => $_POST['lname'],
					'email' => $_POST['email'],
					'phone' => $_POST['phone'],
					'address' => $_POST['address'],
					'category_id' => $_POST['category'],
					'password' => $_POST['fname'].'@2020',
					'added_by'=> $_SESSION['ID'],
					'status'=>1,
					'profile'=>'images/user.png',
					'c_date' => $db->showDate('datetime')
				 );
				$insert = $db ->insert($tblName, $Data);
				if($insert)
				{
								$sessData['status']['type'] = 'success';
          			$sessData['status']['msg'] = 'New Member\'s Account has been registered successfuly!';
								//set redirect url
								if($_POST['category']==1):
								$redirectURL .= '../execute.php?request=list_admin';
								elseif($_POST['category']==2):
								$redirectURL .= '../execute.php?request=list_gerant';
								elseif($_POST['category']==3):
								$redirectURL .= '../execute.php?request=list_employee';
								endif;
				}
				else{
								$sessData['status']['type']='error';
								$sessData['status']['msg']='Some errors occured. Please try again later!';
								//set redirect url
								if($_POST['category']==1):
								$redirectURL .= '../execute.php?request=new_admin';
								elseif($_POST['category']==2):
								$redirectURL .= '../execute.php?request=new_gerant';
								elseif($_POST['category']==3):
								$redirectURL .= '../execute.php?request=new_employee';
								endif;
				}

}
// update
if(isset($_POST['update']))
{
    //check if the form is not empty
     $tblName = 'ab_users';
            //insert data
            $Data = array
            (
							'fname' => $_POST['fname'],
							'lname' => $_POST['lname'],
							'email' => $_POST['email'],
							'phone' => $_POST['phone'],
							'address' => $_POST['address'],
							'status' => 1
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
						$redirectURL .= '../execute.php?request=list_admin&st=nodb';
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
