<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <div class="header">
            <nav>
                <a href="add_product.php" class="nav-link">Add Products</a>
            </nav>
        </div>
        <div class="section">
            <form id="search-form">
                <div class="form-group">
                    <input type="text" name="search" id="search" autocomplete="off" placeholder="Search Product">
                </div>
                <button type="submit" class="btn">Search</button>
            </form>
        </div>

        <div class="section">
            <h2 class="section-title">Product List</h2>
            <div id="loader" class="loader">Loading...</div>
            <div id="product-list" class="product-list">
            </div>
        </div>
    </div>

</body>
</html>

<script>
    $(document).ready(function(){

        $.ajax({
            url: 'ajaxfile.php',
            type: 'POST',
            data: {action:'getData'},
            success: function(response){
                $('#product-list').html(response);
            }
        });

        $('#search-form').submit(function(e){
            e.preventDefault();
            var query = $('#search').val();
            $.ajax({
                url: 'ajaxfile.php',
                type: 'POST',
                data: {query: query,action:'search'},
                beforeSend: function(){
                    $('#loader').show();
                },
                success: function(response){
                    $('#loader').hide();
                    $('#product-list').html(response);
                }
            });
        });
    });
</script>
