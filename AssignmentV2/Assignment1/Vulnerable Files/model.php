<?php
class Model{

    //function that registers user to the relevant database
    public function registerMember($name,$username, $age, $address, $password, $email){
        //database connection
        include_once("dbconn.php");

        //select the books195070 database
        mysqli_select_db($mysqli,"books195070");

        //run the query and return result to controller
        $query = "INSERT INTO users VALUES('$name', '$username', '$age', '$address', '$password', '$email')";
        $result = $mysqli->query($query);
        return $result;
    } 

    //function to authenticate the user 
    public function login($username, $password){
        //database connection
        include_once("dbconn.php");

        //select the books195070 database
        mysqli_select_db($mysqli,"books195070");

        //run the query
        $query = "SELECT Name, email FROM users WHERE Username='$username' AND password='$password'";
        $result = $mysqli->query($query);

        //if user exists in database, return true otherwise false
        if($result->num_rows <1){
            return false;
        } else {
            $result = $result->fetch_assoc();
            $_SESSION['loginName'] = $result['Name'];
            $_SESSION['email'] = $result['email'];
            return true;
        }

    }

  
    //functions checks the databases to determine if the books the user is searching for exists
    public function searchDB($author, $name){
        //database connection
        include_once("dbconn.php");
        //select the books195070 database
        mysqli_select_db($mysqli,"books195070");

        //run the query
        $query = "SELECT books.name as name, books.author as author, borrow.availability as borrow FROM books INNER JOIN borrow ON books.name = borrow.book WHERE books.author='$author' OR books.name='$name'";
        $result = $mysqli->query($query);

        //if no matched books were found return false, else return the array of books
        if($result->num_rows <1){
            return false;
        } else {
            $count = 0;
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $arr[$count] = $row;
                $count++;
            }
            return $arr;
        }
    }

    //function updates database when a book returned
    public function return($bookName){
        //database connection
        include_once("dbconn.php");

        //select the books195070 database
        mysqli_select_db($mysqli,"books195070");

        //query
        $query = "UPDATE borrow SET availability = NULL WHERE book='$bookName'";

        //Run the query
        $mysqli->query($query); 

        //close db connection
        $mysqli->close();      
    }

    //function updates database when a book borrowed
    public function borrow($bookName, $email){
        //database connection
        include_once("dbconn.php");

        //select the books195070 database
        mysqli_select_db($mysqli,"books195070");

        //query
        $query = "UPDATE borrow SET availability = '$email' WHERE book='$bookName'";

        //run the query
        $mysqli->query($query); 

        //close db connection
        $mysqli->close();
    }
}
?>
