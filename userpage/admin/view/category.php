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
                    <?php
                    $categories = array("TV", "Tủ lạnh", "Laptop", "Điện thoại", "Loa", "Máy lạnh");
                    ?>
                    <!-- Danh mục -->
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4 text-center">Danh mục</h4>
                            <!-- Thêm Danh mục mới -->
                            <div>
                                <a href="#" class="btn-block" data-toggle="modal" data-target="#add-modal" type="button">
                                    <button type="button" class="btn btn-primary">Thêm danh mục</button>
                                </a>
                            </div>
                        </div>

                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort"> ID</th>
                                        <th class="table-plus datatable-nosort"> Danh mục</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- loop load data -->
                                    <?php for ($i = 0; $i < count($data['list']); $i++) { ?>
                                        <tr>
                                            <td class="table-plus" id="id<?php echo $i; ?>">
                                            <?php echo $data['list'][$i]['category_id'] ?>
                                            </td>
                                            <td class="table-plus" id="catename<?php echo $i; ?>">
                                            <?php echo $data['list'][$i]['category_name'] ?>
                                            </td>
                                            <td>	
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <button
                                                        class="dropdown-item" 
                                                        id="edit<?php echo $i; ?>" 
                                                        href="?id=<?php echo $data['list'][$i]['category_id']?>&&action=edit" 
                                                        value="<?php echo $i; ?>"><i 
                                                        class="dw dw-edit2"></i> Chỉnh sửa</button>
                                                        <a 
                                                        class="dropdown-item" 
                                                        href="?id=<?php echo $data['list'][$i]['category_id']?>&&action=delete">
                                                        <i class="dw dw-delete-3"></i>
                                                         Xóa
                                                        </a>
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
    <?php include('AddandEditCategory.php'); ?>

    <!-- JS -->
    <?php include('Layout/js/tablejs.php'); ?>
    <?php for ($i = 0; $i < count($data['list']); $i++) { ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click', '#edit<?php echo $i; ?>', function () {
                    var id = $('#id<?php echo $i; ?>').text().trim();
                    var name = $('#catename<?php echo $i; ?>').text().trim();
                    $('#edit').modal('show');//load modal
                    $('#ecatename').val(name);
                    $('#eid').val(id);
                });
            });
        </script>
    <?php } ?>
</html>