<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All orders</title>
    <style>
        #all_orders_container {
            max-width: 650px;
            display: flex;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0 auto;
        }

        #all_orders_container h1{
            margin-bottom: 5px;
            font-size: 24px;
        }


        #all_orders_container table thead tr th {
            width: 100%;
            border-collapse: collapse;
            background-color: blue;
            padding: 7px 25px;
            white-space: nowrap;
            color: #fff;
            margin: 0 auto;
        }

        #all_orders_container tbody tr td {
            width: 100%;
            background-color: gray;
            padding: 7px 25px;
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
                max-width: 250px;
                margin: 0 0px 50px 200px;
            }
            
            #all_orders_container h1 {
                font-size: 20px;
                margin-bottom: 5px;
                
            }
            
            #all_orders_container table thead tr th,
            #all_orders_container tbody tr td {
                padding: 4px 7px;
                font-size: 15px;
            }
        }
        
        @media(max-width: 374px) {
            #all_orders_container {
                max-width: 250px;
                margin: 0 0px 50px 210px;
            }
            
            #all_orders_container h1 {
                font-size: 20px;
                margin-bottom: 5px;
                
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