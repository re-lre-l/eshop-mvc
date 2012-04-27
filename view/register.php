<html>

<head></head>

    <body>
    
    <?php

        if(isset($errormessages)){
            foreach($errormessages as $msg)
                echo '<p class="errormsg" style="color: red;">' . $msg . '</p>';
        }
    ?>

        <form method="POST" action="/register/createuser">

            <fieldset>
                <legend>Registration form:</legend>
                <label for="login">Login:</label><br/>
                <input type="text" name="login" class="login"><br/>

                <label for="pass">Password:</label><br/>
                <input type="password" name="pass" class="pass"><br/>

                <label for="pass_confirm">Confirm password:</label><br/>
                <input type="password" name="pass_confirm" class="pass"><br/>

                <br/>
                <input type="submit" value="Register">
                <a href="/login">Sign In</a>

            </fieldset>

        </form>


    </body>

</html>
