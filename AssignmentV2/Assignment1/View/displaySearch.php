<?php

$count =1; //Keeps count of the number of books that were found in the search
echo "<div class='book-entries'>";
echo "<h2 id='title'>Matched Entries</h2>";

//Prints all the books in a certain format
foreach($_SESSION['searchResult'] as $row=>$data){
    $status;
    if($data['borrow']==NULL){
        $status = "Available";             
    } else {
        $status ='Borrowed';
    }
    echo "<div class='book-entry'>";
    echo "<br>";
    echo "<b>Book: </b>".$count; //Book number, which is the number that represents when it was found. i.e. book 1 represents that it was the first book found in the searc
    echo "<br>";
    //Depending on the published year, books are displayed in a certain format
    switch($_GET['year']){
        case "195070":
            echo "<br>";
            echo '<b>Author: </b>'.$data['author'];
            echo "<br>";
            echo '<b>Name:</b> '.$data['name'];
            echo "<br>";
            echo "<b>Borrowed Status:</b> ".$status;
            echo "<form method='post' action='../View/search.php'>";
            if($_SESSION['email']==$data['borrow']){ //checks the borrowed status of book and displays accordingly
                echo '<button type="submit" name="return" value="'.$data['name'].'+195070">Return</button>';        
            } else {
                if($status=="Available"){
                    echo '<button type="submit" name="borrow" value="'.$data['name'].'+195070">Borrow</button>';
                } else  {
                    echo 'Book is currently borrowed.';
                }
            }
            echo "</form>";
            echo "<br>";
            echo "<br>";
            break;
        case "197090":
            echo "<br>";
            echo '<b>Author:</b> '.$data['author'];
            echo "<br>";
            echo '<b>Name:</b> '.$data['name'];
            echo "<br>";
            echo '<b>Publisher:</b> '.$data['publisher'];
            echo "<br>";
            echo '<b>Genre: </b>'.$data['genre'];
            echo "<br>";
            echo "<b>Borrowed Status:</b> ".$status;
            echo "<form method='post' action='../View/search.php'>";
            if($_SESSION['email']==$data['borrow']){ //checks the borrowed status of book and displays accordingly
                echo '<button type="submit" name="return" value="'.$data['name'].'+197090">Return</button>';      
            } else {
                if($status=="Available"){
                    echo '<button type="submit" name="borrow" value="'.$data['name'].'+197090">Borrow</button>';
                } else  {
                    echo 'Book is currently borrowed.';
                }
            }
            echo "</form>";
            echo "<br>";
            echo "<br>";
            break;
        case "19902019":
            echo "<br>";
            echo '<b>Author:</b> '.$data['author'];
            echo "<br>";
            echo '<b>Name:</b> '.$data['name'];
            echo "<br>";
            echo '<b>Publisher: </b>'.$data['publisher'];
            echo "<br>";
            echo '<b>Genre: </b>'.$data['genre'];
            echo "<br>";
            echo '<b>Link: </b><a href="'.$data['link'].'">'.$data['link'].'</a>';
            echo "<br>";
            echo "<b>Borrowed Status:</b> ".$status;
            echo '<form method="post" action="../View/search.php">';
            if($_SESSION['email']==$data['borrow']){ //checks the borrowed status of book and displays accordingly
                echo '<button type="submit" name="return" value="'.$data['name'].'+19902019">Return</button>';         
            } else {
                if($status=="Available"){
                    echo '<button type="submit" name="borrow" value="'.$data['name'].'+19902019">Borrow</button>';
                } else  {
                    echo 'Book is currently borrowed.';
                }
            }
            echo "</form>";
            echo "<br>";
            echo "<br>";
            break;
    }
    $count++;
    echo "</div>";
}
echo "</div>";
?>