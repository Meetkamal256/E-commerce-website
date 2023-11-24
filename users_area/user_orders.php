<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User orders</title>
</head>

<style>
    #order_table {
        max-width: 650px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 auto; 
    }
    
    
    #order_table table thead tr th {
        width: 100%;
        border-collapse: collapse;
        white-space: nowrap;
        background-color: #088178;
        padding: 7px 25px;
        color: #fff;
    }
    
    #order_table table tr td {
        background-color: gray;
        color: #fff;
        padding: 5px 25px;
    }
    
    
    
    /* Responsive styles */
    @media (min-width: 768px) and (max-width: 1280px) {
        #order_table{
            max-width: 100%;
            margin: 0 auto 900px auto;
        }
        
        #order_table table thead tr th ,#order_table table tr td {
            padding: 5px 7px;
        }
    }
    
    @media (min-width: 652px) and (max-width: 1024px) {
        #order_table{
            max-width: 80%;
            margin: 0 auto;
        }
        
        #order_table table thead tr th ,#order_table table tr td {
            padding: 5px 7px;
        }
    }
    
    @media (min-width: 651px) and (max-width: 767px){
        #order_table{
            max-width: 15%;
            margin: 0 auto;
        }
        
        #order_table table thead tr th ,#order_table table tr td {
            padding: 5px 3px;
        }
    } 
    
    @media (min-width: 375px) and (max-width: 650px){
        #order_table{
            max-width: 5%;
            margin: 0 0px 400px 320px;
        }
        
        #order_table table thead tr th ,#order_table table tr td {
            padding: 2px 5px;
        }    
    }
    
    #order_table h3{
        margin: 100px 300px 15px 0px;
    }
    
  
    
    @media (max-width: 374px){
        
        #order_table h3{
            margin-right: 300px;
        }
        
        #order_table{
            max-width: 5%;
            margin: 0 0px 400px 350px;
        }
        
        #order_table table thead tr th ,#order_table table tr td {
            padding: 2px 5px;
        }   
    }
    
    #order_table h3{
        margin: 100px 250px 15px 0px;
    }


    
</style>

<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "SELECT * from user_table WHERE username = '$username'";
    $result = mysqli_query($conn, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    ?>
    <div id="order_table">
        <h3>All my orders</h3>
        <table>
            <thead>
                <tr>
                    <th>Sl no</th>
                    <th>Amount due</th>
                    <th>Total Products</th>
                    <th>Invoice number</th>
                    <th>Date</th>
                    <th>Complete/incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_order_details = "Select * from user_orders WHERE user_id = $user_id";
                $result_orders = mysqli_query($conn, $get_order_details);
                $number = 1;
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $user_id = $row_orders['user_id'];
                    $order_id = $row_orders['order_id'];
                    $amount_due = number_format($row_orders['amount_due']);
                    $invoice_number = $row_orders['invoice_number'];
                    $total_products = $row_orders['total_products'];
                    $order_date = $row_orders['order_date'];
                    $order_status = $row_orders['order_status'];
                    if ($order_status == 'pending') {
                        $order_status = 'Incomplete';
                    } else {
                        $order_status = 'Complete';
                    }
                    echo "<tr>
                    <td>$number</td>
                    <td>&#x20A6; $amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status</td>";
                    
                    if ($order_status == 'Complete') {
                        echo '<td>Paid</td>';
                    } else {
                        echo '<td><a href="confirm_payment.php?order_id=' . $order_id . '">Confirm</a></td></tr>';
                    }
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>