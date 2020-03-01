<?php
class Model3{

    //function that registers user to the relevant database
    public function registerMember($name,$username, $age, $address, $password, $email){
        //database connection
        include_once("dbconn.php");

        //select the books19902019 database
        mysqli_select_db($mysqli,"books19902019");
    
        //run the query and return result to controller
        $query = "INSERT INTO users VALUES('$name', '$username', '$age', '$address', '$password', '$email')";
        $result = $mysqli->query($query);
        return $result;
    } 

    //function to authenticate the user 
    public function login($username, $password){
        //database connection
        include_once("dbconn.php");

        //select the books19902019 database
        mysqli_select_db($mysqli,"books19902019");
        //run the query
        $query = "SELECT Name,email FROM users WHERE Username='$username' AND password='$password'";
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
    public function searchDB($author, $pub, $name, $genre){
        //database connection
        include_once("../Model/dbconn.php");
        
        //select the books19902019 database
        mysqli_select_db($mysqli,"books19902019");

        //run the query
        $query = "SELECT books.name as name, books.author as author, books.publisher as publisher, books.genre as genre, books.link as link, borrow.availability as borrow FROM books INNER JOIN borrow ON books.name = borrow.book WHERE author='$author' OR name='$name' OR publisher='$pub' OR genre='$genre'";
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
        //db connection
        include_once("dbconn.php");

        //select the books19902019 database
        mysqli_select_db($mysqli,"books19902019");

        //query
        $query = "UPDATE borrow SET availability = NULL WHERE book='$bookName'";

        //run query
        $mysqli->query($query); 
        
        //close db connection
        $mysqli->close();      
    }

    //function updates database when a book borrowed
    public function borrow($bookName, $email){
        //db connection
        include_once("dbconn.php");

        //select the books19902019 database
        mysqli_select_db($mysqli,"books19902019");

        //query
        $query = "UPDATE borrow SET availability = '$email' WHERE book='$bookName'";

        //run query
        $mysqli->query($query); 

        //close db connection
        $mysqli->close();
    }
}

?>
