<?php
$DB=mysqli_connect("localhost","root","","demo");
if(isset($_POST["add_registration"])){

    $NAME=$_POST["name"];
    $PHONE=$_POST["phone"];
    $EMAIL=$_POST["email"];
    $GENDER=$_POST["gender"];
    $HOBBY=$_POST["hobb"];
    $new_hob=implode(",",$HOBBY);
    $CITY=$_POST["city"];
    $DOB=$_POST["DBO"];
    $ADDRESS=$_POST["address"];
    $IMG=$_FILES["img"]["name"];
     
    $TMP=$_FILES["img"]["tmp_name"];
    
    $PATH="images/".$IMG;
    
    $upload=move_uploaded_file($TMP,$PATH);
    
    $insert_data=mysqli_query($DB,"INSERT INTO addajax(full_name, phone, Email, Address, Gender, Hobby, ucity, date_birth, image)
     VALUES ('$NAME','$PHONE','$EMAIL','$ADDRESS','$GENDER','$new_hob','$CITY','$DOB','$IMG')");
    
     if($insert_data){
        echo "AJAX DATA INSERT INTO DB";
      //   header("location:ajaxShow.php");
    
     }else{
        echo "data not insert";
     }
    
    }   
    
   //  =========================delete code===================================

   if(isset($_REQUEST["del_ID"])){
      $de_id=$_REQUEST["del_ID"];
      // echo $de_id;
  
      $sele_img=mysqli_query($DB,"SELECT*FROM addajax WHERE ajax_id='$de_id'");
      $fetch_img=mysqli_fetch_array($sele_img);
      $getImg=$fetch_img["image"];
  
      $delete_qury=mysqli_query($DB,"DELETE FROM addajax WHERE ajax_id='$de_id'");
      if($delete_qury){
          unlink("images/".$getImg);
         //  header("location:ajaxShow.php");
          echo "data delete";
      }else{
          echo "data not delete";
  
      }
   }
// ================================================================edit code

if(isset($_POST["hidd_id"])){

   $hidd_id=$_POST["hidd_id"];

   $slectAjeax=mysqli_query($DB,"SELECT*FROM addajax WHERE ajax_id='$hidd_id'");
   $fetch_id= mysqli_fetch_array($slectAjeax);
   $img=$fetch_id["image"];
   

  
   // echo $hidd_id;
         $NAME=$_POST["name"];
       $PHONE=$_POST["phone"];
       $EMAIL=$_POST["email"];
       $GENDER=$_POST["gender"];
       $HOBBY=$_POST["hobb"];
       $new_hob=implode(",",$HOBBY);
       $CITY=$_POST["city"];
       $DOB=$_POST["DBO"];
       $ADDRESS=$_POST["address"];
       $IMG=$_FILES["img"]["name"];
             
       if(empty($IMG)){
           $upd_query=mysqli_query($DB,"UPDATE addajax SET full_name='$NAME',phone='$PHONE',Email='$EMAIL',
           Address='$ADDRESS',Gender='$GENDER',Hobby='$new_hob',ucity='$CITY',
           date_birth='$DOB' WHERE ajax_id='$hidd_id'");
           if($upd_query){
               echo "data update without image";
               //  header("location:ajaxShow.php");
               

           }else{
               

               echo "data not update without image";

           }
       }else
       {
           $TMP=$_FILES["img"]["tmp_name"];
           $PATH="images/".$IMG;
           $upload=move_uploaded_file($TMP,$PATH);
           $update_query=mysqli_query($DB,"UPDATE addajax SET full_name='$NAME',phone='$PHONE',Email='$EMAIL',
           Address='$ADDRESS',Gender='$GENDER',Hobby='$new_hob',ucity='$CITY',
           date_birth='$DOB',image='$IMG' WHERE ajax_id='$hidd_id'");
           if($update_query){
           unlink("images/".$img);
           echo "data update with image";
               
               // header("location:ajaxShow.php");
           }else{
               echo "data not update with image";

           }
       }


}



?>