<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All orders</title>
</head>
<style>
    #all_orders_container {
        max-width: 650px;
        display: flex;
        flex-direction: column;
        margin: 0 auto;
    }
    
    #all_orders_container table thead tr th{
        background-color: blue;
        padding: 7px 25px;
        white-space: nowrap;
        color: #fff;
    }
    
    #all_orders_container tbody tr td{
        background-color: gray;
        padding: 7px 25px;
        color: #fff;
    }

    #all_orders_container tbody tr td i{
        color: #fff;
    }


</style>

<body>
    <div id="all_orders_container">
        <h1>All Orders</h1>
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
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1000</td>
                    <td>2341290000</td>
                    <td>4</td>
                    <td>12-0ct-2021</td>
                    <td>Complete</td>
                    <td><a href=''><i class='fa fa-trash'></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>