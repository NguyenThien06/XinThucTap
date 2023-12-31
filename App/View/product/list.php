<div class="row isotope-grid">
    <?php if($product->num_rows > 0) {
           while($row = $product->fetch_assoc()){

           
    ?>
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0">
                <img src="<?php echo $row['file']?>" alt="IMG-PRODUCT">

                <a onclick="showModelInfo(<?php echo $row['id']?>)" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                    Quick View
                </a>
            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a href="/san-pham/<?php echo Core\Helper::slug($row['name'])?>-id-<?php echo $row['id']?>.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                        <?php echo $row['name']?>
                    </a>

                    <span class="stext-105 cl3">
                        <?php echo \Core\Helper::checkPrice($row['price'], $row['price_sale']);?>
                    </span>
                </div>

               
            </div>
        </div>
    </div>
    <?php }}?>
</div>