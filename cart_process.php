<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))//post gives all deatails of product  that has been clicked. 
    {
        if(isset($_SESSION['cart']))
        {
            $id = array_column($_SESSION["cart"],"item_id");
            if(!in_array($_GET["id"],$id))
            {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'item_id' => $_GET["id"],
                    'item_name' => $_POST["name"],
                    'item_price' => $_POST['price']
                );
                $_SESSION["cart"][$count] = $item_array;
            }
            else
            {
                    echo '<script>alert("Item Already Added")</script>';
                    echo '<script>window.location="index.php"</script>';
            }
        }
        else
        {
           $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["name"],
            'item_price' => $_POST['price']
           );
           $_SESSION["cart"][0] = $item_array;
        }
    }
}
?>