<!--Form used to search the Library Management System-->
<div id='search-container'>
    <!--Message for user to let them know what to do-->
    <h5>Use search form below to look for books</h5>
<form method="get" action='<?php echo $_SERVER["PHP_SELF"];?>'>
<div class='input-container'>
    <span>Author Name:</span> <input type="text" name="author">
</div>
    <br>
    <div class='input-container'>
    <span>Publisher:</span><input type="text" name="publisher">
</div>
    <br>
    <div class='input-container'>
    <span>Book Name:</span><input type="text" name="name">
</div>
    <br>
    <div class='input-container'>
    <span>Genre:</span><input type="text" name="genre">
</div>
    <br>
    <div class='input-container'>
    <span>Year Published:</span>
    <select name="year">
        <option value="195070">1950-1970</option>
        <option value="197090">1970-1990</option>
        <option value="19902019">1990-2019</option>
    </select>
</div>
    <br><br>
    <button type="submit" name="submitSearch">SEARCH</button>
    <button type="reset" name="reset">RESET</button>
</form>
</div>

<style>
/*Styling regarding the search form*/
#search-container{
    text-align:center;
    margin-left: 25%;
    margin-right: 25%;
    background: lightgrey;
    padding: 30px;
    border-radius: 15px;
}

span{
    float: left;
}

input {
    float:right;
    border-radius:5px;
}

.input-container{
    margin-top: 25px;
}

select{
    float:right;
    border-radius:5px;
}

button{
    border-radius: 5px;
    background:lightskyblue;
}
</style>