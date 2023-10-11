<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
</head>
<style>
    
    #container{
        margin: 0 100px;
    }
    
    h2{
        text-align: center;
        color: lightskyblue;
        font-size: 24px;
    }
    
    .img-container{
        width: 550px;
        margin-right: 100px;
    }
    img{
        width: 100%;
    }
    
    .payment{
        display: flex;
        align-items: center;
    }
    
    /* Responsive styles */
    
    @media (max-width: 576px){
        #container{
            margin: 100px 30px;
        }
        
        .img-container{
        width: 350px;
        margin-right: 50px;
    }
    }
</style>
<body>
<h2>Payment Options</h2>
    <div id="container">
    <div class="payment">
    <div class="img-container">
    <img src="img/payment.jpg" alt="">
    </div>
    <div class="pay-offline">
        <a href="">Pay Offline</a>
    </div>
    </div>
    </div>
   
</body>
</html>