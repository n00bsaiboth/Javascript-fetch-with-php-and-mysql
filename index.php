<?php
    require_once('src/php/initialize.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <title>Another Ajax example</title>

    <link rel="icon" href="favicon.ico">
</head>
<body>
    <div class="container">
        <header>
            <h1>Another Ajax Example</h1>
        </header>
        
        <section>
            <div id="user-message"></div>
        </section>
        

        <section>
            <h3>View all users</h3>
            <div id="view-all-users"></div>
        </section>

        <section>
            <h3>Add new user</h3>

            <form>
                <div class="form-control">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" id="first_name" required>         
                </div>

                <div class="form-control">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" id="last_name" required>        
                </div>

                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <button type="button" onclick="addNew()" class="btn">Add new user</button>
            </form>

        </section>

        <section>
        <div id="update"></div>
        </section>
        
    </div>
     
    <script src="src/js/script.js"></script>
</body>
</html>