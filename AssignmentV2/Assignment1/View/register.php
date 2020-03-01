<!--Registration Form-->
<div id='register-container'>
    <h3>Register</h3>
    <form method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
        <div class='input-container'>
            <span>Name: </span><input type="text" name="name">
        </div>
        <br>
        <div class='input-container'>
            <span>Username</span> <input type="text" name="uname">
        </div>
        <br>
        <div class='input-container'>
            <span>Age:</span> <input type="number" name="age">
        </div>
        <br>
        <div class='input-container'>
            <span>Address:</span> <input type="text" name="address">
        </div>
        <br>
        <div class='input-container'>
            <span>Password:</span> <input type="password" name="password">
        </div>
        <br>
        <div class='input-container'>
            <span>Email:</span> <input type="text" name ="email">
        </div>
        <br>
        <div class='input-container'>
            <span>Select Domain:</span>
            <select name="domain">
                <option value="utas">UTAS</option>
                <option value="gmail">GMAIL</option>
                <option value="yahoo">YAHOO</option>
            </select>
        </div>
        <br><br>
        <button type="submit" name="submitRegister">SUBMIT</button>
        <button type="reset">RESET</button>
    </form>
</div>
<style>

/*Styling regarding the Registration form*/
#register-container{
    text-align:center;
    margin-left: 25%;
    margin-right: 25%;
    background: lightgrey;
    padding: 5%;
    border-radius: 15px;
    min-width: 300px;
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