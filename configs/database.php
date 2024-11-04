<?php
    function connect_database($dbName)
    {
        // $con = mysqli_connect("Qmatchup.db.12111813.hostedresource.com","Qmatchup","","Qmatchup");
        $con = mysqli_connect("localhost","root","","qloudid");

        if(mysqli_connect_errno($con))
            echo "Connection to database failed ".mysqli_connect_error();
        else
            return $con;
     }	
?>