<!DOCTYPE html>
<html>
    <head>
        <?php include('../view/Layout/Header.php'); ?>
    </head>
    <body>

        <!-- Title Bar -->
        <?php include('../view/Layout/TitleBar.php'); ?>

        <!-- Menu -->
        <?php include('../view/Layout/Menu.php'); ?>

        <div class="mobile-menu-overlay"></div>
        <div class="main-container">
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4 text-center">Sản phẩm</h4>
                            <!-- Thêm Danh mục mới -->
                            <div>
                                <a href="#" class="btn-block" data-toggle="modal" data-target="#add" type="button">
                                    <button type="button" class="btn btn-primary">Thêm sản phẩm</button>
                                </a>
                            </div>
                        </div>
                        <div class="pb-20">
                        <table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                    <th class="table-plus datatable-nosort">ID</th>
                                    <th class="datatable-nosort">Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Nhà sản xuất</th>
                                    <th>Giá</th>
                                    <th>Giảm giá</th>
                                    <th>Số lượng</th>
                                    <th>Danh mục</th>
                                    <th hidden>Chi tiết</th>
                                    <th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                <!-- loop load data -->
                                <?php 
                                    include_once '../model/Manufacturer.php';
                                    include_once '../model/Category.php';
                                    for ($i = 0; $i < count($data['list']); $i++) { ?>
                                        <tr>
                                            <td id="prodid<?php echo $i; ?>" class="table-plus">
                                                <?php echo $data['list'][$i]['product_id'] ?>
                                            </td>
                                            <td>
                                            <img id="prodimg<?php echo $i; ?>" src="../../view<?php echo ltrim($data['list'][$i]['img'], '.') ?>" width="70" height="70" alt="">
                                            </td>
                                            <td id="prodname<?php echo $i; ?>">
                                                <?php echo $data['list'][$i]['product_name'] ?>
                                            </td>
                                            <td id="prodmanu<?php echo $i; ?>">
                                                <?php
                                                    $id = $data['list'][$i]['manufacturer_id'];
                                                    $manu = new Manufacturer($id, "");
                                                    echo $manu->getManufacturerById($manu)[0]['manufacturer_name']; 
                                                ?>   
                                            </td>
                                            <td id="prodprice<?php echo $i; ?>">
                                                <?php echo number_format($data['list'][$i]['price_current']) ?><sup>đ</sup>
                                            </td>
                                            <td id="proddiscount<?php echo $i; ?>">
                                                <?php echo number_format($data['list'][$i]['price_sale']) ?>%
                                            </td>
                                            <td id="prodamount<?php echo $i; ?>">
                                                <?php echo number_format($data['list'][$i]['amount']) ?>
                                            </td>
                                            <td id="prodcategory<?php echo $i; ?>">
                                                <?php 
                                                    $id = $data['list'][$i]['category_id'];
                                                    $cate = new Category($id, "");
                                                    echo $cate->getCategoryById()[0]['category_name'];
                                                ?>
                                            </td>
                                            <td id="proddesc<?php echo $i; ?>" hidden>
                                                <?php 
                                                echo $data['list'][$i]['product_desc'] ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a id="view<?php echo $i; ?>" class="dropdown-item" href="#"><i class="dw dw-eye"></i> Chi tiết</a>
                                                        <button
                                                        id="edit<?php echo $i; ?>" 
                                                        data-toggle="modal" data-target="#edit"
                                                        class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Chỉnh sửa</button>
                                                        <a 
                                                        class="dropdown-item" 
                                                        href="?id=<?php echo $data['list'][$i]['product_id'] ?>&&action=delete"
                                                        >
                                                        <i class="dw dw-delete-3"></i> Xóa</a>
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
    <!-- click chỉnh sửa và thêm -->
    <?php include('../view/AddAndEditProduct.php'); ?>

    <!-- JS -->
    <?php include('../view/Layout/js/tablejs.php'); ?>

    <script type="text/javascript">
        <?php for ($i = 0; $i < count($data['list']); $i++) { ?>
            // load edit modals
            $(document).ready(function () {
                $(document).on('click', '#edit<?php echo $i; ?>', function () {
                    var id = $('#prodid<?php echo $i; ?>').text().trim();
                    var name = $('#prodname<?php echo $i; ?>').text().trim();
                    var desc = $('#proddesc<?php echo $i; ?>').text().trim();
                    var manu = $('#promanu<?php echo $i; ?>').text().trim();
                    var img = $('#prodimg<?php echo $i; ?>').attr('src').trim();
                    var cate = $('#prodcategory<?php echo $i; ?>').text().trim();
                    var priceText = $('#prodprice<?php echo $i; ?>').text().trim();
                    var priceNum = priceText.substring(0, priceText.length -1);
                    var discount = $('#proddiscount<?php echo $i; ?>').text().trim();
                    var disNum = parseInt(discount.substring(0, discount.length -1));
                    var amount = parseInt($('#prodamount<?php echo $i; ?>').text().trim(),10);
                    // alert(cate);
                    $('#edit').modal('show');//load modal
                    $('#eprodid').val(id);
                    $('#eprodname').val(name);
                    $('#eproddesc').val(desc);
                    $('#eproamount').val(amount);
                    $('#eprodprice').val(priceNum);
                    $('#eproddiscount').val(disNum);
                });
            });

            //load view modals 
            $(document).ready(function () {
                $(document).on('click', '#view<?php echo $i; ?>', function () {
                    var id = $('#prodid<?php echo $i; ?>').text().trim();// get product id
                    var name = $('#prodname<?php echo $i; ?>').text().trim();// get product name
                    var img = $('#prodimg<?php echo $i; ?>').attr('src').trim();// get product image
                    var wrt = $('#prodwarranty<?php echo $i; ?>').text().trim();// get product image
                    var price = $('#prodprice<?php echo $i; ?>').text().trim();// get product price
                    var discount = $('#proddiscount<?php echo $i; ?>').text().trim();// get product discount
                    var genre = $('#prodgenre<?php echo $i; ?>').text().trim();// get product genre
                    $('#view').modal('show');//load modal
                    $('#vprodid').text(id);
                    $('#vprodimg').attr("src", img);
                    $('#vprodname').text(name);
                    $('#vprodwrt').text(wrt);
                    $('#vprodprice').text(price);
                    $('#vproddiscount').text(discount);
                    $('#vprodgenre').text(genre);
                });
            });
        <?php } ?>
    </script>
</html>