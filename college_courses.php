<?php
session_start();
include('db_config.php');

// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root"; 
$password = "";      
$dbname = "college_courses"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10; 
$offset = ($page - 1) * $records_per_page;

$table = isset($_GET['table']) ? $_GET['table'] : 'first_year_first_semester';

$valid_tables = [
    'first_year_first_semester', 'first_year_second_semester', 
    'second_year_first_semester', 'second_year_second_semester', 
    'third_year_first_semester', 'third_year_second_semester', 
    'fourth_year_first_semester', 'fourth_year_second_semester'
];

if (!in_array($table, $valid_tables)) {
    die("Invalid table selection.");
}

function formatTableName($tableName) {
    $map = [
        'first' => '1st', 'second' => '2nd', 
        'third' => '3rd', 'fourth' => '4th'
    ];
    $parts = explode('_', $tableName);
    $year = isset($map[$parts[0]]) ? $map[$parts[0]] . ' Year' : $parts[0];
    $semester = ucfirst($parts[2]) . ' Semester';
    return "$year, $semester";
}

// Get total earned units for all records across all tables
$grand_total_earned_units = 0;
foreach ($valid_tables as $current_table) {
    $sql_total_earned_units = "SELECT SUM(earned_units) AS total_earned_units FROM $current_table";
    $total_earned_units_result = $conn->query($sql_total_earned_units);
    $total_earned_units_row = $total_earned_units_result->fetch_assoc();
    $grand_total_earned_units += $total_earned_units_row['total_earned_units'];
}

$sql_total = "SELECT COUNT(*) AS total FROM $table";
$total_result = $conn->query($sql_total);
$total_row = $total_result->fetch_assoc();
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $records_per_page);

$current_table_index = array_search($table, $valid_tables);

$next_table = $table;
$next_page = $page + 1;

if ($page == $total_pages && $current_table_index < count($valid_tables) - 1) {
    $next_table = $valid_tables[$current_table_index + 1];
    $next_page = 1;
}

$prev_table = $table;
$prev_page = $page - 1;

if ($page == 1 && $current_table_index > 0) {
    $prev_table = $valid_tables[$current_table_index - 1];
    $sql_prev_total = "SELECT COUNT(*) AS total FROM $prev_table";
    $prev_result = $conn->query($sql_prev_total);
    $prev_row = $prev_result->fetch_assoc();
    $prev_total_records = $prev_row['total'];
    $prev_page = ceil($prev_total_records / $records_per_page);
}

$sql = "SELECT * FROM $table LIMIT $offset, $records_per_page"; 
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .logout-container {
            text-align: right;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
        }
        .logout-container a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid white;
            border-radius: 5px;
            padding: 5px 10px;
        }
        .logout-container a:hover {
            background-color: #0056b3;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .pagination-container {
            text-align: center;
            margin-top: 20px;
        }
        .pagination-container a {
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        .pagination-container a:hover {
            background-color: #0056b3;
        }
        .pagination-container .active {
            background-color: #0056b3;
            font-weight: bold;
        }
        .pagination-container .disabled {
            background-color: #dcdcdc;
            cursor: not-allowed;
        }
        .total-earned-units {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="logout-container">
    <a href="logout.php">Logout</a>
</div>

<h1><?php echo formatTableName($table); ?></h1>

<?php
if ($result->num_rows > 0) {
    echo "<table><tr><th>Course Code</th><th>Course Title</th><th>Credit Units</th><th>Grade</th><th>Earned Units</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .
        $row["course_code"] . "</td><td>" .
        $row["course_title"] . "</td><td>" . 
        $row["credit_units"] . "</td><td>" .
        $row["grade"] . "</td><td>" .
        $row["earned_units"] . "</td></tr>";
    }
   
    echo "</table>";
} else {
    echo "<p style='text-align:center;'>No courses found</p>";
}
?>

<div class="pagination-container">
    <!-- Previous Button -->
    <?php if ($page > 1 || $current_table_index > 0): ?>
        <a href="?table=<?php echo $prev_table; ?>&page=<?php echo $prev_page; ?>">Previous</a>
    <?php else: ?>
        <span class="disabled">Previous</span>
    <?php endif; ?>

    <!-- Next Button -->
    <?php if ($page < $total_pages || $current_table_index < count($valid_tables) - 1): ?>
        <a href="?table=<?php echo $next_table; ?>&page=<?php echo $next_page; ?>">Next</a>
    <?php else: ?>
        <span class="disabled">Next</span>
    <?php endif; ?>

    <div class="total-earned-units">
    Grand Total Earned Units: <?php echo $grand_total_earned_units; ?>
    </div>
</div>

</body>
</html>
