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
                    $blogID = array("Bl000001", "Bl000002", "Bl000003", "Bl000004", "Bl000005", "Bl000006");
                    $blogName = array("Blog 000001", "Blog 000002", "Blog 000003", "Blog 000004", "Blog 000005", "Blog 000006");
                    $blogDate = array("02/03/2021", "03/03/2021", "04/03/2021", "05/03/2021", "06/03/2021", "07/03/2021");
                    $blogPoster = array("admin", "admin", "admin", "admin", "admin", "admin");
                    $blogContent = array("", "", "", "", "", "");
                    ?>
                    <!-- Simple Datatable start -->
                    <div class="card-box mb-30">
                        <div class="pd-20">
                            <h4 class="text-blue h4 text-center">Blog</h4>
                            <!-- Thêm Danh mục mới -->
                            <div>
                                <a href="#" class="btn-block" data-toggle="modal" data-target="#add" type="button">
                                    <button type="button" class="btn btn-primary">Thêm sản phảm</button>
                                </a>
                            </div>
                        </div>
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus">ID</th>
                                        <th>Chủ đề</th>
                                        <th>Ngày đăng</th>
                                        <th>Người đăng</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- loop load data -->
                                    <?php for ($i = 0; $i < count($blogID); $i++) { ?>
                                        <tr>
                                            <td id="blogdid<?php echo $i; ?>" class="table-plus"><?php echo $blogID[$i] ?></td>
                                            <td id="blogname<?php echo $i; ?>"><?php echo $blogName[$i] ?></td>
                                            <td id="blogdate<?php echo $i; ?>"><?php echo $blogDate[$i] ?> </td>
                                            <td id="blogposter<?php echo $i; ?>"><?php echo $blogPoster[$i] ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a id="edit<?php echo $i; ?>" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Chỉnh sửa</a>
                                                        <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Xóa</a>
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
    <!-- JS -->
    <?php include('Layout/js/tablejs.php'); ?>
    <script type="text/javascript">
    <?php for ($i = 0; $i < count($blogID); $i++) { ?>
            $(document).ready(function () {
                $(document).on('click', '#edit<?php echo $i; ?>', function () {
                    var id = $('#blogdid<?php echo $i; ?>').text();// get blog id
                    var name = $('#blogname<?php echo $i; ?>').text();// get blog name
                    var date = $('#blogdate<?php echo $i; ?>').text();// get blog date
                    var poster = $('#blogposter<?php echo $i; ?>').text();// get blog poster
                    sessionStorage.setItem("blogdid", id);
                    sessionStorage.setItem("blogname", name);
                    sessionStorage.setItem("blogdate", date);
                    sessionStorage.setItem("blogposter", poster)
                    var loc = window.location.pathname;
                    var dir = loc.substring(0, loc.lastIndexOf('/'));
                    window.location = dir + "/blog_edit.php";
                });
            });
    <?php } ?>
    </script>
</html>