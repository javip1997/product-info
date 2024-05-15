<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.container {
    width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
button[type="submit"] {
    width: calc(100% - 22px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 5px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    width: 400px;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

.message {
    margin-top: 20px;
    padding: 10px;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
    border-radius: 5px;
    color: #155724;
    text-align: center;
}
</style>
<body>

    <div class="container">
        <h1>Create Product</h1>
        <form id="create-form">
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" step="0.01" placeholder="Enter price" required>
            </div>
            <div class="form-group">
                <button type="submit">Create</button>
            </div>
        </form>
        <div id="message" class="message"></div>
    </div>

    <script>
        $(document).ready(function(){
            $('#message').hide();
            $('#create-form').submit(function(e){
                e.preventDefault();
                var name = $('#name').val();
                var price = $('#price').val();
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'POST',
                    data: {name: name, price: price, action:'create'},
                    success: function(response){
                        $('#message').html(response);
                        $('#message').show();
                        setTimeout(function() {
                             document.location.href = "index.php";
                        }, 3000);
                    }
                });
            });
        });
    </script>

</body>
</html>
