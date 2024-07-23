<?php
        if($_SESSION['groupdata']) 
        {
            for($i= 0;$i<count($_groupdata) ; $i++)
            {
                ?>
           <div>
                    <img src="./uploads<?php echo $groupdata[$i]['photo']?>" height="100" width="100">
                    <b>Group Name:<?php echo $groupdata[$i]['name']?></b>
                    <b>Votes:<?php echo $groupdata[$i]['votes']?></b>
                    <form action="">
                        <input type="hidden" name="gvotes" value="">
                        <input type="submit" name="votebtn" id="votebtn">
                    </form>
                </div>
                <?php
            }
        }
        ?>
    </div>