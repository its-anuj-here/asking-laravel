<?php
//for down voting in comments
/*
$sql = "SELECT * FROM `comments` WHERE `commentid` =".$com_id;

if(!$result){
}
else{
	if(mysqli_num_rows($result)>0){
		
	}
}

$sql = "UPDATE `comments` SET `votes` =  `votes`-1 WHERE `comments`.`commentid` =".$com_id;
//for up voting in comments
$sql = "SELECT * FROM `comments` WHERE `commentid` =".$com_id;
$sql = "UPDATE `comments` SET `votes` =  `votes`+1 WHERE `comments`.`commentid` =".$com_id;
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include_once './fav.php';?>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="./script.js"></script>
	<title>Document</title>
</head>
<body>
	<!--div x-data="{ mobileMenuOpen : false }" class="flex flex-wrap flex-row justify-between md:items-center md:space-x-4 bg-white py-6 px-6 relative">
		<button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block md:hidden w-8 h-8 bg-gray-200 text-gray-600 p-1">
			<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd">
				</path>
			</svg>
		</button>
		<div class="absolute md:relative top-16 left-0 md:top-0 z-20 md:flex flex-col md:flex-row md:space-x-6 font-semibold w-full md:w-auto bg-white shadow-md rounded-lg md:rounded-none md:shadow-none md:bg-transparent p-6 pt-0 md:p-0 hidden" :class="{ "flex" : mobileMenuOpen , "hidden": !mobileMenuOpen}" @click.away="mobileMenuOpen = false">
			<a href="#" class="block py-1 text-indigo-600 hover:underline">Home</a>
			<a href="#" class="block py-1 text-gray-600 hover:underline">About us</a>
			<a href="#" class="block py-1 text-gray-600 hover:underline">Services</a>
			<a href="#" class="block py-1 text-gray-600 hover:underline">Blog</a>
			<a href="#" class="block py-1 text-gray-600 hover:underline">Contact</a>
		</div>
	</div-->
	<?php
	echo '
	<div x-data="{ mobileMenuOpen : false }" class="flex flex-wrap flex-row justify-between md:items-center md:space-x-4 bg-white py-6 px-6 relative">
                  <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-block md:hidden w-8 h-8 bg-gray-200 text-gray-600 p-1">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd">
                      </path>
                    </svg>
                  </button>
                  <div class="absolute md:relative top-16 left-0 md:top-0 z-20 md:flex flex-col md:flex-row md:space-x-6 font-semibold w-full md:w-auto bg-white shadow-md rounded-lg md:rounded-none md:shadow-none md:bg-transparent p-6 pt-0 md:p-0 hidden" :class="{ ';
                    echo "'flex' : mobileMenuOpen , 'hidden'"; 
                    echo ' : !mobileMenuOpen}" @click.away="mobileMenuOpen = false">
                    <a href="#" class="block py-1 text-indigo-600 hover:underline">Home</a>
                    <a href="#" class="block py-1 text-gray-600 hover:underline">About us</a>
                    <a href="#" class="block py-1 text-gray-600 hover:underline">Services</a>
                    <a href="#" class="block py-1 text-gray-600 hover:underline">Blog</a>
                    <a href="#" class="block py-1 text-gray-600 hover:underline">Contact</a>
                  </div>
                </div>';
	?>
	<!--button 
		@click="mobileMenuOpen = !mobileMenuOpen" 
		class="inline-block md:hidden w-8 h-8 bg-gray-200 text-gray-600 p-1"
	>
		<svg 
			fill="currentColor" 
			viewBox="0 0 20 20" 
			xmlns="http://www.w3.org/2000/svg"
		>
			<path 
				fill-rule="evenodd" 
				d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" 
				clip-rule="evenodd"
			></path>
		</svg>
	</button-->
</body>
</html>