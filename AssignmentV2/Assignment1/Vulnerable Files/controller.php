<?php
//Include the view and model classes
include_once(realpath("./View/view.php")); //these had session [root] n them before
include_once(realpath("./Model/model.php"));
include_once(realpath("./Model/model2.php"));
include_once(realpath("./Model/model3.php"));

class Controller{
    private $view; //view object that handles all the views
    private $model; //model object that handles all the data input to database and output from database
    public function __construct(){ 
        $this->view = new View("");
        $this->model = new Model();
    }

    //function that executes each time page is reloaded, basically handles when the user executes some events
    public function execute(){
        //If either register or login buttons were pressed, execute the corresponding functions
        if (isset($_GET['action']) && !empty($_GET['action'])) 
        {     
            $this->{$_GET['action']}(); 
            unset($_GET['action']);
        }

        //checks whether the a registration form has been submitted
        if (isset($_POST['submitRegister'])) 
        {     
            //select which model to call
            switch($_POST['domain']){
                case "gmail":
                    $this->model = new Model();
                    break;
                case "yahoo":
                    $this->model = new Model2();
                    break;
                case "utas":
                    $this->model = new Model3();
                    break;
            }

            //registration form inputs to model to handle database interaction
            if(!empty($_POST['name'])&&!empty($_POST["uname"])&&!empty($_POST["age"])&&!empty($_POST["address"])&&!empty($_POST["password"])&&!empty($_POST["email"])){
                $result = $this->model->registerMember($strippedName,$_POST["uname"],$_POST["age"],$_POST["address"],$_POST["password"],$_POST["email"]);
            } else {
                $result = False;
            }
            //determine if registration was successful
            if($result){
                //login in user and take to search page when registration was successful
                $_SESSION['loggedin'] = true;
                $_SESSION['loginName'] = $_POST['name'];
				$_SESSION['email'] = $_POST['email'];
		        $this->view->updateText("<div id='error'>Registeration Successful.</div>");
                header("Location: ./View/search.php");
            } else {
                //display error message if registration wasnt successful
                $error = '';
                //If the name doesnt just contain letters and spaces, the name is invalid
                if(filter_var($strippedName, FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^(([a-zA-Z\s])*)+$/")))==FALSE){
                    $error = "Invalid Name" ;
                }
                $this->view->updateText("<div id='error'>Registeration Unsuccessful. Please Try Again <br>".$error."</div>");
            } 
            unset($_POST['submitRegister']);
        }

        //checks whether is user attemped to login to the system
        if (isset($_POST['submitLogin'])) 
        {  
	    unset($_POST['submitLogin']);
            //select which model to call
            switch($_POST['domain']){
                case "gmail":
                    $this->model = new Model();
                    break;
                case "yahoo":
                    $this->model = new Model2();
                    break;
                case "utas":
                    $this->model = new Model3();
                    break;
            }
            //send login details to the model to handle database interaction
            $result = $this->model->login($_POST['username'], $_POST['password']);

            //determine if login was successful
            if(!$result){
                //display error message if login was unsuccessful
                $this->view->updateText("<div id='error'>Login Failed</div>");
            } else {
                //login user on success and take to search page
                $_SESSION['loggedin'] = true;
                header("Location: ./View/search.php");
                
            }
            unset($_POST['submitLogin']);
        }

        //display the current view that needs to be shown
        return $this->view->output(); 
    }

    //prints the register view (registration form) onto the page
    public function register(){
        $this->view->updateText(file_get_contents(include("./View/register.php"),TRUE));
    }

    //prints the login view (login form) onto the page
    public function login(){
        $this->view->updateText(file_get_contents(include("./View/login.php"),TRUE));
    }
}
?>