<?php 
include "function.php";
include "playerFilters.php";
$tableName = "player";
$db = new DB();
$data = $db->selectData2($tableName); ?>
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
                <button class="filterButton" onclick="showFilters();"><img class="filterIcons" src="filter.png" alt=""></button>

            <div class="Container">
                <?php foreach($data as $row){ ?>
                    <a class="cases">
                        <div class="caseDiff"><?php echo "Rank: ".ucfirst($row['detective_rank']);?></div>
                        <div class="caseTitle"><?php echo ucfirst($row['username']);?></div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>