<?php include 'views/header.php'; ?>

<?php
if(!isset($_GET['request'])) $_GET['request']='';
switch ($_GET['request']) {
  case 'dashboard':
    include 'views/dashboard.php';
    break;
  case 'new_admin':
    include 'views/new_admin.php';
    break;
  case 'list_admin':
    include 'views/list_admin.php';
    break;
  case 'new_gerant':
    include 'views/new_gerant.php';
    break;
  case 'list_gerant':
    include 'views/list_gerant.php';
    break;
  case 'new_employee':
    include 'views/new_employee.php';
    break;
  case 'list_employee':
    include 'views/list_employee.php';
    break;
  case 'new_achat':
    include 'views/new_achat.php';
    break;
  case 'list_achat':
    include 'views/list_achat.php';
    break;
  case 'new_vente':
    include 'views/list_products.php';
    break;
  case 'list_vente':
    include 'views/list_vente.php';
    break;
  case 'available_stock':
    include 'views/available_stock.php';
    break;
  case 'finished_stock':
    include 'views/finished_stock.php';
    break;

  default:
    include 'views/dashboard.php';
    break;
}
?>

<?php include 'views/footer.php'; ?>
