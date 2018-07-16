<?php
session_start();
include('sql.php');
error_reporting(E_ALL ^ E_NOTICE);
if (!isset($_SESSION["user_id"])) {
    ?>
    <script language="javascript">
        window.location = 'index.php';
    </script>
    <?php
}
if ($_POST['Month']) {
    $obj = new sql();
    $uid = $_SESSION["user_id"];
    $month_val = $_POST['Month'];
    $year_val = $_POST['year2'];
    $query = $obj->fetch_monthly($uid, $month_val, $year_val);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Expense</title>
        <style type="text/css">
            body {
                font-size: 15px;
                color: #343d44;
                font-family: "segoe-ui", "open-sans", tahoma, arial;
                padding: 0;
                margin: 0;
            }
            table {
                margin: auto;
                font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
                font-size: 12px;
            }

            h1 {
                margin: 25px auto 0;
                text-align: center;
                text-transform: uppercase;
                font-size: 17px;
            }

            table td {
                transition: all .5s;
            }

            /* Table */
            .data-table {
                border-collapse: collapse;
                font-size: 14px;
                min-width: 537px;
            }

            .data-table th, 
            .data-table td {
                border: 1px solid #e1edff;
                padding: 7px 17px;
            }
            .data-table caption {
                margin: 7px;
            }

            /* Table Header */
            .data-table thead th {
                background-color: #508abb;
                color: #FFFFFF;
                border-color: #6ea1cc !important;
                text-transform: uppercase;
            }

            /* Table Body */
            .data-table tbody td {
                color: #353535;
            }
            .data-table tbody td:first-child,
            .data-table tbody td:nth-child(4),
            .data-table tbody td:last-child {
                text-align: right;
            }

            .data-table tbody tr:nth-child(odd) td {
                background-color: #f4fbff;
            }
            .data-table tbody tr:hover td {
                background-color: #ffffa2;
                border-color: #ffff0f;
            }

            /* Table Footer */
            .data-table tfoot th {
                background-color: #e5f5ff;
                text-align: right;
            }
            .data-table tfoot th:first-child {
                text-align: left;
            }
            .data-table tbody td:empty
            {
                background-color: #ffcccc;
            }
            a.button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php
        if (0 === mysqli_num_rows($query)) {
            ?>
            <h3>No data found for the given Month & Year!!!</h3>
            <a href="home.php" class="button">Close</a>
    <?php
} else {
    ?>
            <a href="home.php" class="button">Close</a>
            <table class="data-table">
                <caption class="title">Expense Data For The Given Month & Year</caption>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Expense Type</th>
                        <th>Date</th>
                        <th>AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    $no = 1;
    $total = 0;
    while ($row = mysqli_fetch_array($query)) {
        $amount = $row['amount'] == 0 ? '' : number_format($row['amount']);
        echo '<tr>
					<td>' . $no . '</td>
					<td>' . $row['category'] . '</td>
					<td>' . $row['exp_date'] . '</td>
					<td>' . $amount . '</td>
				</tr>';
        $total += $row['amount'];
        $no++;
    }
    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">TOTAL</th>
                        <th><?= number_format($total) ?></th>
                    </tr>
                </tfoot>
            </table>
    <?php
}
?>
    </body>
</html>