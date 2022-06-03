<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
        <body>
            <button>Back</button>
            <button id="logout">Logout</button>
            <h1>USER DASHBOARD</h1>
            <hr>
            <div id="Profile"></div>
            <div id="Group"></div>
        </body>
</html>