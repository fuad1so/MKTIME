<?php
require("Database_conection.php");




$sqlCheck = " SELECT item_name, item_desc, item_img, item_price FROM items";
$stmt = mysqli_prepare($link, $sqlCheck);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $item_name, $description, $image, $price);
$items = [];
while (mysqli_stmt_fetch($stmt)) {
    $items[] = [
        'item_name' => $item_name,
        'item_desc' => $description,
        'item_img' => $image,
        'item_price' => $price
    ];
}
//mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

?>



<div class="fashion_section">
    <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital">Fancy Watch</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            <?php for ($i = 0; $i < 3; $i++) {
                                echo "<div class='col-lg-4 col-sm-4'>
                            <div class='box_main'>
                                 <h4 class='shirt_text'>{$items[$i]['item_name']}</h4>
                                 <p class='price_text'>Start Price <span style='color:#262626;'>£{$items[$i]['item_price']}</span></p>
                                 <div class='electronic_img'>" . "<img src='img/{$items[$i]['item_img']}'>" . "</div>
                                    <div class='btn_main'>   
                                         <div class='buy_bt'><a href= 'cart.php?id=$i'>Add to Cart</a></div>
                                         <div class='seemore_bt'><a href='#'>See More</a></div>
                                    </div>
                                </div>
                            </div>";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <h1 class="fashion_taital">Special Offers</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            <?php for ($i = 3; $i < 6; $i++) {
                                echo "<div class='col-lg-4 col-sm-4'>
                            <div class='box_main'>
                                 <h4 class='shirt_text'>{$items[$i]['item_name']}</h4>
                                 <p class='price_text'>Start Price <span style='color:#262626;'>£{$items[$i]['item_price']}</span></p>
                                 <div class='electronic_img'>" . "<img src='img/{$items[$i]['item_img']}'>" . "</div>
                                    <div class='btn_main'>
                                         <div class='buy_bt'><a href='cart.php?id=$i'>Add to Cart</a></div>
                                         <div class='seemore_bt'><a href='#'>See More</a></div>
                                    </div>
                                </div>
                            </div>";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <h1 class="fashion_taital">Nice Watch</h1>
                    <div class="fashion_section_2">
                        <div class="row">
                            <?php for ($i = 6; $i < 9; $i++) {
                                echo "<div class='col-lg-4 col-sm-4'>
                            <div class='box_main'>
                                 <h4 class='shirt_text'>{$items[$i]['item_name']}</h4>
                                 <p class='price_text'>Start Price <span style='color:#262626;'>£{$items[$i]['item_price']}</span></p>
                                 <div class='electronic_img'>" . "<img src='img/{$items[$i]['item_img']}'>" . "</div>
                                    <div class='btn_main'>
                                         <div class='buy_bt'><a href='cart.php?id=$i'>Add to Cart</a></div>
                                         <div class='seemore_bt'><a href='#'>See More</a></div>
                                    </div>
                                </div>
                            </div>";
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>