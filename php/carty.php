<?php
    session_start();

    require ('specification.php');
    require_once('connect.php');

    $conn = connect();

    if(isset($_GET['id']) && !isset($_POST['update'])){
        $result = mysqli_query($conn, 'SELECT * FROM foods WHERE id='.$_GET['id']);
        $product = mysqli_fetch_object($result);
        $item = new Item();

        $item->id = $product->id;
        $item->name = $product->name;
        $item->price = $product->price;
        $item->position = $product->location;
        $item->quantity = 1;

        $index = -1;  #position of a product in the cart

        #checking if item is in the cart
        if(isset( $_SESSION['cart'] )){
            #convert object array for iteration
            $cart = unserialize(serialize( $_SESSION['cart']));
            for($i = 0; $i < count( $cart); $i++){
                if($cart[$i]->id == $_GET['id']){
                    $index = $i;
                    break;
                }
            }
        }

        if($index == -1){ # if a product was not in the cart
            # add product in cart
            $_SESSION['cart'] [] = $item;
        }
        else{
            $cart[$index]->quantity++;
            $_SESSION['cart'] = $cart;
        }
    }

    if(isset( $_GET['index']) && !isset($_GET['increment'])){
        $cart = unserialize(serialize ($_SESSION['cart']));
        unset( $cart[$_GET['index']]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
    }

    /*
    if(isset($_POST['update'])) {
        $arrQuantity = $_POST['Quantity'];
    
    
        $valid = 1;
        for($i=0; $i<count($arrQuantity); $i++)
        if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
            $valid = 0;
            break;
        }
        if($valid==1){
            $cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
            for($i = 0; $i < count ( $cart ); $i ++) {
                $cart[$i]->Quantity = $arrQuantity[$i];
            }
            $_SESSION ['cart'] = $cart;
        }
        else
            $error = 'Quantity is InValid';
    }   
     */

     if(isset( $_GET['increment'])){
        $cart = unserialize(serialize ($_SESSION['cart']));

        if($cart[$_GET['increment']]->quantity < 10){
            $cart[$_GET['increment']]->quantity++;
        }

        $_SESSION['cart'] = $cart;
     }
     if(isset( $_GET['decrement'])){

        $cart = unserialize(serialize ($_SESSION['cart']));
        
        if($cart[$_GET['decrement']]->quantity > 1) {
            $cart[$_GET['decrement']]->quantity--;
        }

        $_SESSION['cart'] = $cart;
     }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Cart</title>
        <link href="../style/header.css" rel="stylesheet">
        <link href="../style/cart.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <div class="header">
            <div class="inner_header">
                <div class="logo_container">
                    <a href="index.html"><h1><span>FOODVILLE</span></h1></a>
                </div>
                <ul class="navigation">
                    <a href="index.php"><li>Home</li></a>
                    <a href="user_home.php"><li>My Profile</li></a>
                    <a href="menu.php"><li>Menu</li></a>
                </ul>
            </div>
            </div>
            <div class="em" style="position:relative">
                <div class="custom-shape-divider-top-1630592774">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                </div>
            </div><br><br>
            <?php if (isset($_SESSION['id'])){
                echo "<div class='Uname'>
            <h2>Welcome ". $_SESSION['name']. " ! </h2>
        </div>"; }?><br>
            <div class="shopping-cart"> 
            <!-- Title -->
            <div class="title">
                Shopping cart
            </div>
            <form>
                <?php
                    if(isset($_SESSION['cart'])){
                    $cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
                    $s = 0;
                    $itemcount = 0;
                    $index = 0;
                    $quantity = 0;
                    for($i = 0; $i < count ( $cart ); $i ++) {
                    $s += $cart [$i]->price * $cart [$i]->quantity;
                ?>
                <div class="item">
                    <div class="buttons">
                        <!--implement delete food button-->
                        <a href="carty.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')">
                            <button type='button' style="background-color: #6d597a; color:#ba9e80; border:none; border-radius:15%;">Delete</button>
                        </a>
                    </div>

                
                    <div class="image">
                    <img src=<?php echo $cart[$i]->position; ?> alt="" />
                    </div>
                
                    <div class="description">
                    <span><?php echo $cart[$i]->name; ?></span>
                    </div>
                
                    <div class="quantity">
                    <a href="carty.php?decrement=<?php echo $index ?>">
                        <button class="minus-btn" type="button">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </a>
                    
                    <input type="text" name="quantity" disabled value="<?php echo $cart[$i]->quantity?>">

                    <a href="carty.php?increment=<?php echo $index ?>">
                        <button class="plus-btn" type="button">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </a>
                    </div>

                    <div class="total-price">
                        <?php echo "Sh ", $cart[$i]->price, "/="?>
                    </div>
                
                    <div class="total-price" ><?php echo "‎Sh ",$cart[$i]->price * $cart[$i]->quantity; ?></div>

                    </div>

                    <?php
                        $itemcount++;
                        $index++;
                        }
                    ?>

                </div>

                    <div class="ttl">
                        <p id="ttl">Total bill: <?php echo "Sh ", $s ; $bill = $s;?></p>
                    </div>

                    <?php
                        $_SESSION['itemCount'] = $itemcount;
                        $_SESSION['total'] = $bill;
                        echo '
                    
                
            </form>

            <div id="bt">
                <a href="checkout.php"><button type="Checkout">Checkout</button> </a>
                <a href="menu.php"><button type="Shopping">Continue Shopping</button></a>
            </div> ';
                    }
                    else{
                        echo '<script>alert("You have not ordered anything!!!")</script>';
                        //header('Location:menu.php');
                    }
            ?>
    </body>
</html>