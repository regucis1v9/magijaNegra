<?php 
include "function.php";
include "itemFilters.php";
$tableName = "items";
$db = new DB();
$data = $db->selectItems(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="header">
            <a class="homeButton" href="http://localhost/mysteryGame/">HOME</a>
        </div>
        <div class="content" id="content">
            <div class="searchBar">
                <button class="filterButton" onclick="showFilters();"><img class="filterIcons" src="filter.png" alt=""></button>
            </div>
            <div class="Container">
                <?php foreach($data as $row){ ?>
                    <a class="cases">
                        <div class="caseTitle"><?php echo $row['item_name'] ?></div>
                        <div class="itemDesc">Description: <?php echo $row['item_description'] ?></div>
                        <div class="itemDesc">Function: <?php echo $row['function'] ?></div>
                        <div class="itemDesc">PRICE: <?php echo $row['price'] ?></div>
                        <div class="itemDesc">Availability: <?php echo $row['availability'] ?></div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>