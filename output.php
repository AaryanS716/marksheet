<!DOCTYPE html>
<html>
<head>
    <title>Marksheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        section {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: #f2f2f2;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #22c55e;
            color: white;
        }
        .fail {
            color: red;
        }
        .pass {
            color: green;
        }
    </style>
</head>
<body>

    <section>
        <h2 style="text-align:center;">Student Details</h2>
        <p><strong>First Name:</strong> <?php echo $_POST['fname']; ?></p>
        <p><strong>Last Name:</strong> <?php echo $_POST['lname']; ?></p>
        <p><strong>Roll No:</strong> <?php echo $_POST['roll_no']; ?></p>
        <p><strong>Year:</strong> <?php echo $_POST['year']; ?></p>
        <p><strong>Semester:</strong> <?php echo $_POST['semester']; ?></p>
    </section>

    <section>
        <h2 style="text-align:center;">Subject Details</h2>

        <?php
            $subjects = [
                "Operating System" => $_POST['os'],
                "Programming in C" => $_POST['ps'],
                "RDBMS" => $_POST['rdbms'],
                "AEC" => $_POST['aec'],
                "SEC" => $_POST['sec']
            ];

            $total = 0;
            $hasFailed = false;

            echo "<table>";
            echo "<tr><th>Subject</th><th>Obtained Marks</th><th>Total Marks</th><th>Grade</th></tr>";

            foreach ($subjects as $subject => $marks) {
                $marks = intval($marks);
                $grade = ($marks >= 33) ? "Pass" : "Fail";
                $gradeClass = ($marks >= 33) ? "pass" : "fail";

                if ($marks < 33) {
                    $hasFailed = true;
                }

                echo "<tr>";
                echo "<td>$subject</td>";
                echo "<td>$marks</td>";
                echo "<td>100</td>";
                echo "<td class='$gradeClass'>$grade</td>";
                echo "</tr>";

                $total += $marks;
            }

            $percentage = $total / 5;
            $result = $hasFailed ? "Fail" : "Pass";

            echo "</table>";

            echo "<p><strong>Total Marks:</strong> $total</p>";
            echo "<p><strong>Percentage:</strong> " . number_format($percentage, 1) . "%</p>";
            echo "<p><strong>Result:</strong> $result</p>";
        ?>
    </section>

</body>
</html>
