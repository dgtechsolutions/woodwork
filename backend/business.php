<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  if(empty($_POST["product_category"])){
    $prodCat == "NULL";
  }
  else{
    $prodCat = $_POST["product_category"];
  }
  if(empty($_POST["product_subcategory"])){
    $prodSubCat = "NULL";
  }
  else{
    $prodSubCat = $_POST["product_subcategory"];
  }
  if(empty($_POST["product_subsubcategory"])){
    $prodSubSubCat = "NULL";
  }
  else{
    $prodSubSubCat = $_POST["product_subsubcategory"];
  }
  if(empty($_POST["product_name"])){
    $prodName = "NULL";
  }
  else{
    $prodName = $_POST["product_name"];
  }
  if(empty($_POST["product_code"])){
    $prodCode = "NULL";
  }
  else{
    $prodCode = $_POST["product_code"];
  }
}

$from = "agoen97@gmail.com";
$to = $email;
$subject = "Business Enquiry - Aadhunik Woodworking Machinery";
$subject_admin = "Enquiry regarding $prodCode";
$body_admin = "Dear  Team,\n\n

You have a Business Enquiry request from $name regarding the following details:\n
Product Category: $prodCat\n
Product Subcategory: $prodSubCat\n
Product Subsubcategory: $prodSubSubCat\n
Product Name: $prodName\n
Product Code: $prodCode\n \n

The request is made from: \n
Name: $name\n
Phone: $phone\n
Email: $email\n
\n
Please respond to $name as soon as possible. \n
Regards,\n
System";
$body = "Dear $name,\n
\n
Thank you for enquiring about $prodName : $prodCode . Our Team will be in contact with you as soon as possible.\n
Thanking You,\n
Regards,\n
Team Aadhunik.";
$headers = "From: agoen97@gmail.com";
$headers_admin = "From: agoen97@gmail.com";

if(mail($to, $subject, $body, $headers)){
  if(mail($from, $subject_admin, $body_admin, $headers_admin)){
    echo json_encode(array('status' => 'Success'), TRUE);
  }
}
else{
  echo json_encode(array('status' => 'Fail'), TRUE);
}

?>
