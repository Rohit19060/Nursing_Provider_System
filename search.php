<?php
require_once("includes/db.php");
$query = "SELECT * from freelancer";
$term = $_REQUEST['q'];
$fname = [];
$name = "";
if ($result = mysqli_query($connection, $query)) {
    $num = mysqli_num_rows($result);
    if ($num) {
        while ($data = mysqli_fetch_assoc($result)) {
            $fname[] = $data["name"];
        }
    }
}
if ($term !== "") {
    $term = strtolower($term);
    $len = strlen($term);
    foreach ($fname as $n) {
        if (stristr($term, substr($n, 0, $len))) {
            if ($name === "") {
                $name = $n;
            }
        }
    }
}
if ($name !== "") {
    $query = "SELECT * from freelancer where `name` = '$name'";
    if ($result = mysqli_query($connection, $query)) {
        $data = mysqli_fetch_assoc($result);
        echo "<div class='hire_table'>  
        <table class='freelancers'>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Hire</th>
        </tr>";
        echo "<tr>";
        echo "<td>" . $data["name"] . "</td>";
        echo "<td>" . $data["email"] . "</td>";
        if ($data["hired"] == 0) {
            echo "<td><a href='hireFreelancer.php?id=" . $data["h_id"] . "'> Hire Me! </a> </td>";
        } else {
            echo "<td>Already Hired</td>";
        }
        echo "</tr>";
        echo "</table></div><br><br>";
    }
} else {
    echo "<div>No Result! Try Different Term</div><br><br>";
}
