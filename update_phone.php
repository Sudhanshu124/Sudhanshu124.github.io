<?php
session_start();
error_reporting(0);
include("database.php");
$ser =$_SESSION['search'];
$t=$ser['name'];
//echo $t;
  //extract($_POST);
  $query=mysqli_query($conn,"SELECT * FROM contacts where name='$t' ");
  $n1=mysqli_fetch_assoc($query);
  $mobile=$ser['mobile'];
  $email=$ser['Email'];
  $phone=explode(",",$mobile);
  $gmail=explode(",",$email);
  //print_r($phone);
  //print_r($gmail);
  $num_email=count($gmail);
  $num_phone=count($phone);
  //echo $num_phone;
  //print_r(explode(" ",$n1[$mobile]));
?>


<!-- UPDATE DATABASE    -->
<?php
if(isset($_POST['update'])){
  extract($_POST);
  $phone=implode(",",$mobile);
  $gmail=implode(",",$email);
  $Update_query=mysqli_query($conn,"UPDATE contacts set  DOB='$Date',mobile='$phone',Email='$gmail' where name='$t' ");
  echo "update successful";
}
else{

}
?>

<!--  DELETE DATABASE  -->

<?php
 if(isset($_POST['delete'])){
  $query=mysqli_query($conn,"DELETE from contacts where name='$t' ");
  if($query)
      {
          $msg2="Delete successfully";
      }
      else
      {
        echo mysqli_error($conn);
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
  <h3 style="background-color:yellow">UPDATE Number Book</h3>
<div class="jumbotron col-sm-8">
 
<div class="container">
  <div class="row">
  <div class="col-sm-6">
  <div class="card">
    <div class="card-header">
          <h5>Edit contact</h5>
    </div>
    <div class="card-body">
<form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr" name="Name" value="<?php echo $n1['name']; ?>" >
    </div>
    <div class="form-group">
      <label for="usrr">DOB</label>
      <input type="date" class="form-control" id="usrr" name="Date"  value="<?php echo $n1['DOB']; ?>" >
    </div>
    
    <div class="table-responsive">  
       <label>Mobile Number</label>
                 
                 <div class="form-group">  
                  <!--    <form name="add_name" id="add_name"> --> <!--  add_name  id correction --> 
                          <div class="table-responsive">  
                             <!----------------->  
                               <table id="dynamic_field">  
                                    <tr>  
                         <td><input type="text" name="name[]" placeholder="Enter your Number" class="name_list"></td>  
                                      
                                          <td><i class="fa fa-plus" name="add" id="add" style="font-size:28px"></i></td>  
                                    </tr>  
                               </table>  
                              <!----------------->  
                          </div>  
            <!--       </form>  -->
                </div>  
    </div>

    <div class="table-responsive">  
       <label>Email</label>
                 <div class="form-group">  
               <!--      <form name="add_name" id="add_name">--> <!--  add_name id correction --> 
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
             <!--        </form> --> 
                </div>  
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
     <button type="submit" name="delete" class="btn btn-danger">Delete</button>
 </form>
    </div> 
    </div>
    </div>
</div>
</div>
 
 <script>
 var count_email = '<?php echo $num_email; ?>';
 var count_phone = '<?php echo $num_phone; ?>';
 //console.log(count_phone);
 var _email = '<?php echo $email; ?>';
 //console.log(_email);
 var _phone = '<?php echo $mobile; ?>';
 //console.log(_phone);
 var email_arr = _email.split(",");
 //console.log(email_arr);
 var phone_arr = _phone.split(",");
 //console.log(phone_arr);

 
  $(document).ready(function(){
  for(i=0;i<count_phone;i++){
    $('#dynamic_field').append('<tr id="row'+i+'">   <td><input type="text" name="mobile[]" placeholder="'+phone_arr[i]+'" class="name_list" /></td><td><button type="button" name="remove" id_1="'+i+'" class="btn btn-danger btn_remove">X</button></td>   </tr>'); 
  }  
    for(i=0;i<count_email;i++){
  $('#dynamic_call').append('<tr id="call'+j+'">   <td><input type="text" name="email[]" placeholder="'+email_arr[i]+'" class="name_call" /></td><td><button type="button" name="remove" id_2="'+j+'" class="btn btn-danger btn_delete">X</button></td>  </tr>');  
}
  //////////////////////////////////
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
