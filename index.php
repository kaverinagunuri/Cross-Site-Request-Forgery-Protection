<?php  
session_start();
include 'token.php';
if(isset($_POST['quantity'],$_POST['product']))
{
    $product=$_POST['product'];
    $quantity=$_POST['quantity'];
    if(!empty($product) && !empty($quantity))
    {
        if(Token::check($_POST['token']))
        echo 'processed';
    }
}

?>

<!DOCTYPE html>
<head>
    <title>
        Cross Site Request Forgery
    </title>
</head>
<body>
    <form action="" method="POST">
        <div class="protect">
            <strong>
                A Product
            </strong>
            <div class="field">
                Quantity:<input type="text" name="quantity"/>
        </div>
            <input type="submit" value="Order"/>
            <input type="hidden" value="1" name="product"/>
            <input type="hidden" name="token" value="<?php echo Token::generate();?>"/>
        </div>
        <?php echo $_SESSION['token'];?>
    </form>
</body>
</html>
        