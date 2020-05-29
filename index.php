<?php
error_reporting(0);
include("database.php");
session_start();
if(isset($_POST['submit'])){
  extract($_POST);
  $phone=implode(",",$mobile);//implode function is used to coonect all value of dynamic function
  $gmail=implode(",",$email);
  $insert_query=mysqli_query($conn,"INSERT INTO contacts(name,DOB,mobile,Email) VALUES('$name','$data','$phone','$gmail')"); 
  echo "insert successful";
}
else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADD_phone</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>  
</head>
<body style="background-color: #00e6e6">
  <h3 style="background-color:yellow">Phone Number Book</h3>
<div class="jumbotron col-sm-8">
 
<div class="container">
  <div class="row">
  <div class="col-sm-6">
  <div class="card">
    <div class="card-header">
          <h5>Add new contact</h5>
    </div>
    <div class="card-body">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="name" placeholder="Name" required>
    </div>
    <div class="form-group">
      <label for="usrr">DOB</label>
      <input type="date" class="form-control" id="usrr" name="data" required>
    </div>
    
    <div class="table-responsive">  
       <label>Mobile Number</label>
                 
                 <div class="form-group">  
                          <div class="table-responsive">  
                             <!----------------->  
                               <table id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="mobile[]" placeholder="Enter your Number" class="name_list"></td>  
                                      
                                          <td><i class="fa fa-plus" name="add" id="add" style="font-size:28px"></i></td>  
                                    </tr>  
                               </table>  
                              <!----------------->  
                          </div>  
           
                </div>  
    </div>

    <div class="table-responsive">  
       <label>Email</label>
                 <div class="form-group">  
                          <div class="table-responsive">  
                             <!----------------->  
                               <table  id="dynamic_call">  
                                    <tr>  
                                       <td><input type="text" name="email[]" placeholder="Enter your Email" class="name_call" ></td>
                                          <td><i class="fa fa-plus" name="call" id="call" style="font-size:28px"></i></td>
                                    </tr>  
                               </table>  
                             <!----------------->  
                          </div>  
                </div>  
    </div>
    <button type="submit" name="submit" class="btn btn-success">Save</button>
 </form>
    </div> 
    </div>
    </div>
</div>
</div> 
<a href="search_phone.php">contact search</a>
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'">   <td><input type="text" name="mobile[]" placeholder="Enter your  Number" class="name_list" /></td><td><button type="button" name="remove" id_1="'+i+'" class="btn btn-danger btn_remove">X</button></td>   </tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id_1");   
           $('#row'+button_id+'').remove();  
      }); 

//////////////////////////////////////////////////////////
      var j=1;  
       $('#call').click(function(){  
           j++;  
           $('#dynamic_call').append('<tr id="call'+j+'">   <td><input type="text" name="email[]" placeholder="Enter your Email" class="name_call" /></td><td><button type="button" name="remove" id_2="'+j+'" class="btn btn-danger btn_delete">X</button></td>  </tr>');  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var button_call = $(this).attr("id_2");   
           $('#call'+button_call+'').remove();  
      });  
 }); 
 
 </script>

</body>
</html>
