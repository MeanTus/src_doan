<!DOCTYPE html>
<html>
    <head>
        <?php include('Layout/Header.php'); ?>
    </head>
    <body>

        <!-- Title Bar -->
        <?php include('Layout/TitleBar.php'); ?>

        <!-- Menu -->
        <?php include('Layout/Menu.php'); ?>

        <div class="mobile-menu-overlay"></div>

        <div class="main-container">
            <div class="container-fluid">
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:220px;">Mã đơn hàng:</span>
                    <p class="input-group-addon">
                        <?php echo $data['order'][0]['order_id'] ?>
                    </p>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:220px;">Tên người nhận:</span>
                    <p class="input-group-addon">
                        <?php echo $data['order'][0]['receiver'] ?>
                    </p>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:220px;">Địa chỉ giao:</span>
                    <p class="input-group-addon">
                        <?php echo $data['order'][0]['address'] ?>
                    </p>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:220px;">Số điện thoại:</span>
                    <p class="input-group-addon">
                        <?php echo $data['order'][0]['phone_number'] ?>
                    </p>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:220px;">Phương thức thanh toán:</span>
                    <p class="input-group-addon">
                        <?php 
                        if($data['order'][0]['payment_methods'])
                            echo "Thanh toán trực tiếp";
                        else echo "Thanh toán Internet Banking"; 
                        ?>
                    </p>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:220px;">Trạng thái:</span>
                    <p class="input-group-addon">
                    <?php 
                        if($data['order'][0]['order_status'] == 1)
                            echo "Đã xác nhận";
                        else if($data['order'][0]['order_status'] == 0) 
                            echo "Chờ xác nhận";
                        else echo "Đã hủy đơn";
                        ?>
                    </p>
                </div>   
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:220px;">Tổng tiền:</span>
                    <p class="input-group-addon">
                        <?php echo number_format($data['order'][0]['totalPrice']) ?> Đ
                    </p>
                </div>
                <div class="form-group input-group">
                    <a href="OrderController.php?order_action=detail&order_id=<?php echo $data['order'][0]['order_id']?>&success=true">
                        <button 
                            type="button" 
                            class="btn btn-success"
                            <?php 
                            if($data['order'][0]['order_status'] || $data['order'][0]['order_status']== 3)
                            echo 'disabled';
                            ?> >Xác nhận đơn đặt hàng</button>
                    </a>
                    <a href="OrderController.php?order_action=detail&order_id=<?php echo $data['order'][0]['order_id']?>&cancel=true">
                        <button
                        <?php 
                        if($data['order'][0]['order_status'] || $data['order'][0]['order_status'] === 3) echo 'disabled';
                        ?>
                        type="submit"
                        name="order_action"
                        value="cancel-order"
                        style="margin-left: 20px"
                        class="btn btn-danger">Hủy đơn</button>
                    </a>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Mã sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Giá sau giảm</th>
                                <th>Danh mục</th>
                                <th>Hãng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- loop load data -->
                            <?php for ($i = 0; $i < count($data['order_detail']); $i++) { ?>
                                <tr>
                                    <td class="table-plus">
                                        <?php echo $data['order_detail'][$i]['product_id'] ?>
                                    </td>
                                    <td >
                                        <img src="../../view<?php
                                         echo ltrim($data['order_detail'][$i]['img'], ".")
                                         ?>" width="70" height="70" alt="">
                                    </td>
                                    <td>
                                        <?php echo $data['order_detail'][$i]['product_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($data['order_detail'][$i]['current_price']) ?> Đ
                                    </td>
                                    <td>
                                        <?php echo $data['order_detail'][$i]['quality'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($data['order_detail'][$i]['current_price']) ?> Đ
                                    </td>
                                    <td>
                                        <?php 
                                        $id = $data['order_detail'][$i]['category_id'];
                                        $cate = new Category($id, "");
                                        echo $cate->getCategoryById()[0]['category_name'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $id = $data['order_detail'][$i]['manufacturer_id'];
                                        $manu = new Manufacturer($id, "");
                                        echo $manu->getManufacturerById($manu)[0]['manufacturer_name'];
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- js -->
    <?php include('Layout/js/tablejs.php'); ?>
</html>