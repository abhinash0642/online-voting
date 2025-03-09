<?php
require '../database/security.php';
require 'masterfile/titlechange.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>


    <!--------------------------------------------  Custom Stylesheet -------------------------------->
    <!-- FIXME: ADD Font Awesome icon cdn linnk -->
    <!-- FIXME: ADD Google Fonts cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js">
    </script>
    <!-- add jquery cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- chart.js Cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" href="css/input.css">
    <link rel="stylesheet" href="css/table.css">
</head>

<body>
    <!-- ------------------------------------ MAin Container Started-------------------------------------------- -->
    <div class="container">
        <!-- -----------------------------------------Header Starts ------------------------------------------ -->
        <div class="header">
            <a href="dashboard.php">
                <div class="logowrapper">
                    <div class="logo-container">
                        <img src="../images/weblogo.jpg" alt="logo">
                    </div>
                    <div class="votetext">Vote</div>
                    <div class="indtext">India</div>
                </div>
            </a>

            <div class="myprofile">
                <div class="imgbox">
                    <img src="../uploads/adminimg/admin.jpg" class="userimg" alt="Admin Image">
                </div>
                <h2 class="adminname">Abhinash Kumar</h2>
                

            </div>


        </div>

        <!-- -----------------------------------------Header Starts ------------------------------------------ -->