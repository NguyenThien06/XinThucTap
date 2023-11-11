<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
            <div class="m-l-25 m-r--38 m-lr-0-xl">
                <form class="bg0 p-t-75 p-b-85 m-t-100" action="" method="POST">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                    <th class="p-r-50">&nbsp</th>
                                </tr>
                                <?php $sumTotal = 0;
                                if ($product->num_rows > 0) {
                                    while ($row = $product->fetch_assoc()) {
                                        $price = ($row['price_sale'] != 0) ? $row['price_sale'] : $row['price'];
                                        $qty = isset($_SESSION['cart'][$row['id']]) ? $_SESSION['cart'][$row['id']] : 0;
                                        $sumPrice = $price * $qty;
                                        $sumTotal = $sumTotal + $sumPrice;
                                ?>
                                        <tr class="table_row">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="<?php echo $row['file'] ?>" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2"><?php echo $row['name'] ?></td>
                                            <td class="column-3"><?php echo number_format($price, 0, '', '.') ?></td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product[<?php echo $row['id'] ?>]" value="<?php echo $qty ?>">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5"><?php echo number_format($sumPrice, 0, '', '.') ?></td>
                                            <td><a href="/cart/delete/<?php echo $row['id'] ?>">Xoa</a></td>
                                        </tr>
                                <?php }
                                } ?>

                            </tbody>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">


                        <input type="submit" value="Update Cart" formaction="/cart/update" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">

                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50 m-t-170">
            <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                <form action="/cart/store" method="POST">
                    <?php include _VIEW_ . '/alert.php'?>
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                <?php echo number_format($sumTotal, 0, '', '.') ?>
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <div class="p-t-15">

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Tên Anh/Chị" >
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Số điện thoại" >
                                </div>
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Địa chỉ giao hàng">
                                </div>
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="bor8 bg0 m-b-22">
                                    <textarea class="p-lr-15" placeholder="Ghi chú" name="content"></textarea>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                <?php echo number_format($sumTotal, 0, '', '.') ?>
                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Đặt Hàng Ngay
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>