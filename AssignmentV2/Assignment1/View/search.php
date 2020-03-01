<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
    <body>
        <div class='header'>
    <!--Displays customised welcome message-->
    <h1>Welcome <?php echo $_SESSION['loginName']; ?></h1>

    <!--Logout Button-->
    <div>
        <a class='nav-bar' href="search.php?action=logout">Logout</a> 
    </div>
</div>
    <br>

    <?php
    //include the search controller and instantiate the controller
    include_once("../Controller/searchController.php");
    $controller = new SearchController();
    $controller->search(); //display search form

    //display output after controller has been executed
    $output = $controller->execute();
    echo $output;

    //If session timer runs out, take the user back to te main page
    if(!isset($_SESSION['loggedin'])){
        header("Location: ../index.php");
    }
    ?>
<style>
    /*Styling*/
    .header{
        background:lightgrey;
        border-radius: 15px;
        padding: 20px;
        text-align:center;
    }

    body{
        font-family: 'Roboto', sans-serif;
        background:lightskyblue;
    }
    .nav-bar{
        background:lightskyblue;
        border-radius: 5px;
        padding: 5px;
        text-decoration: none;
        color: black;
        border: 1px solid black;
    }

    .book-entries{
        margin:5%;
        background: lightgrey;
        padding: 5%;
        border-radius: 15px;
        min-width: 500px;
    }

    .book-entry{
        border-style: solid;
        border-color: black;
        border-width: 2px 0px;
        margin-top:10px;
    }

    #title{
        text-align:center;
    }

    #error{
        text-align:center;
        margin-left: 25%;
        margin-right: 25%;
        background: lightgrey;
        padding: 5%;
        border-radius: 15px;
        min-width: 300px;
        color:red;
    }

    
</style>

<script type="text/javascript">
            //Animation for the buttons
			$(".nav-bar").mouseenter(function(){
				$(this).css('border','3px solid black');
				$(this).css('background', 'lightblue');
			});
			$(".nav-bar").mouseleave(function(){
				$(this).css('border','1px solid black');
				$(this).css('background', 'lightskyblue');
			});

            $("button").mouseenter(function(){
				$(this).css('border','3px solid black');
				$(this).css('background', 'lightblue');
			});
			$("button").mouseleave(function(){
				$(this).css('border','1px solid black');
				$(this).css('background', 'lightskyblue');
			});
</script>
</body>
</html>