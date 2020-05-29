<?php
session_start();
error_reporting(0);
include('database.php');
if(isset($_POST['submit'])){
 extract($_POST);
 $query=mysqli_query($conn,"SELECT * FROM contacts WHERE name='$search' ");
  $n1=mysqli_fetch_assoc($query);
 $_SESSION['search']=$n1;
 }
?>

<!DOCTYPE html>
<html>
<head>
  <title>search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color: #00e6e6">
<h3 class="center" style="background-color:yellow">Search phone</h3>
<div class="container">
  <div id="accordion">
    <div class="card">
      <div class="card-header">
        <a class="card-link" data-toggle="collapse" href="#collapseOne">
          search
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
           <!------ --->
 <div class="search-container">
     <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
      <input type="text" placeholder="Enter full name" name="search">
       <button class="btn btn-success" type="submit" name="submit">Submit</button>
    </form>
 </div>
        </div>
      </div>
    </div>
<div class="card">
    <div class="card-header">
      <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
       
         <td><i class="fa fa-plus" name="add" id="add" style="font-size:28px"></i></td>  
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
       <button type="button"  class="btn btn-dark">
<a href="index.php">
    Add contact
</a>
</button>
      </div>
    </div>
  </div>

  </div>
</div>
<br><br><br>
<?php
if(isset($_POST['submit'])){
?>
<div class="container">
<div class="card">
<table class="table">
<tr>
<td>Name:</td>
<td>DOB:</td>
<td>Mobile:</td>
<td>Email:</td>
</tr>
<tr>
<td> <?php echo $n1['name']; ?> </td>
<td> <?php echo $n1['DOB']; ?> </td>
<td> <?php echo $n1['mobile']; ?> </td>
<td> <?php echo $n1['Email']; ?> </td>
</tr>
</table>
</div>
<button type="button"  class="btn btn-dark">
<a href="update_phone.php">
    Update
</a>
</button>
</div>
<?php
}
?>


</body>
</html>
