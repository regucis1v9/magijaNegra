<?php 
include "function.php";
include "characterFilter.php";
$tableName = "character";
$db = new DB();
$data = $db->selectCharacter(); ?>
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
            <button class="filterButton" onclick="showFilters();"><img class="filterIcons" src="filter.png" alt=""></button>
        </div>
        <div class="content" id="content">
            <div class="Container">
                <?php foreach($data as $row){ ?>
                    <button class="cases" id="<?php ?>">
                        <h2><?php echo $row['character_name']; ?></h2>
                        <div class="caseDesc"> <?php echo $row['personality_traits']; ?></div>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>