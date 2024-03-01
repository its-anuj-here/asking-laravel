<?php
    require_once './components/dbconnect.php'; //have conn variable

    
    if(!$conn){
      echo "<script>
      window.location.href='./sitedown.php';
      </script>";
    }
    else{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sender_name = $_POST['sender_name'];
            $sender_email = $_POST['sender_email'];
            $msg = $_POST['message'];

            $sql = "INSERT INTO `feedbacks` (`sender_name`, `sender_email`, `message`) VALUES ('$sender_name', '$sender_email', '$msg')";
            $result = mysqli_query($conn , $sql);
            if(!$result){
                echo mysqli_error($conn);
                echo "<script>
                    alert('Failed to send feedback, try again later, Sorry for the inconvenience.');
                    window.location.href='./index.php';
                  </script>";
            }
            else{
                echo "<script>
                    alert('Thanks for sharing your feedback!');
                    window.location.href='./index.php';
                  </script>";
            }
        }
    }

?>