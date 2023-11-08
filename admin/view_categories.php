<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <script src="https://kit.fontawesome.com/dacccb715c.js" crossorigin="anonymous"></script>
</head>
<style>
    /* #category_container h1{
        margin-top: 50px;
    } */
    
    #category_container {
        max-width: 850px;
        display: flex;
        flex-direction: column;
        margin: 50px auto;
        min-height: 100vh;
    }
    
    #category_container table thead tr th {
        background-color: blue;
        color: #fff;
        padding: 7px 25px;
        border-collapse: collapse;
        white-space: nowrap;        
        font-size: 16px;
    }
    
    #category_container tbody tr td {
        background-color: gray;
        padding: 7px 25px;
        color: #ffff;
    }
    
    #category_container tbody tr td i{
        color: #fff;
    }
    
    /* Responsive styles */
    @media(max-width: 899px){
        #category_container{
            margin: 50px 30px 50px 30px;
        }
    }
    
    @media(min-width: 576px) and (max-width: 898px){
        #category_container table thead tr th,   #category_container tbody tr td{
            padding: 5px 15px;
            font-size: 15px;
        }
        
    }
    
    @media(min-width: 399px) and (max-width: 575px){
        #category_container table thead tr th,   #category_container tbody tr td{
            padding: 5px 20px;
            font-size: 14px;
        }
        
    }
    
    @media(max-width: 398px){
        #category_container {
            margin: 50px 20px 50px 20px;
        }
        #category_container table thead tr th,   #category_container tbody tr td{
            padding: 5px 12px;
            font-size: 13px;
        }
        
    }


</style>

<body>
    <div id="category_container">
        <h1>All Categories</h1>
        <table>
            <thead>
                <tr>
                    <th>Sl no</th>
                    <th>Category Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Shirt</td>
                    <td><a href="#"><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href="#"><i class='fa-solid fa-trash'></i></a></td>
                </tr>
            </tbody>
            
            </thead>
        </table>
    </div>

</body>

</html>