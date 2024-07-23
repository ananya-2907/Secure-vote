

<?php
session_start();
if (!isset($_SESSION["userdata"])) {
    header("Location: ../");  // Ensure correct redirection path syntax
    exit();  // Exit after header redirection to stop script execution
}
$userdata = $_SESSION['userdata'];  // Use square brackets for array access
$groupdata = $_SESSION['groupdata'];  // Assuming this is correctly initialized somewhere else

if($_SESSION['userdata']['status']==0)
{
    $status='<b style="color:red">Not voted</b>';
}
else{
    $status= '<b style="color:green">voted</b>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="./stylesheet.css">
</head>
<body>
    <style>
      
#mainsection {
    width: 80%;
    margin: 0 auto;
    text-align: center;
}

#headersection {
    margin-bottom: 20px;
}

#backbtn, #logoutbtn {
    margin-right: 10px;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
}

#backbtn:hover, #logoutbtn:hover {
    background-color: #0056b3;
}

h1 {
    margin-bottom: 20px;
}

#profile {
    margin-bottom: 20px;
}

#profile img {
    border-radius: 50%;
}

#group {
    text-align: left;
}

#group div {
    margin-bottom: 20px;
}

#group img {
    float: right;
    margin-left: 20px;
    border-radius: 50%;
}

#votebtn {
    padding: 5px 10px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#voted {
    padding: 5px 10px;
    background-color: #6c757d;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: not-allowed;
}

    </style> 
    <div id="mainsection">
        <center>
    <div id="headersection">
    <a href="index.html"><button id="backbtn">back</button></a>
    <a href="index.html"><button id="logoutbtn">logout</button></a>
    <h1>Online-Voting-System</h1>
    </div>
    </center>
    <hr>
    <div id="profile">
        <center>
 <img src="./uploads/<?php echo $userdata['photo'] ?>"height="200" width="200"></b></center><br><br><br>;
 <b>name</b> <?php echo $userdata['name']?><br><br><br>;
 <b>mobile</b><?php echo $userdata['mobile']?><br><br><br>
 <b>Department</b><?php echo $userdata['department']?><br><br><br>
 <b>status</b><?php echo $status?><br><br><br>
    </div>

    <div id="group">

    <?php
        if($_SESSION['groupdata']) 
        {
            for($i= 0;$i<count($groupdata) ; $i++)
            {
                ?>
           <div>
                    <img style="float: right;" src="./uploads/<?php echo $groupdata[$i]['photo']?>" height="100" width="100"><br>
                    <b>Group Name:</b><?php echo $groupdata[$i]['name']?><br><br>
                    <b>Votes: </b><?php echo $groupdata[$i]['votes']?><br><br>
                    <form action="vote.php" method="POST">
                        <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes']?>">
                        <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id']?>">

                        <?php  
                        if($_SESSION['userdata']['status']==0)
                        {
                            ?>
                            <input type="submit" name="votebtn" id="votebtn" value="vote">
                            <?php
                        }
                        else{
                            ?>
                            <button disabled type="button" name="votebtn" value="vote" id="voted">voted</button>
                            <?php
                        }
                        
                        ?>
                        
                    </form>
                </div>
                <hr>
                <hr>
                <?php
            }
        }
        ?>
    </div>
    </div>
</body>
</html>
























