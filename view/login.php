<html>

<head></head>

<body>

    <?php
        if(isset($errormessages)){
            foreach($errormessages as $msg)
                echo '<p class="errormsg" style="color: red;">' . $msg . '</p>';
        }
    ?>

    <form method="POST" action="/login/signin">

        <fieldset>
            <legend>Login form:</legend>

            <label for="login">Login:</label><br/>
            <input type="text" name="login" id="login" class="login"><br/>

            <label for="pass">Password:</label><br/>
            <input type="password" name="pass" id="pass" class="pass"><br/>

            <br/>
            <input type="submit" value="Login">
            <a href="/register">Sign Up</a>

        </fieldset>

    </form>


</body>

</html>