<?php
class DB {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    public $conn;

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "mystergame";

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }else{

        }
    }

    public function selectData2($table) {
        $query = "SELECT * FROM `$table`";
        $sql = $query;
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function selectCase($id) {
        $query = "SELECT * FROM `cases` WHERE `id` = $id";
        $sql = $query;
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function searchCases($search) {
        $sql = "SELECT * FROM `cases` WHERE cases_description LIKE '%$search%'";
        $result = $this->conn->query($sql);
    
        if (!$result) {
            die("Query failed: " . $this->conn->error);
        }    
        $data = array(); 
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; 
        }   
        echo json_encode($data);
    }
    public function searchByDifficulty($difficulty){
        $sql = "SELECT * FROM `cases` WHERE difficulty_level = '$difficulty'";
        $result = $this->conn->query($sql);
    
        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array(); 
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; 
        }   
        echo json_encode($data);
    }
    public function searchByStatus($solved){
        $sql = "SELECT * FROM `cases` WHERE solved = '$solved'";
        $result = $this->conn->query($sql);
    
        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array(); 
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; 
        }   
        echo json_encode($data);
    }
    public function searchByDate($startDateMin, $startDateMax) {
        if ($startDateMin != '' && $startDateMax != '') {
            $sql = "SELECT * FROM `cases` WHERE `start_date` BETWEEN '$startDateMin' AND '$startDateMax'";
        } elseif (isset($startDateMin)) {
            $sql = "SELECT * FROM `cases` WHERE `start_date` > '$startDateMin'";
        } elseif (isset($startDateMax)) {
            $sql = "SELECT * FROM `cases` WHERE `start_date` < '$startDateMax'";
        }
    
        $result = $this->conn->query($sql);
    
        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function selectNPC($id){
        $sql = "SELECT `npc_name`, `dialogue`, `alibi` FROM `npc` WHERE `cases_id` = $id AND `role`='citizen' AND alibi IS NOT NULL";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function selectClues($id){
        
        $sql = "SELECT `clue_description`, `location` FROM `clues` WHERE `case_id` = $id";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function filterClues($importance){

        $sql = "SELECT `clue_description`, `location` FROM `clues` WHERE importance_level = '$importance'";
        $result = $this->conn->query($sql);

        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function filterCharacters($job, $length){

        $sql = "SELECT `character_name` FROM `character` WHERE appearance = '$job' AND CHAR_LENGTH(backstory) > $length";
        $result = $this->conn->query($sql);

        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function selectItems(){
        $sql = "SELECT * FROM `items` WHERE `availability` = 'available'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function filterItemMinPrice($minPrice){
        $sql = "SELECT * FROM `items` WHERE `price` >= '$minPrice' AND `availability` = 'available'";
        $result = $this->conn->query($sql);
    
        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function filterItemMaxPrice($maxPrice){
        $sql = "SELECT * FROM `items` WHERE `price` <= '$maxPrice'  AND `availability` = 'available'";
        $result = $this->conn->query($sql);
    
        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    public function selectChoices($id){
        $sql = "SELECT `choice_text`, `outcome` FROM choices WHERE `case_id` = $id";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function selectCharacter(){
        $sql = "SELECT `character_name`, `personality_traits` FROM `character` WHERE CHAR_LENGTH(personality_traits) > 2";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            return array();
        }
    }
    public function filterPlayerRank($rank){
        $sql = "SELECT * FROM `player` WHERE `detective_rank` = '$rank' AND `experience_points` >= 1";
        $result = $this->conn->query($sql);
        if (!$result) {
            die("SQL Error: " . $this->conn->error);
        }
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);

    }
    
}
$db = new DB();

if (isset($_POST['searchQuery'])) {
    $searchQuery = $_POST['searchQuery'];
    $results = $db->searchCases($searchQuery);
}
if(isset($_POST['difficulty'])){
    $difficulty = $_POST['difficulty'];
    $results = $db->searchByDifficulty($difficulty);
}
if(isset($_POST['solved'])){
    $solved = $_POST['solved'];
    $results = $db->searchByStatus($solved);
}
if (isset($_POST['startDateMin']) || isset($_POST['startDateMax'])) {
    $startDateMin = $_POST['startDateMin'];
    $startDateMax = $_POST['startDateMax'];
    $results = $db->searchByDate($startDateMin, $startDateMax);
}
if(isset($_POST['minPrice']) || isset($_POST['maxPrice'])){
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    if(isset($_POST['minPrice']) && $_POST['maxPrice'] == ""){
        $results = $db->filterItemMinPrice($minPrice);
    }else{
        $results = $db->filterItemMaxPrice($maxPrice);
    }
}
if(isset($_POST['importance'])){
    $importance = $_POST['importance'];
    $results = $db->filterClues($importance);
}
if(isset($_POST['job'])){
    $job = $_POST['job'];
    $length = $_POST['length'];
    $results = $db->filterCharacters($job, $length);
}
if(isset($_POST['rank'])){
    $rank = $_POST['rank'];
    $results = $db->filterPlayerRank($rank);
}