<?php
$DB=mysqli_connect("localhost","root","","demo");
$edit=$_REQUEST["edit_id"];
    // echo $edit;
$slectAjeax=mysqli_query($DB,"SELECT*FROM addajax WHERE ajax_id='$edit'");
$fetch_id= mysqli_fetch_array($slectAjeax);
$old_hob=$fetch_id["Hobby"];
$hob=explode(",",$old_hob);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Ajax Edit Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Ajax Edit Form</h1>
   <a href="ajaxShow.php" class="btn btn-primary"><span class="title">View Data</span></a>

    <form  class="form-control" method="post" enctype="multipart/form-data" id="editform">
        <table>
            <tr>
                <td> FULL NAME :</td>
                <td> <input type="text" name="name" placeholder="Enter Your Name" class="form-control" 
                required value="<?php echo $fetch_id["full_name"] ?>"></td>
            </tr>
            <tr>
                <td> PHONE NO. : </td>
                <td><input type="text" name="phone" placeholder="Enter Your Phone No" class="form-control"
                 required value="<?php echo $fetch_id["phone"] ?>"></td>
            </tr>
            <tr>
                <td> EMAIL ADDRESS : </td>
                <td> <input type="email" name="email" placeholder="Enter Your Email Address" class="form-control" 
                required value="<?php echo $fetch_id["Email"] ?>"></td>
            </tr>
            <tr>
                <td> DATE OF BIRTH : </td>
                <td> <input type="date" name="DBO" placeholder="Enter Your DATE OF BIRTHs" class="form-control" 
                value="<?php echo $fetch_id["date_birth"] ?>" required></td>
            </tr>
            <tr>
                <td> ADDRESS : </td>
                <td> <textarea name="address"  placeholder="Enter Your Address" required class="form-control" required><?php echo $fetch_id["Address"] ?>
                </textarea></td>
            </tr>
            <tr>
                <td> GENDER:</td>
                <td class="form-control">
                             MALE <input type="radio" name="gender" value="male"<?php if($fetch_id["Gender"]=='male'){echo "checked";}  ?>>
                 &nbsp;&nbsp; FEMALE<input type="radio" name="gender" value="female"<?php if($fetch_id["Gender"]=='female'){echo "checked";} ?>></td>
            </tr>
            <tr>
                <td>HOBBY:</td>
                <td class="form-control"> 
                    &nbsp;Internet &nbsp; <input type="checkbox" name="hobb[]" value="Internet"<?php if(in_array("Internet",$hob)){echo "checked"; } ?>> 
                    &nbsp; cricket &nbsp;<input type="checkbox" name="hobb[]" value="cricket"<?php if(in_array("cricket",$hob)){echo "checked"; } ?>>
                    &nbsp;Game &nbsp;<input type="checkbox" name="hobb[]" value="Game"<?php if(in_array("Game",$hob)){echo "checked"; } ?>>
                </td>
            </tr>
            <tr>
                <td> IMAGE :</td>
                <td> <input type="file" class="form-control" name="img"></td>
            </tr>
            <tr>
                <td> SELECT CITY:
                <td class="form-control"> 
                    <select name="city">
                        <option value="dewas"<?php if( $fetch_id["ucity"]=="dewas"){ echo "selected"; } ?>>dewas</option>
                        <option value="Indore"<?php if( $fetch_id["ucity"]=="Indore"){ echo "selected"; } ?>>Indore</option>
                        <option value="Bhopal"<?php if( $fetch_id["ucity"]=="Bhopal"){ echo "selected"; } ?>>Bhopal</option>
                        <option value="Ujjain"<?php if( $fetch_id["ucity"]=="Ujjain"){ echo "selected"; } ?>>Ujjain</option>
                    </select>
                </td>
                </td>
            </tr>
        </table>
        <input type="hidden" name="hidd_id" value="<?php echo $fetch_id["ajax_id"]; ?>">
        <button>Edit</button>

    </form>
    <script>
        $(document).ready(function(e){
            $("#editform").on("submit", function(e){
                e.preventDefault();
                var formdata=new FormData(this);
                alert(formdata);

                $.ajax({
                    url:"all_php_code.php",
                    type:"POST",
                    data:formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        alert(data);
                        // consol.log(data)
                        if(data=="data update with image"){
                            alert("data update with image !!");
                        window.location = "ajaxShow.php";

                        }
                        if(data=="data not update without image"){
                            alert("data not update without image !!");
                    

                            }
                            if(data=="data update without image"){
                            alert("data update without image !!");
                        window.location = "ajaxShow.php";

                            }
                            if(data=="data not update with image"){
                            alert("data not update with image !!");
                     

                            }
                    },
                    error:function(data){
                        alert(data);
                        consol.log(data);
                        consol.log(error);


                    }
                   

                });

            });
        });
    </script>
</body>
</html>