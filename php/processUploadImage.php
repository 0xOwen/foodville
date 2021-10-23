
<?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header("Location: admin.php");
        exit();
    }
    require_once("connect.php");
    $conn = connect();

    if(isset($_POST['submitImage'])){

        $file=$_FILES["food-image"];

        print_r($file);

        $original_file_name=$_FILES['food-image']['name'];

        $file_tmp_location=$_FILES['food-image']['tmp_name'];

        $file_type= substr($original_file_name, strpos($original_file_name, '.'), strlen($original_file_name));
        $new_file_name = time().$file_type;

        //print($file_type);

        $file_path="../FoodImages/";
        $foodname= $_POST['fooditem'];
        $foodprice=$_POST['price'];
        $originalimagename=$original_file_name;
        $fileposition = $file_path.$new_file_name;


        if(move_uploaded_file($file_tmp_location, $file_path.$new_file_name)){
            $sql= "INSERT INTO foods (name , location , price) 
                            VALUES ('$foodname', '$fileposition' ,'$foodprice');";

            if(mysqli_query($conn, $sql)){
                header("location:admin_home.php");
                echo "<script>alert('Successfully inserted')</script>";

            }else{
                echo "<script>alert('error')</script>";
                echo mysqli_error($conn);
            }

            
            /*
           if(setData($sql)){
                header("location:../menu.php");
            }*/
        }


        /*
        $sqltbl="CREATE TABLE food(
            id INT(10) AUTO_INCREMENT,
            fooditem VARCHAR(50) NOT NULL,
            originalname VARCHAR(50),
            newfilename varchar(50),
            PRIMARY KEY(id)
            );";

            */
        
    }

?>