<?php 
$hostname="localhost";
$username="root";
$database="pro";
$conn=new mysqli($hostname,$username,"",$database);
if(!$conn)
{
    //echo "Connection failrd";
}
else
{
    //echo "connected";
}