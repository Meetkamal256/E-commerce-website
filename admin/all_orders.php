<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All orders</title>
    <style>
        #all_orders_container {
            max-width: 850px;
            display: flex;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0 auto;
        }
        
        #all_orders_container h1 {
            margin-bottom: 5px;
            font-size: 24px;
        }
        
        
        #all_orders_container table thead tr th {
            width: 100%;
            border-collapse: collapse;
            background-color: blue;
            padding: 5px 25px;
            white-space: nowrap;
            color: #fff;
            margin: 0 auto;
        }
        
        #all_orders_container tbody tr td {
            width: 100%;
            background-color: gray;
            padding: 5px 25px;
            color: #fff;
           
        }

        #all_orders_container tbody tr td i {
            color: #fff;
        }

        /* Responsive Styles */

        @media(min-width: 876px) and (max-width: 1024px) {
            #all_orders_container {
                max-width: 450px;
                margin: 0px auto;
            }

            #all_orders_container h1 {
                font-size: 22px;
                margin-bottom: 5px;

            }

            #all_orders_container table thead tr th,
            #all_orders_container tbody tr td {
                padding: 5px 20px;
            }

        }

        @media(min-width: 646px) and (max-width: 875px) {
            #all_orders_container {
                max-width: 350px;
                margin: 0 0px 50px 180px;
            }

            #all_orders_container h1 {
                font-size: 22px;
                margin-bottom: 5px;

            }

            #all_orders_container table thead tr th,
            #all_orders_container tbody tr td {
                padding: 5px 12px;
                font-size: 15px;
            }

        }
        
        @media(min-width: 375px) and (max-width: 645px) {
            #all_orders_container {
                width: 100%;
                padding: 0px 0px 50px 200px;
            }
            
            #all_orders_container h1 {
                font-size: 20px;
                margin-bottom: 5px;
            }
         
            #all_orders_container h2 {
                font-size: 20px;
                white-space: nowrap;
            } 
            
            #all_orders_container table thead tr th,
            #all_orders_container tbody tr td {
                padding: 4px 7px;
                font-size: 15px;
            }
        }
        
        @media(max-width: 374px) {
            #all_orders_container {
                padding: 0 0px 50px 200px;
            }
            
            #all_orders_container h1 {
                font-size: 20px;
                margin-bottom: 5px;
            
            }
            
            #all_orders_container h2 {
                font-size: 20px;
                white-space: nowrap;
            } 
            
            #all_orders_container table thead tr th,
            #all_orders_container tbody tr td {
                padding: 4px;
                font-size: 14px;
            }
        
        }
    </style>
</head>

<body>
    <div id="all_orders_container">
        <?php
        include("../partials/connect.php");
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $select_orders = "SELECT * FROM user_orders";
        $result_orders = mysqli_query($conn, $select_orders);
        $num_rows = mysqli_num_rows($result_orders);
        // only if number of rows is greater than 0 display the table head
        if ($num_rows > 0) {
            echo "<h1>All Orders</h1>
                    <table>
                        <thead>
                    <tr>
                    <th>Sl</th>
                    <th>Amount Due</th>
                    <th>Invoice Number</th>
                    <th>Total Products</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>";
        }
        // if number of rows equal to zero display h2 element instead
        if ($num_rows == 0) {
            echo "<h2 style='color: #fff; background-color: red; width: 100%; margin: 70px auto 0 auto;'>No orders yet</h2>";
        } else {
            // use a while loop to fetch all the column data from database and display dynamic data
            $number = 1;
            while ($row = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row['order_id'];
                $user_id = $row['user_id'];
                $amount_due = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $order_status = $row['order_status'];
                
                echo "   <tr>
                    <td>$number</td>
                    <td>&#x20A6; " . number_format($amount_due) . "</td>
                    <td>$invoice_number</td>
                    <td>$total_products</td>
                    <td>$order_date</td>
                    <td>$order_status</td>
                    <td><a href='adminindex.php?delete_orders=$order_id'><i class='fa fa-trash'></i></a></td>
                </tr>
                </tbody>";
                $number++;
            }
        }
        ?>
        </table>
    </div>
</body>
</html>

