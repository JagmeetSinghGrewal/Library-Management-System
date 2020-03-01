<?php
//include the view and model classes
include_once("../View/view.php");
include_once("../Model/model.php");
include_once("../Model/model2.php");
include_once("../Model/model3.php");

class SearchController{
    private $view; //view object to handle the display of different views
    private $model; //model object handles the database interaction 
    public function __construct(){ 
        $this->view = new View("");
        $this->model = new Model();

    }

    //function that executes each time page is reloaded, basically handles when the user executes some events
    public function execute(){
        //runs respective functions according to user interaction (in this case when the user logouts)
        if (isset($_GET['action']) && !empty($_GET['action'])) 
        {     
            $this->{$_GET['action']}(); 
            unset($_GET['action']);
        }

        //return the book currently borrowed by the user
        if (isset($_POST['return']))
        {  
            //Gets bookname and which database it belongs to
            $data = explode("+",$_POST['return']);
            $bookName = $data[0];
            $year = $data[1];
            switch($year){
                case "195070":
                    $this->model = new Model();
                    $this->model->return($bookName);
                    break;
                case "197090":
                    $this->model = new Model2();
                    $this->model->return($bookName);
                    break;
                case "19902019":
                    $this->model = new Model3();
                    $this->model->return($bookName);
                    break;
            }   
            
            //Page is reloaded with the current search results
            header('Location: ../View/search.php?'.$_SESSION['path']);
            unset($_POST['return']);
        }

        //Borrows a book that is available
        if (isset($_POST['borrow']))
        {     
            //gets the book name and database that it belongs to
            $data = explode("+",$_POST['borrow']);
            $bookName = $data[0];
            $year = $data[1];
            switch($year){
                case "195070":
                    $this->model = new Model();
                    $this->model->borrow($bookName, $_SESSION['email']);
                    break;
                case "197090":
                    $this->model = new Model2();
                    $this->model->borrow($bookName, $_SESSION['email']);
                    break;
                case "19902019":
                    $this->model = new Model3();
                    $this->model->borrow($bookName, $_SESSION['email']);
                    break;
            }  

            //Reloads page with the current search results
            header('Location: ../View/search.php?'.$_SESSION['path']);
            unset($_POST['borrow']);
        }

        //if the user attempts to search the library management system
        if(isset($_GET['submitSearch'])){
            //search forms inputs are sent to model to handle the database interaction
            switch($_GET['year']){
                case "195070":
                    $this->model = new Model();
                    $searchResult = $this->model->searchDB($_GET['author'],$_GET['name']);
                    break;
                case "197090":
                    $this->model = new Model2();
                    $searchResult = $this->model->searchDB($_GET['author'],$_GET['publisher'],$_GET['name'],$_GET['genre']);
                    break;
                case "19902019":
                    $this->model = new Model3();
                    $searchResult = $this->model->searchDB($_GET['author'],$_GET['publisher'],$_GET['name'],$_GET['genre']);
                    break;
            }
            
            //on success, books are displayed in their respective format, else error message is displayed
            if($searchResult){
                $_SESSION['searchResult']=$searchResult;
                include_once("../View/displaySearch.php");
            } else {
                $this->view->updateText('<br><div id="error">Couldnt find the book you were searching</div>');
            }
            $_SESSION['path'] = explode("?",$_SERVER['REQUEST_URI'])[1];
            unset($_GET['submitSearch']);
        }

        //displayes the current selected view
        return $this->view->output(); 
    }

    //displays the search form
    public function search(){
        $this->view->updateText(file_get_contents(include("../View/searchForm.php"),TRUE));
    }

    //logs user out and sends to main page
    public function logout(){
        $_SESSION['loggedin'] = false;
        header("Location: ../index.php");
    }
}
?>