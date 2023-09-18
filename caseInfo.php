<?php 
include "function.php";
include "clueFilter.php";
$id = $_GET['id'];
$db = new DB();
$npc  = $db->selectNPC($id);
$clues  = $db->selectClues($id);
$choices = $db->selectChoices($id);
?>
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
            <button class="filterButton" onclick="showFilters();"><img class="filterIcons" src="filter.png" alt=""></button>
            <a class="homeButton" href="http://localhost/mysteryGame/">HOME</a>
        </div>
        <div class="content" id="content">
            <h2>NPC's</h2>
            <div class="caseSection">
                <?php foreach($npc as $row){ ?>
                    <button class="cases" onclick="interactNPC();">
                        <h2><?php echo $row['npc_name'] ?></h2>
                        <h2 class="caseDesc"><?php echo $row['dialogue'] ?></h2>
                        <h2 class="caseDesc"><?php echo $row['alibi'] ?></h2>
                    </button>
                    <!-- <div class="interactNPC"></div> -->
                <?php } ?>
            </div>
            <h2>CLUES</h2>
            <div class="caseSection" id="clues">
                <?php foreach($clues as $row){ ?>
                    <button class="cases">
                        <h2><?php echo $row['location'] ?></h2>
                        <h2 class="caseDesc"><?php echo $row['clue_description'] ?></h2>
                    </button>
                <?php } ?>
            </div>
            <h2>CHOICES</h2>
            <div class="caseSection">
                <?php foreach($choices as $row){ ?>
                    <button class="cases">
                        <h2><?php echo $row['choice_text'] ?></h2>
                        <h2 class="caseDesc"><?php echo $row['outcome'] ?></h2>
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>