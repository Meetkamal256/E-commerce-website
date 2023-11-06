<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    // echo $edit_id;
    $data = "SELECT * from products WHERE product_id= $edit_id";
    $result = mysqli_query($conn, $data);
    $row = mysqli_fetch_array($result);
    $product_title = $row['product_title'];
    $product_price = $row['product_price'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_image4 = $row['product_image4'];
    $product_description = $row['product_description'];
    $category_id = $row['category_id'];

    // fetching category name
    $select_category = "SELECT * from categories WHERE category_id= $category_id";
    $result_category = mysqli_query($conn, $select_category);
    $row_category = mysqli_fetch_array($result_category);
    $category_title = $row_category['category_title'];
    // echo $category_title;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
</head>
<style>
    #edit_pro_container {
        max-width: 650px;
        margin: 50px auto;
        min-height: 100vh;
    }

    #edit_pro_container h1 {
        margin-top: 50px;
    }

    label {
        display: block;
        text-align: left;
        margin-bottom: 10px;
        color: blue;
    }

    input[type='text'],
    input[type='file'],
    select,
    textarea {
        width: 100%;
        padding: 7px;
        border-radius: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
    }

    input[type='text']:focus,
    input[type='file']:focus,
    select:focus,
    textarea:focus {
        outline: none;
        border: 2px solid #c0f7fb;
    }

    input[type='submit'] {
        width: 100%;
        padding: 7px;
        background-color: blue;
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type='submit']:hover {
        background-color: #010729;
    }

    .image {
        width: 50px;
        height: 50px;
        object-fit: contain;
        margin-left: 10px;
        margin-bottom: 5px;
    }

    /* Responsive styles */

    @media(max-width: 1280px) {
        #edit_pro_container {
            margin: 50px auto 800px auto;
        }
    }



    @media(max-width: 899px) {
        #edit_pro_container {
            margin: 50px 30px 400px 30px;
        }
    }
</style>

<body>
    <div id='edit_pro_container'>
        <form action='' method='POST' enctype='multipart/form-data'>
            <h1>Edit Products</h1>
            <div>
                <label for="product_tile">Product Title</label>
                <input type="text" name='product_title' placeholder='Update Product Title' required='required' value="<?php echo $product_title ?>">
            </div>
            <div>
                <label for="product_price">Product Price</label>
                <input type="text" name='product_price' placeholder='Update Product Price' required='required' value="<?php echo "&#x20A6; " . number_format($product_price); ?>">
            </div>
            <div style='display: flex'>
                <label for="product_image1">Product image 1</label>
                <input type="file" name='product_image1' required='required'>
                <img src="../product_images/<?php echo $product_image1 ?>" alt="" class="image">
            </div>
            <div style='display: flex'>
                <label for="product_image2">Product image 2</label>
                <input type="file" name='product_image2' required='required'>
                <img src="../product_images/<?php echo $product_image2 ?>" alt="" class="image">
            </div>
            <div style='display: flex'>
                <label for="product_image3">Product image 3</label>
                <input type="file" name='product_image3' required='required'>
                <img src="../product_images/<?php echo $product_image3 ?>" alt="" class="image">
            </div>
            <div style='display: flex'>
                <label for="product_image4">Product image 4</label>
                <input type="file" name='product_image4' required='required'>
                <img src="../product_images/<?php echo $product_image4 ?>" alt="" class="image">
            </div>
            <div>
                <select name='edit_category'>
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                    <?php
                    $select_cat_all = "SELECT * from categories";
                    $result_cat_all = mysqli_query($conn, $select_cat_all);
                    while ($row_cat = mysqli_fetch_assoc($result_cat_all)) {
                        $category_title = $row_cat['category_title'];
                        $category_id = $row_cat['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <!-- Display the variable value for debugging -->
                <!-- <?php echo "Value of product_description: " . $product_description; ?> -->
                <label for="description">Product Description</label>
                <textarea name="product_description" cols="30" rows="10"><?php echo $product_description ?></textarea>
            </div>
            <div>
                <input type="submit" name="edit_products" value="Update">
            </div>
        </form>
    </div>
</body>
</html>