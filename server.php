<?php
session_start();
unset($_SESSION['errac']);
// initializing variables
$name="";
$contact_no="";
$address="";
$photo="";
$password="";
$username = "";
$pincode = "";
$email_id = "";
$service="";
$area="";
$dept_id="";
$emp_id="";
$errors = array(); 
$result="";
$current_status="1";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'employee');
$db2 = mysqli_connect('localhost', 'root', '', 'customer');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  $name = mysqli_real_escape_string($db, $_POST['name']);
//var_dump ($name) ;
  $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
 // $photo = mysqli_real_escape_string($db, $_POST['photo']);
   $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $service=mysqli_real_escape_string($db, $_POST['service']);
  $area=mysqli_real_escape_string($db, $_POST['area']);
  $exp = mysqli_real_escape_string($db, $_POST['exp']); 

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($contact_no)) { array_push($errors, "contact_no is required");}
  if (empty($address)) { array_push($errors, "address is required"); }
 // if (empty($photo)) { array_push($errors, "photo is required"); }
  if (empty($email_id)) { array_push($errors, "email id is required"); }
  if (empty($username)) { array_push($errors, "username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
if (empty($pincode)) { array_push($errors, "Pincode is required"); }
  if (empty($service)) { array_push($errors, "service is required"); }
  if (empty($area)) { array_push($errors, "area  is required"); }
  if (empty($exp)) { array_push($errors, "exp  is required"); }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  
  $user_check_query ="SELECT * FROM employee WHERE username='$username' OR email='$email_id' LIMIT 1";
  $id_add="SELECT * FROM employee order by empid desc limit 0,1";
  $result_id=  mysqli_query($db,$id_add);

  while($ids=mysqli_fetch_array($result_id))
  {
$emp_id=$ids['empid']+1;




  }

  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email_id'] === $email_id) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  $password = md5($password);//encrypt the password before saving in the database
    $current_status="0";

    $dept_id= $service;
    
   
    $salary=$exp*1000;

    $image = addslashes($_FILES['photo']['tmp_name']);
  $image = file_get_contents($image);
  $image = base64_encode($image);   
   
  	$query = 
    "INSERT INTO `employee`(`name`, `contact no`, `exp`, `deptid`, `empid`, `address`, `photo`, `salary`, `current_status`, `email`, `username`, `password`) VALUES ('$name','$contact_no','$exp','$dept_id','$emp_id','$address','$image','$salary','$current_status','$email_id','$username','$password')";

    $dept_name_query="SELECT * from department where deptid='$deptid'";
    $dept_name_result=mysqli_query($db2,$dept_name_query);

    while($row_query=mysqli_fetch_array($dept_name_result))
    {
      $_SESSION['dept_name']=$row_query['deptname'];


    }


//if (mysqli_query($db, $query)) {
  //  echo "New record created successfully";
//} else {
  //  echo "Error: " . $query . "<br>" . mysqli_error($db);
//}


  	$result1=mysqli_query($db, $query);
    //echo "$result1";
    if($result1)
    {
    
      
       


          $_SESSION['username2'] = $username;
          $_SESSION['success'] = "You are now logged in";


            //entry into areas table  
           $query2="INSERT into area (empid, deptid, AREA,pincode) values (\"$emp_id\",\"$dept_id\",\"$area\",\"$pincode\")";

           $result3=mysqli_query($db, $query2);
    
            $new_customer="SELECT * from customer where SERVICEABLE='0' and PINCODE='$pincode'";

            $result_new =mysqli_query($db2,$new_customer);

            if(mysqli_num_rows($result_new)>0)
            {
              while($rows=mysqli_fetch_array($result))
             { $_SESSION['cus_emailid']=$rows['EMAIL'];
              $_SESSION['cus_name']=$rows['NAME'];

              $update_query="UPDATE customer SET SERVICEABLE='1' WHERE pincode='$pincode' ";

              $update_col=mysqli_query($db,$update_query);

              require_once("areas_mailer.php");
            }
            }




          header('location: login_employee.php');
    }
  	else
    {
      echo "Error: " . $query . "<br>" . mysqli_error($db);
    }
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
    $query2 = "SELECT * FROM employee WHERE username=\"$username\"";
  	$result2= mysqli_query($db, $query2);
   
    
    
  	
    if (mysqli_num_rows($result2)>0) {
       $row1=mysqli_fetch_assoc($result2);
      if(($row1["password"])==$password){
       $_SESSION['username2'] = $username;
      $_SESSION['success'] = "You are now logged in";

      header('location:employee_dashboard.php');
    }
  	else{
        array_push($errors, "Wrong password");
        
      //header('location: login.php');
    }
  	}
    else {
      //$number=mysqli_num_rows($row);
       // echo $number;
        //die();
  		array_push($errors, "invalid username");
  	}
  }
}

?>