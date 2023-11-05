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
                <input type="text" name='product_title' placeholder='Update Product Title' required='required'>
            </div>
            <div>
                <label for="product_price">Product Price</label>
                <input type="text" name='product_price' placeholder='Update Product Price' required='required'>
            </div>
            <div>
                <label for="product_image1">Product image 1</label>
                <input type="file" name='product_image1' required='required'>
            </div>
            <div>
                <label for="product_image2">Product image 2</label>
                <input type="file" name='product_image2' required='required'>
            </div>
            <div>
                <label for="product_image3">Product image 3</label>
                <input type="file" name='product_image3' required='required'>
            </div>
            <div>
                <label for="product_image4">Product image 4</label>
                <input type="file" name='product_image4' required='required'>
            </div>
            <div>
                <select name='edit_category'>

                    <option value="">Select Category</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select>
            </div>
            <div>
                <label for="description">Product Description</label>
                <textarea name="product_description" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="submit" name="edit_products" value="Edit Products">
            </div>
        </form>
    </div>
</body>

</html>