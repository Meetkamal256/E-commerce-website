<?php
if (isset($_GET['edit_categories'])) {
    $edit_cat = $_GET['edit_categories'];
    $cat_data = "SELECT * from categories WHERE category_id= $edit_cat";
    $result_cat = mysqli_query($conn, $cat_data);
    $row = mysqli_fetch_assoc($result_cat);
    $category_title = $row['category_title'];
}

if (isset($_POST['update_cat'])) {
    $category_title = $_POST['category_title'];
    echo $category_title;
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
    #edit_cat_container {
        max-width: 650px;
        margin: 0 auto;
        min-height: 100vh;

    }

    form {
        display: flex;
        flex-direction: column;
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

    input[type='text']:focus {
        outline: none;
        border: 2px solid lightblue;
    }

    input[type='submit'] {
        padding: 5px 25px;
        background-color: blue;
        color: #fff;
        cursor: pointer;
        width: 200px;
        margin: 0 auto;
        border: none;
        border-radius: 5px;
    }
    
    input[type='submit']:hover {
        background-color: black;
    }
    
    /* Responsive Styles */
    @media(max-width: 768px) {
        #edit_cat_container {
            margin: 0 30px 50px 30px;
        }
    }
</style>

<body>
    <div id="edit_cat_container">
        <form action="" method='POST'>
            <h1>Edit Category</h1>
            <input type="text" name='category_title' placeholder="Category Title" value="<?php echo $category_title; ?>">
            <input type="submit" name="update_cat" value="Update Category">
        </form>
    </div>

</body>

</html>

<?php
if(isset($_POST['update_cat'])){
    $category_title = $_POST['category_title'];
    // update query
    $update_cat = "UPDATE categories SET category_title= '$category_title' WHERE category_id = $edit_cat";
    $result_update = mysqli_query($conn, $update_cat);
    if($result_update){
        // echo "<script>alert('Category title has been updated successfully')</script>";
        echo "<script>window.open('adminindex.php?view_categories', '_self')</script>";
        
    }
}

?>