<?php 
include "function.php";
include "caseFilters.php";
$tableName = "cases";
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
            <div class="searchBar">
                <div><input type="text" class="searchBox" id="searchBar"></div>
                <button class="searchButton" id="searchButton"> <img src="search.png" alt=""></button>
                <button class="filterButton" onclick="showFilters();"><img class="filterIcons" src="filter.png" alt=""></button>
            </div>
            <div class="Container">
                <?php foreach($data as $row){ ?>
                    <a class="cases" id="<?php if($row['id']== 1){echo "one";}else{echo "two";}?>" href="caseInfo.php?id=<?php echo $row['id']; ?>">
                        <div class="caseDiff"><?php echo "Difficulty: ".ucfirst($row['difficulty_level']);?></div>
                        <div class="caseTitle"><?php echo ucfirst($row['cases_title']);?></div>
                        <div class="caseDesc"><?php echo ucfirst($row['cases_description']);?></div>
                        <div class="caseDates marginTop10px"><?php echo"Started: ". ($row['start_date']);?></div>
                        <div class="caseDates"><?php echo " Ended: ". ($row['end_date']);?></div> 
                        <div class="caseStatus marginTop10px"><?php if($row['solved']=="yes"){echo "Solved";}else{echo "Unsolved";}?></div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>