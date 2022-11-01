<?php
$DB=mysqli_connect("localhost","root","","demo");
$slectAjeax=mysqli_query($DB,"SELECT*FROM addajax");
$GETCOUNT=mysqli_num_rows($slectAjeax);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajex Show Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</head>
<body>
    <h1>SHOW  data</h1>
    <table border="1px">
       <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>PHONE NO.</th>
         <th>GENDER</th>
        <th>EMAIL</th>
        <th>DATE OF BRITH</th>
        <th>ADDRESS</th>
        <th>CITY</th>

        <th>HOBBY</th>
        <th>IMAGE</th>
        <th>DELETE</th>
        <th>EDIT</th>
        <tbody>
            <?php
            fOR($I=1;$I<=$GETCOUNT;$I++)
            {
                $GETdata=mysqli_fetch_array($slectAjeax);
             ?>
<tr>
    <td><?php echo $GETdata["ajax_id"] ?></td>
    <td><?php echo $GETdata["full_name"] ?></td>
    <td><?php echo $GETdata["phone"] ?></td>
    <td><?php echo $GETdata["Gender"] ?></td>
    <td><?php echo $GETdata["Email"] ?></td>
    <td><?php echo $GETdata["date_birth"] ?></td>
    <td><?php echo $GETdata["Address"] ?></td>
    <td><?php echo $GETdata["ucity"] ?></td>

    <td><?php echo $GETdata["Hobby"] ?></td>
    <td><img src="images/<?php echo $GETdata["image"] ?>"  width="100px"></td>
    <td>
        <!-- <a href="ajaxShow.php?delete_id=<?php echo $GETdata["ajax_id"] ?>">DELETE</a> -->
            <button class="btn btn-danger DELETE" data-id=<?php echo $GETdata["ajax_id"] ?>>DELETE</button></td>
    <td><a href="AjaxEdit.php?edit_id=<?php echo $GETdata["ajax_id"] ?>">Edit</a></td>
</tr>
            <?php
            }

                ?>
        </tbody>
       </thead>
    </table>
   <a href="AddAjax.php" class="btn btn-primary"><span class="title">Add Data</span></a>
  <script>
    $(document).ready(function(){
        $(".DELETE").click(function(){
            var delete_id=$(this).data("id");
            // alert(delete_id);
            $.ajax({
                url:"all_php_code.php",
                type:"POST",
                datatype: 'html',
                data:{
                    del_ID:delete_id
                },
                success:function(data){
                    // console.log(data);
                    if(data=="data delete"){
                        alert("DATA DELETE SUCCESSFULL !!");
                        window.location = "ajaxShow.php";
                    }
                    if(data=="data not delete"){
                        alert("DATA NOT DELETE SUCCESSFULL !!")
                        window.location = "ajaxShow.php";

                    }

                },
                error:function(data){
                 console.log(error);
                console.log(data);
                }
            });

        });
    });

  


  </script>
</body>
</html>