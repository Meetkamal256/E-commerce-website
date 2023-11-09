<?
if (isset($_GET['edit_categories'])) {
    $edit_cat = $_GET['edit_categories'];
    echo $edit_cat;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Categories</title>
</head>
<style>
    form {
        display: flex;
        flex-direction: column;
        max-width: 650px;
        margin: 0 auto
    }
    
    form h1 {
        margin-top: 50px;
    }
    
    input[type='text'] {
        width: 100%;
        padding: 7px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    
    }
    
    input[type='text']:focus{
        outline: none;
        border: 2px solid lightblue;
    }

    input[type='submit']{
        padding: 5px 25px;
        background-color: blue;
        color: #fff;
        cursor: pointer;
        width: 250px;
        margin: 0 auto;
    }

    input[type='submit']:hover{
        background-color: black;
    }

    /* Responsive Styles */
    @media(max-width: 768px){
        form{
            margin: 0 30px 50px 30px;
        }
    }
</style>

<body>
    <form action="" method='POST'>
        <h1>Edit Category</h1>
        <input type="text" name='category_title' placeholder="Category Title">
        <input type="submit" name="update_cat" value="Update Category">
    </form>

</body>

</html>