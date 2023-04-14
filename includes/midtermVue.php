<?php
    include "config.php";

    $method = $_POST['method'];
    if(function_exists($method)){
        call_user_func($method);
    }
    else{
        echo 'Function not exists';
    }

    function doInsertGuest(){
        global $con;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $comment = $_POST['comment'];
        $now = date("Y/m/d");
        
        $location = "../pictures/";
        $filename = '';
        if(isset($_FILES['upload']['name'])){
            
            $finalfile = $location . $_FILES["upload"]['name'];
            if(move_uploaded_file($_FILES['upload']['tmp_name'],$finalfile))
            {
                $filename = $_FILES["upload"]['name'];
            }
            else{
                $filename = 'backblue.gif';
            }
            
        }else{

        }

        $query = $con->prepare(insertQuery());
        $query->bind_param('ssssss',$name,$email,$website,$comment,$filename,$now);
        $query->execute();
        $result = $query->get_result();
        echo $result;
        
        $query->close();
        $con->close();

    }

    //SELECT ALL FROM TABLE
    function doGetGuest(){
        global $con;
        $query = $con->prepare(getGuestQuery());
        $query->execute();
        $result = $query->get_result();
        $data = array();
        while($row = $result->fetch_array())
        {
            $data[] = $row;
        }
        echo json_encode($data);
    }


    //Queries
    function insertQuery(){
        return "INSERT INTO `tbl_guests`(`guest_name`, `email`, `website`, `comment`, `photo`, `dateinserted`) VALUES (?,?,?,?,?,?)";
    }
    function getGuestQuery(){
        return "SELECT `guestid`, `guest_name`, `email`, `website`, `comment`, `photo`, `dateinserted` FROM `tbl_guests` WHERE 1";
    }
?>