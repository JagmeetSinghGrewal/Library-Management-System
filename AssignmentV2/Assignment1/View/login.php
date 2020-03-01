<!--Login Form-->
<div id="login-container">
    <h3>LOGIN</h3>
    <form method="post" action='./index.php'>
        <div class="input-container">    
            <span>Username:</span> <input type="text" name="username">
        </div>
        <br>
        <div class="input-container"> 
            <span>Password: </span><input type="password" name="password">
        </div>
        <br>
        <div class="input-container"> 
        <span>Select Domain:</span>
            <select name="domain">
                <option value="utas">UTAS</option>
                <option value="gmail">GMAIL</option>
                <option value="yahoo">YAHOO</option>
            </select>
        </div>
        <br><br>
        <button type="submit" name="submitLogin">LOGIN</button>
        <button type="reset" name="reset">RESET</button>
    </form>
</div>
<style>
/*Styling regarding the login form*/
#login-container{
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