<?php
require_once "../data.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};


function updateNewest($conn, $state){
    
    $data = 'SELECT * FROM turns ORDER BY id DESC LIMIT 1';
    $result = mysqli_query($conn, $data);
    if (!$result) {
        die ('SQL Error: ' . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    $target = $row["target"];
    $source = $row["source"];
    if($state == "1") {return $source;}
    else {return $target;};
}

$source = updateNewest($conn, "1");
$target = updateNewest($conn, "2");

?>

<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>test chess - E-CHESS</title>
<link rel="shortcut icon" href="../echess.png">
<link rel="icon" type="image/png" href="../echess.svg">
<link rel="image_src" href="../echess.svg" />
<link rel="apple-touch-icon" href="../echess.png" />
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
<meta name="description" content="The CV of Jan Schneider, currently IoT student at HfG Schwäbisch Gmünd"> 
<meta name="keywords" content="Jan Schneider, HfG, IoT, Internet der Dinge, Student, Hochschule für Gestaltung, Schwäbisch Gmünd, Gmünd, Internet of Things, Bachelor of Arts, Kikife, Kulturbüro, FSJ, Jan-Patrick, Jan, Schneider">
<link rel="stylesheet" href="lib/chessboardjs/css/chessboard-0.3.0.css">
<link rel="stylesheet" href="style.css">
<head>
</head>
<body>
    <p><a href="https://www.jan-patrick.de/e-chess">to CHESS page</a></p>
    <div id="board" class="board"></div>
        <div class="info">
            Search depth:
            <select id="search-depth">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3" selected>3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <br>
            <span>Positions evaluated: <span id="position-count"></span></span>
            <br>
            <span>Time: <span id="time"></span></span>
            <br>
            <span>Positions/s: <span id="positions-per-s"></span> </span>
            <br>
            <button onclick="updateByCode()">A2 - A4</button>
            <button onclick="updateByDatabase()">update</button>
            <button onclick="showBestMove()">show best move</button>
            <button id="notificationbutton">best move Notification</button>
            <br>
            <div id="move-history" class="move-history"></div>    
        </div>

    <script> 
    function getVariables1(){ 
        var source = <? echo json_encode($source); ?>;  
        return source;
    };
    function getVariables2(){ 
        var target = <? echo json_encode($target); ?>;  
        return target;
    };  
    </script>
    <!--<script src="variables_js.php"></script>-->
    <script src="lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="lib/chessboardjs/js/chess.js"></script>
    <script src="lib/chessboardjs/js/chessboard-0.3.0.js"></script>
    <script src="script.js"></script>
    
    


</body>
</html>