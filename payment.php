<?php
include_once("functions/common_functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
</head>
<style>

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #container {
        margin: 0 0px 0px 100px;
    }
    
    h1 {
        text-align: center;
        color: lightskyblue;
        font-size: 25px;
        
    }

    h2{
        font-size: 25px;
    }
    
    
    
    .payment {
        display: flex;
        align-items: center;
    }
    
    .img-container {
        width: 450px;
        margin-top: 50px;
    }
    
    img {
        width: 100%;
        /* margin: auto; */
    
    }
    
    .pay-offline {
        margin-left: 40px;
    }
    
    
    /* Responsive styles */
    
    @media (max-width: 576px) {
        #container {
            margin: 0 0px 0px 20px;
        }
        
        .img-container {
            width: 350px;
        }
        
        .pay-offline {
            margin-left: 20px;
        }
    
    }
</style>

<body>
    <?php
        $user_ip=getIpAddress(); 
        $get_user = "SELECT * from user_table WHERE user_ip = '$user_ip'";
        $result = mysqli_query($conn, $get_user);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];
        
     ?>
       
     <h1>Payment Options</h1>
        <div id="container">
            <div class="payment">
                <div class="img-container">
                    <img src="img/payment.jpg" alt="">
                </div>
                <div class="pay-offline">
                    <a href="users_area/order.php?user_id=<?php echo $user_id ?>">
                        <h2>Pay Offline</h2>
                    </a>
                </div>
            </div>
        </div>
</body>

</html>