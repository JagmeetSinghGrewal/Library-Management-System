<?php
class Model3{

    //function that registers user to the relevant database
    public function registerMember($name,$username, $age, $address, $password, $email){
        //database connection
        include_once("dbconn.php");

        //select the books19902019 database
        mysqli_select_db($mysqli,"books19902019");
    
        //Santise inputs
        $nm_sanit = $mysqli->real_escape_string($name);
        $un_sanit = $mysqli->real_escape_string($username);
        $age_sanit = $mysqli->real_escape_string($age);
        $addr_sanit = $mysqli->real_escape_string($address);
        $pw_sanit = $mysqli->real_escape_string($password);
        $em_sanit = $mysqli->real_escape_string($email);

        //Prepare query
        $stmt = $mysqli->prepare("INSERT INTO users (Name, Username, Age, Address, password, email) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $nm_sanit, $un_sanit, $age_sanit, $addr_sanit, $pw_sanit, $em_sanit);

        //Execute query
        $stmt->execute();
        return true;
    } 

    //function to authenticate the user 
    public function login($username, $password){
        //database connection
        include_once("dbconn.php");

        //select the books19902019 database
        mysqli_select_db($mysqli,"books19902019");

        //Santise inputs
        $un_sanit = $mysqli->real_escape_string($username);
        $pw_sanit = $mysqli->real_escape_string($password);/**/

        //Prepare query
        $stmt = $mysqli->prepare("SELECT Name, email FROM users WHERE Username = ? AND password = ?");
        $stmt->bind_param("ss", $un_sanit, $pw_sanit);

        //Execute query
        $stmt->execute();
        $stmt->bind_result($returned_nm, $returned_em);
        $stmt->store_result();

        //if user exists in database, return true otherwise false
        if($stmt->num_rows  == 1){
            $stmt->fetch();
            $_SESSION['loginName'] = $returned_nm;
            $_SESSION['email'] = $returned_em;
            return true;
        } else {
            return false;
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
