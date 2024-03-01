<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    require_once './components/dbconnect.php';
    if(!$conn){
        echo "<script>
        window.location.href='./sitedown.php';
        </script>";
    }
    else {
        $cat=$_REQUEST['search'];
        $all_rec = $_REQUEST['allRec'];
        if($all_rec==0){
            $sql = "SELECT * FROM `category` WHERE `cat_name` LIKE '" . $cat . "%';";
        }
        else{
            $sql = "SELECT * FROM `category`;";
        }
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<div class='alert alert-danger alert-dismissible fade show ' style = 'width:50vw;
            margin:10px auto;' role='alert'>
                <strong>OOPS!!</strong> Some error occurred <br>Sorry for the inconvenience.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
        $num=mysqli_num_rows($result);
        //LOOP FOR DISPLAYING CATEGORIES
        if($num > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                $sql = 'SELECT * FROM `queries` WHERE query_cat='.$row['cat_id'];
            $result3 = mysqli_query($conn , $sql);
            if(!$result3){
                $numOfComments=0;
            }
            else{
                $numOfComments=mysqli_num_rows($result3);
            }
            echo '
                <div class="p-4 lg:w-1/3 relative overflow-hidden card">
                    <div
                        class="h-full bg-gray-800 bg-opacity-40 px-8 pt-16 pb-20 rounded-lg overflow-hidden text-center relative"
                    >
                    <h1
                        class="title-font sm:text-2xl text-xl font-medium text-white mb-3"
                    >
                    ' . $row['cat_name'] . '
                    </h1>
                    <p class="leading-relaxed mb-3">
                    ' . substr($row['cat_desc'], 0, 100) . '...
                    </p>
                    <a
                        class="text-yellow-400 inline-flex items-center cursor-pointer"
                        href="./discusspage.php?id=' . $row['cat_id'] . '"
                    >Join Discussion
                        <svg
                        class="w-4 h-4 ml-2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        >
                        <path d="M5 12h14"></path>
                        <path d="M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <div
                        class="text-center mt-2 leading-none flex justify-center absolute bottom-0 left-0 w-full py-4"
                    >
                        <span
                            class="text-gray-500 mr-3 inline-flex items-center leading-none text-sm pr-3 py-1 border-r-2 border-gray-700 border-opacity-50"
                        >
                            <svg
                                class="w-4 h-4 mr-1"
                                stroke="currentColor"
                                stroke-width="2"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                viewBox="0 0 24 24"
                            >
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle></svg
                        >'.$row['cat_views'].'
                        </span>
                        <span
                            class="text-gray-500 inline-flex items-center leading-none text-sm"
                        >
                            <svg
                                class="w-4 h-4 mr-1"
                                stroke="currentColor"
                                stroke-width="2"
                                fill="none"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"
                                ></path>
                            </svg>'.$numOfComments.'
                        </span>
                        </div>
                    </div>
                </div>
            ';
            }
        } else{
            echo'
                    <section class="w-full flex justify-center text-center pb-[1rem] pb-[10rem] bg-gray-900">
                        <article class="flex flex-col gap-7">
                            <h2 class="text-6xl text-white font-bold">OOPS !!</h2>
                            <p class="text-white/70 w-[100%]">
                                Your Searched Category Not Available !
                            </p>
                        </article>
                    </section>';
        }  
            
        
    }
}
?>
