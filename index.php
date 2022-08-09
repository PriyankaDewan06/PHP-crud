<?php
include 'class.php';

$classObj = new Exam;

if(isset($_POST['submit'])){
     
     $name = $_POST["name"];
     $email = $_POST["email"];
     $department = $_POST["department"];
     $phone=$_POST["phone"];
     $gender = $_POST["gender"];
     
 
 if(empty($name)){
     echo '<span class="alert alert-danger"> Name is Empty </span>';
 }elseif(empty($email)){
    echo '<span class="alert alert-danger"> Email is Empty </span>';
 }
 elseif(empty($department)){
     echo '<span class="alert alert-danger"> Department is Empty </span>';
  }elseif(empty($phone)){
         echo '<span class="alert alert-danger"> Contact number is Empty </span>';
  
 }else{
     echo $mgs= $classObj->insert($_POST);
 }
   
}

// ----------delete user--------------
if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $classObj->delete($id);
}

//---------edit user------------------------

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $classObj->edit($_GET,$id);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
        

            <div class="row pt-4">
                
                <div class="col-md-6 offset-md-3 bg-info border rounded border-info">
                        <h3 class="col-md-6 offset-md-3 pt-2" >STUDENT INFORMATION</h3>
                    <form  method="POST">
                        <div class="form-group pt-2 ">
                            <h6>Name</h6>
                            <input type="text" name="name" class="form-control" id=""  placeholder="Enter Your Full Name">
                        </div>
                        <div class="form-group">
                            <h6 >Email address</h6>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                            <h6 >Department</h6>
                            <select name="department" id="" class="form-control">
                                <option value="1">--- Select Your Department---</option>
                                <option value="CSE">CSE</option>
                                <option value="EEE">EEE</option>
                                <option value="Civil">Civil</option>
                                <option value="English">English</option>
                                <option value="AERONAUTICAL">AERONAUTICAL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h6 >Gender</h6>
                            <input type="radio" name="gender" id="gender" value="Male" checked required>Male</input>
                            <input type="radio" name="gender" id="gender" value="Female" required>Female</input>
                        </div>
                        <div class="form-group">

                            <h6 >Phone</h6>
                            <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Contact number">
                        </div>
                       <div class="pb-3"> <button type="submit" name="submit" class="btn btn-success offset-md-5">Submit</button>  </div>
                    </form>
                </div>

            </div>


    <div class="row pt-3 d-flex">
        <div class="col-md-8 offset-md-2">
            <table class="table table-success"  id="myTable">
                <thead>
                    <tr>
                        <th>sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>Phone</th> 
                        <th>Action</th> 
                         
                    </tr>
                </thead>
                <tbody>
                    <?php 
                            $showResult =  $classObj->show();
                            $sl = 1;
                            while($data =$showResult->fetch_assoc()){

                            echo'<tr>
                            <td>'.$sl.'</td>
                            <td>'.$data["name"].'</td>
                            <td>'.$data["email"].'</td>
                            <td>'.$data["department"].'</td>
                            <td>'.$data["gender"].'</td>
                            <td>'.$data["phone"].'</td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit'.$data["student_id"].'"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete'.$data["student_id"].'" ><i class="fa-solid fa-trash-can"></i></button>
                            
                            </td>';
                            
                        ?>


                            <!-- Modal delete -->
                            <div class="modal fade" id="delete<?php echo $data['student_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure To Delete?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form method="GET">
                                                <button type="submit" name="delete"class="btn btn-danger" value="<?php echo $data['student_id'];?>">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <!-- Modal edit -->
                        <div class="modal fade" id="edit<?php echo $data['student_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Update User Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="GET">
                                    <div class="modal-body">

                                        <div class="form-group pt-2">
                                            <label >User Name</label>
                                            <input type="text" name="name" class="form-control" id=""  placeholder="Enter Name" value="<?php echo $data['name'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label >Email address</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $data['email'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label >Department</label>
                                            <select name="department" id="" class="form-control">
                                                <option value="CSE" 
                                                <?php
                                                    if($data['department']=='CSE'){
                                                        echo 'selected';
                                                    }
                                                ?>
                                                
                                                >CSE</option>
                                                <option value="ENGLISH"
                                                <?php
                                                    if($data['department']=='EEE'){
                                                        echo 'selected';
                                                    }
                                                ?>
                                                
                                                
                                                >ENGLISH</option>
                                                <option value="MATH"
                                                <?php
                                                    if($data['department']=='Civil'){
                                                        echo 'selected';
                                                    }
                                                ?>
                                                
                                                >MATH</option>
                                                <option value="English"
                                                <?php
                                                    if($data['department']=='English'){
                                                        echo 'selected';
                                                    }
                                                ?>
                                                
                                                >SOFTWARE</option>
                                                <option value="AERONAUTICAL"
                                                <?php
                                                    if($data['department']=='AERONAUTICAL'){
                                                        echo 'selected';
                                                    }
                                                ?>
                                                
                                                
                                                >AERONAUTICAL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Gender</label>
                                            <input type="radio" name="gender" id="gender" value="Male"
                                            <?php
                                                    if($data['gender']=='Male'){
                                                        echo 'checked';
                                                    }
                                            ?>
                                            
                                            >male</input>
                                            <input type="radio" name="gender" id="gender" value="Female"
                                            <?php
                                                    if($data['gender']=='Female'){
                                                        echo 'checked';
                                                    }
                                            ?>
                                            
                                            >female</input>
                                        </div>

                                        <div class="form-group">

                                            <label >Phone</label>
                                            <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Contact number" value="<?php echo $data['phone'];?>">
                                        </div>
                                        

                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    
                                        <button type="submit" name="edit"class="btn btn-danger" value="<?php echo $data['student_id'];?>">Update</button>
                                    </div>
                                </form>
                            </div>
                             
                        </div>
                            

                            <?php
                            $sl++;
                        }?>
                </tbody>
            </table>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        jQuery(document).ready( function () {
            jQuery('#myTable').DataTable();
        } );
    </script>
</body>
</html>