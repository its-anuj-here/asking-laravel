<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include_once './fav.php';?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="./script.js"></script>
    <title>All Categories</title>
</head>
<body>
    <?php require "./navbar.php"?>
    <main>
        <section
            class="w-full p-10 pb-2 flex justify-start pt-[8rem] bg-gray-900"
        >
            <article class="flex flex-col gap-7">
            <h2 class="text-4xl text-white font-bold">Available Categories !!</h2>
            </article>
        </section>
    <!-- category section -->
        <section
            class="text-gray-400 bg-gray-900 body-font flex relative w-full flex-wrap justify-center pt-10"
            id="cat-container"
        >
            <!-- cards -->
            <?php include './getCategories.php' ?>
        </section>
    </main>
    <?php include_once './components/footer.php';?>
</body>
</html>