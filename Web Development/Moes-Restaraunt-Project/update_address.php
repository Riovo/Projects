<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

if(isset($_POST['submit'])){

   $address = sha1($_POST['HouseNum'].' '.$_POST['AddressLine1'].', '.$_POST['AddressLine2'].', '.$_POST['City'] .', '. $_POST['Town'] .', '. $_POST['County']. ' - '. $_POST['Eircode']);
   $address = filter_var($address, FILTER_SANITIZE_STRING);

   $update_address = $conn->prepare("UPDATE `users` set address = ? WHERE id = ?");
   $update_address->execute([$address, $user_id]);

   $message[] = 'Your address has been saved!';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update address</title>

   <link rel="icon" href="/images/Logo.ico">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php' ?>

<section class="form-container">

   <form action="" method="post">
      <h3>Enter Your Address</h3>
      <input type="text" class="box" placeholder="House Number" required maxlength="50" name="HouseNum">
      <input type="text" class="box" placeholder="Address Line 1" required maxlength="50" name="AddressLine1">
      <input type="text" class="box" placeholder="Address Line 2 (optional)" maxlength="50" name="AddressLine2">
      <input type="text" class="box" placeholder="City" required maxlength="50" name="City">
      <input type="text" class="box" placeholder="Town" required maxlength="50" name="Town">
      <input type="text" class="box" placeholder="County (if applicable)" maxlength="50" name="County">
      <input type="text" class="box" placeholder="Eircode" required maxlength= "8" name="Eircode">
      <input type="submit" value="save address" name="submit" class="btn">
   </form>

</section>




<?php include 'components/footer.php' ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>