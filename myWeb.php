<?php
include_once("session.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Web</title>
    <link rel="stylesheet" href="css/myWeb.css">
	<link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="fontawesome-free-5.15-2.4-web/css/all.css">
</head>

<body>
<div id = "toast" ></div>
    <div class = "app">
        <div class="flxed">
            <header class="header">
                <div class="grid">

                    <nav class="header__navbar">
                        <ul calss = "header__navbar--list">
                            <li class="header__navbar--item">Welcome to ATN product management website</li>
                        </ul>
        
                        <ul class="header__navbar--list">
                            <li class="header__navbar--item">
                                <i class="fas fa-bell"></i>
                                <a href="#" class="header__navbar--item--link">To help</a>
                            </li>
                            <?php
                            if (isset($_SESSION['USER'])) {?>
                                <li class="header__navbar--item " onclick=" profile()">
                                    <i class="fas fa-user-circle"></i>
                                    <div   class="header__navbar--item--link header__blod"><?= ($_SESSION['USER']);?></div>

                                </li>

                                <li class="header__navbar--item ">
                                    <a href="logout.php" class="header__navbar--item--link header__blod">Logout</a>
                                </li>
                                
                            <?php    
                            }else {?>
                            <li class="header__navbar--item ">
                                <i class="fas fa-user-circle"></i>
                                <a href="html-login-register.php" class="header__navbar--item--link header__blod">Login</a>
                            </li>
                           <?php }?>
                          
                        </ul>
                    </nav>
                    
                    <div class="header--with--seach">
                        <!-- header with seach -->
                        <div class="header__logo">
                            <svg class="logo">
                                <defs>
                                    <linearGradient id="grad1" x1="0%" y1="0%" x2="90%" y2="0%">
                                    <stop offset="0%"
                                    />
                                    <stop offset="90%"
                                    />
                                    </linearGradient>
                                </defs>
                                <ellipse class ="logo--item" cx="90" cy="35" rx="85" ry="35" fill="#7A7575" />
                                <text fill="#0BC0CF" font-size="25"
                                x="60" y="40">ATN</text>
                                Sorry, your browser does not support inline SVG.
                            </svg>
                        </div>
    
                        <div class="header__seach">
                            <input type=" text" class="header__seach--input" placeholder = "To Seach">
                            <div class = "header__seach--select">
                                <span class="header__seach--select--label">ATN Shop</span>
                                <i  class="header__seach--select--icon fas fa-caret-down"></i>
                            </div>
                            <button class="header__seach-btn">
                            <i class="header__seach-btn--icon fas fa-search"></i>
                            </button>
                        </div>
                       
                    </div>
                    <!-- menu -->
                    <div class = "menu">
                        <nav class="menu__row">
                            <ul class="menu-list">
                                <li class="menu--item">
                                    <a class = "menu--option"  href="">
                                        <i class="fas fa-house-damage"></i>
                                    </a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" id = "new" href="#">All Shops</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Shop A</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="#">Shop B</a>
                                </li>
                                <li class="menu--item">
                                    <a class = "menu--option" href="add.php">Add</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
            </header>
        </div>
    
    </div>
    <div class = "container">
        <style>
        table, th, td {
        border:1px solid rgb(231, 236, 227);
        color: rgb(231, 236, 227);

        }
        </style>
        <table style="width:100%" action="update.php" method = "POST" >
            <tr>
                <th>Product_ID</th>
                <th>Shop Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <tr>
            


            <?php
                session_start();
                $serverName = "mysql5030.site4now.net";
                $userName = "a83f2f_hoanex";
                $password = "Hoan8102001";
                $dbName = "db_a83f2f_hoanex";
                $conn = mysqli_connect($serverName, $userName, $password, $dbName);

                mysqli_select_db($conn, $dbName);
                
                if ($_SESSION['USER'] == 'ShopA') {
                    $sql="SELECT * FROM product WHERE shop_name = 'ShopA'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)){
                        echo"<tr>";
                        echo "<td>";
                        echo $row['product_ID'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['shop_name'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['product_name'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['price'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['quantity'];
                        echo"</td>";
                        echo "<td>";
                        ?><a href="update.php?product_ID=<?php echo $row['product_ID'] ?>">Update</a> <?php
                        echo"</td>";
                        echo "<td>";
                        ?><a href="delete.php?product_ID=<?php echo $row['product_ID'] ?>">Delete</a> <?php
                        echo"</td>";
                        echo"</tr>";
                    }    
                }else
                if ($_SESSION['USER'] == 'director') {
                    $sql="SELECT * FROM product";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)){
                        echo"<tr>";
                        echo "<td>";
                        echo $row['product_ID'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['shop_name'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['product_name'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['price'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['quantity'];
                        echo"</td>";
                        echo "<td>";
                        ?><a href="update.php?product_ID=<?php echo $row['product_ID'] ?>">Update</a> <?php
                        echo"</td>";
                        echo "<td>";
                        ?><a href="delete.php?product_ID=<?php echo $row['product_ID'] ?>">Delete</a> <?php
                        echo"</td>";
                        echo"</tr>";
                    }    
                }else
                if ($_SESSION['USER'] == 'ShopB') {
                    $sql="SELECT * FROM product where shop_name = 'ShopB'";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)){
                        echo"<tr>";
                        echo "<td>";
                        echo $row['product_ID'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['shop_name'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['product_name'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['price'];
                        echo"</td>";
                        echo "<td>";
                        echo $row['quantity'];
                        echo"</td>";
                        echo "<td>";
                        ?><a href="update.php?product_ID=<?php echo $row['product_ID'] ?>">Update</a> <?php
                        echo"</td>";
                        echo "<td>";
                        ?><a href="delete.php?product_ID=<?php echo $row['product_ID'] ?>">Delete</a> <?php
                        echo"</td>";
                        echo"</tr>";
                    }    
                }
            
            ?>
        </table>
    </div>
    
<!-- footer -->
        <footer class=  "footer">
            <div class="footer__grid">
                <div class="grid-row">
                    <div class="grid-row-footer ntn--footer">
                        <h3 class="footer-list">Fashion App</h3>
                        <span class="footer-list-4">Farfetch App for iOS and Android</span>
                    </div>
                    <div class="grid-row-footer ntn--footer">
                        <h3 class="footer-list">Destination/Region, Currency and Language</h3>
                        <li class="footer-list-3">
                            <i class="footer-icon fas fa-donate"></i>
                            <div class="footer-icon">dollars $</div>                         
                        </li>
                        <li class="footer-list-2 ">
                            <h5 class="footer-list-2--2">FOLLOW US</h5>
                            <i class="footer-icon-1 fab fa-facebook"></i>
                            <i class="footer-icon-1 fab fa-twitter-square"></i>
                            <i class="footer-icon-3 fab fa-google-plus-square"></i>
                            <i class="footer-icon-4 fab fa-youtube"></i>
                        </li>
                    </div>
                    <div class="grid-row-footer ntn--footer-1">
                        <h3 class="footer-list" >Customer Service</h3>
                        <div class="footer-list--row">
                            <li class="footer-list-1">Help & contact us</li>
                            <li class="footer-list-1">Orders & shipping</li>
                            <li class="footer-list-1">Payment & pricing</li>
                            <li class="footer-list-1">Returns & refunds</li>
                            <li class="footer-list-1">FAQs</li>
                            <li class="footer-list-1">Terms & conditions</li>
                            <li class="footer-list-1">Privacy policy</li>
                            <li class="footer-list-1">Accessibility</li>

                        </div>
                    </div>
                    <div class="grid-row-footer ntn--footer-1">
                        <h3 class="footer-list">ABOUT FACSHION</h3>
                        <div class="footer-list--row" >
                            <li class="footer-list-1">About Us</li>
                            <li class="footer-list-1">Investors</li>
                            <li class="footer-list-1">Fashion Boutique</li>
                            <li class="footer-list-1">Partners</li>
                            <li class="footer-list-1">Affiliate Programme</li>
                            <li class="footer-list-1">Careers</li>
                            <li class="footer-list-1">Fashion Customer</li>
                            <li class="footer-list-1">Promise</li>
                            <li class="footer-list-1">Fashion App</li>
                            <li class="footer-list-1">Sitemap</li>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
       
    </div>
    <script src="myWeb.js"></script>
</body>
</html>