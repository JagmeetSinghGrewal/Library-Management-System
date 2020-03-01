<!DOCTYPE html>
<html>
<head>
    <title>Library Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>

<div class='header'>
<h1>Welcome to the Library Management System</h1>

<!--Login and register buttons-->

    <a class="nav-bar" href="index.php?action=register">Register</a> 
    <a class="nav-bar" href="index.php?action=login">Login</a>
</div>
<br><br>
<?php
session_start();
include("./Controller/controller.php"); //includes the controller class

//instantiate  controller and display outputafter controller is executed
$controller = new Controller();
$output = $controller->execute(); 
echo $output; 
?>

</body>

<style>
    /*Styling for this page*/
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
            //Animation for the buttons and links
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
</html>