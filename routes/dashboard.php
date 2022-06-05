<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }
?>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/home.css">
    </head>
        <body>

            <style>
                #back{
                    padding: 5px;
                    font-size: 15px;
                    border-radius: 5px;
                    background-color: #0a3d62;
                    color: aliceblue;
                    font-weight: bold;
                    transition: 0.5s;
                    position: relative;
                    overflow: hidden;
                    float: left;
                } 
                #logout{
                    padding: 5px;
                    font-size: 15px;
                    border-radius: 5px;
                    background-color: #0a3d62;
                    color: aliceblue;
                    font-weight: bold;
                    transition: 0.5s;
                    position: relative;
                    overflow: hidden;
                    float: right;
                }
            </style>
            <div id="mainsection">
                <div id="headerSection">
                    <a href="../"><button id="back">Back</button></a>
                    <a href="../routes/logout.php"><button id="logout">Logout</button></a>
                    <h1>USER DASHBOARD</h1>
                </div>
                <hr>
                <div id="Profile">
                    <img src="../uploads/<?php echo $userdata['photo']?>" height="200" width="200"><br><br>
                    <b>NAME: </b><?php echo $userdata['name']?><br><br>
                    <b>MOBILE: </b><?php echo $userdata['mobile']?><br><br>
                    <b>ADDRESS: </b><?php echo $userdata['address']?><br><br>
                    <b>STATUS: </b><?php echo $status?><br><br>
                </div>
                <div id="Group">
                    <?php
                        if($_SESSION['groupdata']){
                            for($i=0;$i<count($groupsdata); $i++){
                                ?>
                                <div>
                                    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                                    <b> Group Name: <?php echo $groupsdata[$i]['name']?></b><br><br>
                                    <b> Votes: <?php echo $groupsdata[$i]['votes']?></b><br><br>
                                    <form action="../api/vote.php" method="POST">
                                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                        <?php
                                              if($_SESSION['userdata']['status']==0){
                                                ?>
                                                <input type="submit" name="vbutton" value="vote" id="vbutton">
                                                <?php
                                            }
                                            else{
                                                ?>
                                                    <button disabled type="submit" name="v" value="vote" id="v">Voted</button>
                                                <?php
                                            }
                                        ?>
                                    </form>
                                </div>
                                <hr>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </body>
</html>