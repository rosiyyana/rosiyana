<?php 

include("koneksi.php");
$db = new dbObj();
$connection = $db->getConnstring();
$request_method= $_SERVER ["REQUEST_METHOD"];

switch ($request_method)
{
  case 'GET':
//Retrive Products
    if(!empty($_GET["id"]))
    {
      $id=intval($_GET["id"]);
      get_employeesid($id);
    }
    else {
      get_employees();
    }
    break;

  default:
//Invalid Request Method
    header("HTTP/1.0 405 Method Not Allowed");
    break;
    case 'POST':
      insert_employee();
      break;
      case 'PUT':
      if (!empty($_GET["id"])) {
        $id=intval($_GET["id"]);
        update_employee($id);
      }

        break;
        case 'DELETE':
        if (!empty($_GET["id"])) {
          $id=intval($_GET["id"]);
          delete_employee($id);
          break;
        }

}
function get_employees(){
  global $connection;
  $query = "SELECT * FROM `tb_employee`";
  $response = array();

  $result = mysqli_query($connection,$query);

  while ($row=mysqli_fetch_array($result)) {
    $response[]=$row;
  }
  header('Content-Type:application/json');
  echo json_encode($response);
}


function get_employeesid($id=0){
  global $connection;
  $query = "SELECT * FROM `tb_employee`";

  if ($id !=0) {
    $query.="WHERE id=".$id." LIMIT 1 ";
  }
  $response = array();

  $result = mysqli_query($connection,$query);

  while ($row=mysqli_fetch_array($result)) {
    $response[]=$row;
  }
  header('Content-Type:application/json');
  echo json_encode($response);
}

function insert_employee(){
  global $connection;
  $data = json_decode(file_get_contents('php://input'), true);
  $employee_name = $data["employee_name"];
  $employee_salary = $data["employee_salary"];
  $employee_age = $data["employee_age"];
  echo $query = "INSERT INTO tb_employee SET
  employee_name='".$employee_name."',
  employee_salary='".$employee_salary."',
  employee_age='".$employee_age."'";
  if (mysqli_query($connection, $query)) {
    $response=array(
      'status' => 0,
      'status_message' => 'Employee Addition Failed.'
            );
    $response=array(
      'status' => 1,
      'status_message' => 'Employee Added Successfully.'
    );
  }
    header('Content-Type: application/json');
    echo json_encode($response);
  }

function update_employee($id){
  global $connection;

  $post_vars = json_decode(file_get_contents("php://input"), true);
  $employee_name = $post_vars["employee_name"];
  $employee_salary = $post_vars["employee_salary"];
  $employee_age = $post_vars["employee_age"];
  $query = "UPDATE tb_employee SET
  employee_name='".$employee_name."',
  employee_salary='".$employee_salary."',
  employee_age='".$employee_age."' WHERE id=".$id;
  if (mysqli_query($connection, $query)) {
    $response=array(
      'status' => 0,
      'status_message' => 'Employee Updation Failed.'
            );
    $response=array(
      'status' => 1,
      'status_message' => 'Employee Updated Successfully.'
    );
  }
header('Content-Type: application/json');
echo json_encode($response);
}

function delete_employee($id){
  global $connection;
  $query = "DELETE FROM `tb_employee` WHERE id=".$id;
  if (mysqli_query($connection, $query)) {
    $response=array(
      'status' => 0,
      'status_message' => 'Employee Deletion Failed.'
            );
    $response=array(
      'status' => 1,
      'status_message' => 'Employee Deleted Successfully.'
    );
  }
header('Content-Type: application/json');
echo json_encode($response);
}

?>