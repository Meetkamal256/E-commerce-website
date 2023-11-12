<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All payment</title>
</head>
<style>
    #all_users_container {
        display: flex;
        flex-direction: column;
        max-width: 650px;
        align-items: center;
        margin: 0 auto 50px auto;
        white-space: nowrap;
    }

    #all_users_container h1 {
        margin-bottom: 5px;
    }

    #all_users_container table thead tr th {
        width: 100%;
        border-collapse: collapse;
        background-color: blue;
        padding: 5px 25px;
        color: #fff;
    }

    #all_users_container tbody tr td {
        width: 100%;
        background-color: gray;
        color: #fff;
        border-collapse: collapse;
        padding: 5px 25px;
    }

    .user_image{
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    /* Responsive Design */

    @media(min-width: 768px) and (max-width: 1440px) {
        #all_users_container {
            margin: 0 auto 50px 300px;
        }

        #all_users_container table thead tr th,
        #all_users_container tbody tr td{
            padding: 5px 15px;
        }


    }
    
    @media(min-width: 577px) and (max-width: 765px) {
        #all_users_container {
            margin: 0 auto 50px 400px;
        }

        #all_users_container table thead tr th,
        #all_users_container tbody tr td {
            font-size: 15px;
            padding: 7px;

        }
    
    }
    
    @media(min-width: 375px) and (max-width: 576px) {
        #all_users_container {
            margin: 0 0 50px 400px;
        }
        
        #all_users_container table thead tr th,
        #all_users_container tbody tr td {
            font-size: 15px;
            padding: 7px;
        }
    
    }
    
    @media(max-width: 374px) {
        #all_users_container {
            margin: 0 0 50px 260px;
        }
        
        #all_users_container table thead tr th,
        #all_users_container tbody tr td {
            font-size: 15px;
            padding: 3px 10px;

        }
    
    }
</style>

<body>
    <div id="all_users_container">
        <?php
        include("../partials/connect.php");
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        $select_users = "SELECT * FROM user_table";
        $result_users = mysqli_query($conn, $select_users);
        $row_count = mysqli_num_rows($result_users);
        if ($row_count > 0) {
            echo "
                <h1>All Users</h1>
                <table>
                <thead>
                <tr>
                    <th>S1 no</th>
                    <th>Username</th>
                    <th>User Email</th>
                    <th>User Image</th>
                    <th>User Address</th>
                    <th>User Mobile</th>
                    <th>Delete</th>
                </tr>
            <tbody>";
        }
        if ($row_count == 0) {
            echo "<h2 style='background-color: red; color: #fff; text-align: center; margin: 50px auto 0 auto; width: 100%'>You have no Payments yet</h2>";
        } else {
            $number = 1;
            while ($row = mysqli_fetch_array($result_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $user_address = $row['user_address'];
                $user_mobile = $row['user_mobile'];
                
                echo "<tr>
                    <td>$number</td>
                    <td>$username</td>
                    <td>$user_email</td>
                    <td><img src='../product_images/$user_image' class='user_image' alt='$username'></td>
                    <td>$user_address</td>
                    <td>$user_mobile</td>
                    <td><a href='adminindex.php?list_users=$user_id'><i class='fa fa-trash'></i></a></td>
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