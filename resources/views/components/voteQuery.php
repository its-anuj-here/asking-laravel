<?php
    $idNo = $_REQUEST['query_id'];
    $val = $_REQUEST['val'];
    include ('dbconnect.php');
    if(!$conn){
        header('location: http://localhost/askmeanything/sitedown.php');
    }
    $resultMessage;
    session_start();
    if(isset($_SESSION['loggedin'])|| $_SESSION['loggedin']==true){
        /*$sql = 'SELECT * FROM `queries` WHERE `queries`.`query_id` = '.$idNo;
        $result = mysqli_query($conn, $sql);
        if ($result){
            while($row = mysqli_fetch_assoc($result)){
                $userId = $row['user_id'];
            }
            if($userId==$_SESSION['user_id']){*/
                $sql = "UPDATE `queries` SET `votes` = ".$val." WHERE `queries`.`query_id` = ".$idNo;    
                $result = mysqli_query($conn, $sql);
            /*}
            else{
                $resultMessage= 'You cannot delete query of other!';
            }
        }
        else{
            $resultMessage= 'Internal error in database! Action not performed !';
        }*/
        
    }
    mysqli_close($conn);
?>