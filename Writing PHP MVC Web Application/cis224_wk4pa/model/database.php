<?php  
    function get_db_conn()
        {
            //Connect to Database
            $hostname ="localhost";
            $username = "ecpi_user";
            $password = "Password1";
            $dbname = "cis224_wk4pa";
            return mysqli_connect($hostname, $username, $password, $dbname);
        }
?>