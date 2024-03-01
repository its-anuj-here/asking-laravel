<?php
    $idNo = $_REQUEST['q_id'];
    include ('dbconnect.php');
    if(!$conn){
        header('location: http://localhost/askmeanything/sitedown.php');
    }
    $resultMessage;
    session_start();
    if(isset($_SESSION['loggedin'])|| $_SESSION['loggedin']==true){
        $sql = 'SELECT * FROM `queries` WHERE `queries`.`query_id` = '.$idNo;
        $result = mysqli_query($conn, $sql);
        if ($result){
            while($row = mysqli_fetch_assoc($result)){
                $userId = $row['user_id'];
            }
            if($userId==$_SESSION['user_id']){
                $sql = 'DELETE FROM `queries` WHERE `queries`.`query_id` = '.$idNo;    
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $sql = "DELETE FROM `comments` WHERE `comments`.`queryid` = ".$idNo;
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $resultMessage='Your query and comments on it was successfully deleted !';
                    }
                    else{
                        $resultMessage= 'Your query is successfully deleted, but comments are not deleted from database!';
                    }
                }
                else{
                    $resultMessage= 'Internal error in database! Delete action not performed !';
                }
            }
            else{
                $resultMessage= 'You cannot delete query of other!';
            }
        }
        else{
            $resultMessage= 'Internal error in database! Action not performed !';
        }
        
        echo $resultMessage;
    }
    mysqli_close($conn);
?>