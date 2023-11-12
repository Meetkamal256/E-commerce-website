<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All payment</title>
</head>
<style>
    #all_payment_container{
        display: flex;
        flex-direction: column;
        max-width: 650px;
        align-items: center;
        margin: 0 auto 50px auto;
        white-space: nowrap;
    }

    #all_payment_container h1{
        margin-bottom: 5px;
    }
    
    #all_payment_container table thead tr th {
        width: 100%;
        border-collapse: collapse;
        background-color: blue;
        padding: 5px 25px;
        color: #fff;      
    }
    
    #all_payment_container tbody tr td{
        width: 100%;
        background-color: gray;
        color: #fff;
        border-collapse: collapse;
        padding: 5px 25px;
    }

    /* Responsive Design */

    @media(min-width: 768px) and (max-width: 1440px) {
        #all_payment_container{
            margin: 0 auto 50px auto;
        }
    }

    @media(min-width: 577px) and (max-width: 765px){
        #all_payment_container{
            margin: 0 auto 50px 200px;
        }
        
        #all_payment_container table thead tr th,
        #all_payment_container tbody tr td{
            font-size: 15px;
            
        }
        
    }
    
    
    
    @media(min-width: 375px) and (max-width: 576px) {
        #all_payment_container{
            margin: 0 auto 50px 200px;
        }
        
        #all_payment_container table thead tr th,
        #all_payment_container tbody tr td{
            font-size: 15px;
            padding: 5px 15px;
        }
    
    }
    
    @media(max-width: 374px){
        #all_payment_container{
            margin: 0 0 50px 220px;
        }
        
        #all_payment_container table thead tr th,
        #all_payment_container tbody tr td{
            font-size: 15px;
            padding: 5px 10px;
        
        }
    
    }



</style>
<body>
    <div id="all_payment_container">
        <h1>All Payment</h1>
        <table>
            <thead>
                <tr>
                    <th>S1</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Delete</th>
                </tr>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>123456</td>
                        <td>5000</td>
                        <td>Paypal</td>
                        <td>12 oct 1996</td>
                        <td><i class='fa fa-trash'></i></td>
                    </tr>
                </tbody>
            </thead>
        </table>
    </div>
    
</body>
</html>