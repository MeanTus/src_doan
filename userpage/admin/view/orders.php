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
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4 text-center">Đơn đặt hàng</h4>
                        </div>
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Mã đơn hàng</th>
                                        <th>Người đặt hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- loop load data -->
                                    <?php for ($i = 0; $i < count($data['list-order']); $i++) { ?>
                                        <tr>
                                            <td class="table-plus">
                                                <?php echo $data['list-order'][$i]['order_id'] ?>
                                            </td>
                                            <td>
                                                <?php echo $data['list-order'][$i]['user_id'] ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($data['list-order'][$i]['totalPrice']) ?><sup>đ</sup>
                                            </td>
                                            <td>
                                                <?php echo $data['list-order'][$i]['createAt'] ?>
                                            </td>
                                            <td>
                                                <?php 
                                                if($data['list-order'][$i]['order_status'] == 1) 
                                                    echo "Đã duyệt";
                                                else if ($data['list-order'][$i]['order_status'] == 0)
                                                    echo "Chờ xác nhận";
                                                else echo "Đã hủy đơn";
                                                ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a id="view<?php echo $i; ?>" class="dropdown-item" href="?order_action=detail&&order_id=<?php echo $data['list-order'][$i]['order_id'] ?>"><i class="dw dw-eye"></i> Chi tiết</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- js -->
    <?php include('Layout/js/tablejs.php'); ?>
</html>