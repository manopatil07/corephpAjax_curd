<?php
$DB=mysqli_connect("localhost","root","","demo");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</head>
</head>
<body>
<h1>Verification Form </h1>
    <form class="form-group" method="post" enctype="multipart/form-data" id="form_data">
        <table>
            <tr>
                <td> FULL NAME :</td>
                <td> <input type="text" name="name" placeholder="Enter Your Name" class="form-control" required></td>
            </tr>
            <tr>
                <td> PHONE NO. : </td>
                <td><input type="text" name="phone" placeholder="Enter Your Phone No" class="form-control" required></td>
            </tr>
            <tr>
                <td> EMAIL ADDRESS : </td>
                <td> <input type="email" name="email" placeholder="Enter Your Email Address" class="form-control" required></td>
            </tr>
            <tr>
                <td> DATE OF BIRTH : </td>
                <td> <input type="date" name="DBO" placeholder="Enter Your DATE OF BIRTHs" class="form-control" required></td>
            </tr>
            <tr>
                <td> ADDRESS : </td>
                <td> <textarea name="address" name="address" placeholder="Enter Your Address" required class="form-control" required></textarea></td>
            </tr>
            <tr>
                <td> GENDER:</td>
                <td class="form-control">
                             MALE <input type="radio" name="gender" value="male">
                 &nbsp;&nbsp; FEMALE<input type="radio" name="gender" value="female"></td>
            </tr>
            <tr>
                <td>HOBBY:</td>
                <td class="form-control"> 
                    &nbsp;Internet &nbsp; <input type="checkbox" name="hobb[]" value="Internet" >
                    &nbsp; cricket &nbsp;<input type="checkbox" name="hobb[]" value="cricket">
                    &nbsp;Game &nbsp;<input type="checkbox" name="hobb[]" value="Game">
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
                        <option value="dewas">dewas</option>
                        <option value="Indore">Indore</option>
                        <option value="Bhopal">Bhopal</option>
                        <option value="Ujjain">Ujjain</option>
                    </select>
                </td>
                </td>
            </tr>
        </table>
        <input type="hidden" name="add_registration">
            <button>Add</button>
        
    </form>
    <a href="ajaxShow.php" class="btn btn-primary"><span class="title">View Data</span></a>
 
    <script>
        $(document).ready(function(e){
            $("#form_data").on('submit',function(e){
                e.preventDefault();
                var formdata=new FormData(this);
                   alert(formdata);
                //    console.log(formdata);
                $.ajax({
                    type:'POST',
                    data:formdata,
                    url:'all_php_code.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                         console.log(data);

                    if(data=="AJAX DATA INSERT INTO DB"){
                            alert('data sumbition successfull !!');
                        window.location = "ajaxShow.php";

                    }
                    if(data=="data not insert"){
                        alert('data sumbition successfull !!')
                        window.location = "ajaxShow.php";

                    }

            },error:function(data){
                console.log(error);
                console.log(data);


            }



                })
            });
        });

  
    </script>
      
</body>
</html>