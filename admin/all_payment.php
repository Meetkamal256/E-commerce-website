<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All payment</title>
</head>
<style>
    #all_payment_container {
        display: flex;
        flex-direction: column;
        max-width: 650px;
        align-items: center;
        margin: 0 auto 50px auto;
        white-space: nowrap;
    }

    #all_payment_container h1 {
        margin-bottom: 5px;
    }

    #all_payment_container table thead tr th {
        width: 100%;
        border-collapse: collapse;
        background-color: blue;
        padding: 5px 25px;
        color: #fff;
    }

    #all_payment_container tbody tr td {
        width: 100%;
        background-color: gray;
        color: #fff;
        border-collapse: collapse;
        padding: 5px 25px;
    }

    /* Responsive Design */

    @media(min-width: 768px) and (max-width: 1440px) {
        #all_payment_container {
            margin: 0 auto 50px auto;
        }
    }

    @media(min-width: 577px) and (max-width: 765px) {
        #all_payment_container {
            margin: 0 auto 50px 200px;
        }

        #all_payment_container table thead tr th,
        #all_payment_container tbody tr td {
            font-size: 15px;

        }

    }



    @media(min-width: 375px) and (max-width: 576px) {
        #all_payment_container {
            margin: 0 0 50px 200px;
        }

        #all_payment_container table thead tr th,
        #all_payment_container tbody tr td {
            font-size: 15px;
            padding: 5px 15px;
        }

    }

    @media(max-width: 374px) {
        #all_payment_container {
            margin: 0 0 50px 220px;
        }

        #all_payment_container table thead tr th,
        #all_payment_container tbody tr td {
            font-size: 15px;
            padding: 5px 10px;

        }

    }
</style>

<body>
    <div id="all_payment_container">
        <h1>All Payment</h1>
        <table>
            <?php
            include("../partials/connect.php");
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            $select_payment = "SELECT * FROM user_payment";
            $result_payment = mysqli_query($conn, $select_payment);
            $row_count = mysqli_num_rows($result_payment);
            if ($row_count > 0) {
                echo "<thead>
                <tr>
                    <th>S1 no</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Delete</th>
                </tr>
            <tbody>";
            }
            if ($row_count == 0) {
                echo "<h2>You have no Payments yet</h2>";
            } else {
                $number = 1;
                while ($row = mysqli_fetch_array($result_payment)) {
                    $payment_id = $row['payment_id'];
                    $order_id = $row['order_id'];
                    $invoice_number = $row['invoice_number'];
                    $payment_id = $row['payment_id'];
                    $amount = $row['amount'];
                    $payment_mode = $row['payment_mode'];
                    $date = $row['date'];
                    
                    echo "  <tr>
                    <td>$number</td>
                    <td>$invoice_number</td>
                    <td>$amount</td>
                    <td>$payment_mode</td>
                    <td>$date</td>
                    <td><a href='adminindex.php?delete_payment=$payment_id'><i class='fa fa-trash'></i></a></td>
                </tr>
                </tbody>
                </thead>";
                    $number++;
                }
            }
            ?>
        </table>
    </div>

</body>

</html>