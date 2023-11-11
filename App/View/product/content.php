<div class="bg0 m-t-23 " style="margin-top:100px">
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/<?php echo Core\Helper::slug($product['menuName']) ?>-id-<?php echo $product['menu_id'] ?>.html" class="stext-109 cl8 hov-cl1 trans-04">
                <?php echo $product['menuName'] ?>
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                <?php echo $product['name'] ?>
            </span>
        </div>
    </div>

</div>
<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots">
                            <ul class="slick3-dots" role="tablist">
                                <li role="presentation"><img src="<?php echo $product['file'] ?>">
                                    <div class="slick3-dot-overlay"></div>
                                </li>
                                <?php $sliderProduct = '';
                                if ($slider->num_rows > 0) {
                                    while ($row = $slider->fetch_assoc()) {
                                        $sliderProduct .= '
                                       <div class="item-slick3 slick-slide" data-thumb="' .  $row['url'] . '" data-slick-index="2" aria-hidden="true" style="width: 600px; position: relative; left: -1200px; top: 0px; z-index: 998; opacity: 0;" tabindex="-1" role="tabpanel" id="slick-slide12" aria-describedby="slick-slide-control12">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="' .  $row['url'] . '" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="' .  $row['url'] . '" tabindex="-1">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>';
                                ?>
                                        <li role="presentation"><img src="<?php echo $row['url'] ?>">
                                            <div class="slick3-dot-overlay"></div>
                                        </li>

                                <?php }
                                } ?>

                            </ul>
                        </div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w">
                            <button class="arrow-slick3 prev-slick3 slick-arrow">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </button>
                            <button class="arrow-slick3 next-slick3 slick-arrow">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1800px;">

                                    <div class="item-slick3 slick-slide slick-current slick-active" data-thumb="<?php echo $product['file'] ?>" data-slick-index="0" aria-hidden="false" style="width: 600px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" tabindex="0" role="tabpanel" id="slick-slide10" aria-describedby="slick-slide-control10">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="<?php echo $product['file'] ?>" alt="<?php echo Core\Helper::decodeSafe($product['name']) ?>">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $product['file'] ?>" tabindex="0">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <?php echo $sliderProduct; ?>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <?php include _VIEW_ . '/alert.php' ; ?>
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <?php echo Core\Helper::decodeSafe($product['name']) ?>
                    </h4>

                    <span class="mtext-106 cl2">
                        <?php echo Core\Helper::checkPrice($product['price'], $product['price_sale']) ?>
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        <?php echo Core\Helper::decodeSafe($product['description']) ?>
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                                    <?php if($product['price'] > 0){
                                    ?>
                                      <form action="/cart/add" method="POST">
                                            <div class="flex-w flex-r-m p-b-10">
                                            </div>
                                            <div class="flex-w flex-r-m p-b-10">
                                                <div class="size-204 flex-w flex-m respon6-next">
                                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                                        </div>

                                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product" value="1">

                                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                                        </div>
                                                    </div>
                                                    
            
                                                    <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                                        Add to cart
                                                    </button>
                                                    <input type="hidden" value="<?php echo $product['id']?>" name="product_id">
                                                </div>
                                            </div>
                                        </form>
                                    <?php }?>
                              
                                
                           
                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                <?php echo Core\Helper::decodeSafe($product['content']) ?>
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Weight
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            0.79 kg
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Dimensions
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            110 x 33 x 100 cm
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Materials
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            60% cotton
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Color
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            Black, Blue, Grey, Green, Red, White
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            XL, L, M, S
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm">
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="images/avatar-01.jpg" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    Ariana Grande
                                                </span>

                                                <span class="fs-18 cl11">
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star"></i>
                                                    <i class="zmdi zmdi-star-half"></i>
                                                </span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                Quod autem in homine praestantissimum atque optimum est, id deseruit. Apud ceteros autem philosophos
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Add a review
                                        </h5>

                                        <p class="stext-102 cl6">
                                            Your email address will not be published. Required fields are marked *
                                        </p>

                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                Your Rating
                                            </span>

                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline"></i>
                                                <input class="dis-none" type="number" name="rating">
                                            </span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="name">Name</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
                                            </div>

                                            <div class="col-sm-6 p-b-5">
                                                <label class="stext-102 cl3" for="email">Email</label>
                                                <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <a href="/danh-muc/<?php echo Core\Helper::slug($product['menuName']) ?>-id-<?php echo $product['menu_id'] ?>.html" class="stext-109 cl8 hov-cl1 trans-04">
            <?php echo $product['menuName'] ?>
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
    </div>
</section>
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Sản Phẩm cùng danh mục
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2"><button class="arrow-slick2 prev-slick2 slick-arrow slick-disabled" aria-disabled="true" style="">
            <i class="fa fa-angle-left" aria-hidden="true">

            </i>
        </button>
            <div class="slick2 slick-initialized slick-slider">
                <div class="slick-list draggable">
                    <div class="slick-track" style="opacity: 1; width: 2760px; transform: translate3d(0px, 0px, 0px);">

                        <?php if ($product_more->num_rows > 0) {
                            $i = 0;
                            while ($row = $product_more->fetch_assoc()) {
                             $class = (($i == 0 || $i == 1 || $i== 2 || $i==3) ? ' slick-active': '');
                        ?>
                                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 slick-slide <?php echo ($i ==0) ? 'slick-current':''?> <?php echo $class;?>" 
                                data-slick-index="<?php echo $i;?>" aria-hidden="false" style="width: 345px;" tabindex="0">
                                    <!-- Block2 -->
                                    <div class="block2">
                                        <div class="block2-pic hov-img0">
                                            <img src="<?php echo $row['file']?>" alt="IMG-PRODUCT">

                                            <a href="#" onclick="showModelInfo(<?php echo $row['id']?>)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" tabindex="0">
                                                Quick View
                                            </a>
                                        </div>

                                        <div class="block2-txt flex-w flex-t p-t-14">
                                            <div class="block2-txt-child1 flex-col-l ">
                                                <a href="/san-pham/<?php echo Core\Helper::slug($row['name'])?>-id-<?php echo $row['id']?>.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
                                                    <?php echo $row['name']?>
                                                </a>

                                                <span class="stext-105 cl3">
                                                    <?php echo $row['price']?>
                                                </span>
                                            </div>

                                        
                                        </div>
                                    </div>
                                </div>
                        <?php $i++;
                            }
                        } ?>


                    </div>
                </div>

            </div>
            <button class="arrow-slick2 next-slick2 slick-arrow" aria-disabled="false"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        </div>
    </div>
</section>

