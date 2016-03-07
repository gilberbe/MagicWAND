<!DOCTYPE html>

<html>
        <head>
                <title>testForm</title>
                <style>
                        table, th, td {
                        border: 1px solid black;
                        }
                </style>
        </head>
        <body style="background-color:#b3ffe5">
                <form action='action.php' method="post">
                        <fieldset>
                                <legend>Login:</legend>
                                <br>Welcome to Magic WAND<br>
                                <i>Please Enter Your Username and Password</i>
                                <br>
                                <Table>
                                        <TR>

                                                <TD>Username/Email:</TD>
                                                <TD><input type="text" name="username" value="user@example.com"></TD>
                                        </TR>
                                        <TR>
                                                <TD>Password:</TD>
                                                <TD><input type="password" name="password" value="*******"></TD>
                                        </TR>
                                        <TR>
                                                <TD colspan=2><input type="submit" value="Submit"></TD>
                                        </TR>
                                </Table>
                        </fieldset>
                </form>
        </body>
</html>

