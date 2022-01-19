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
                            <h4 class="text-blue h4 text-center">Tài khoản người dùng</h4>
                            <!-- Thêm người dùng mới -->
                            <div>
                                <a href="#" class="btn" data-toggle="modal" data-target="#adduser" type="button">
                                    <button type="button" class="btn btn-primary">Thêm mới</button>
                                </a>
                            </div>
                        </div>
                        <div class="pb-20">
                            <table class="data-table table stripe hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th class="datatable-nosort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- loop load data -->
                                    <?php for ($i = 0; $i < count($data['list']); $i++) { ?>
                                        <tr>
                                            <td id="id<?php echo $i; ?>" class="table-plus"><?php echo $data['list'][$i]['user_id'] ?></td>
                                            <td id="username<?php echo $i; ?>"><?php echo $data['list'][$i]['username'] ?></td>
                                            <td id="password<?php echo $i; ?>"><?php echo $data['list'][$i]['password'] ?> </td>
                                            <td id="sex<?php echo $i; ?>"><?php echo $data['list'][$i]['sex'] ? "Nam" : "Nữ" ?> </td>
                                            <td id="email<?php echo $i; ?>"><?php echo $data['list'][$i]['email'] ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a class="dropdown-item" id="edit<?php echo $i; ?>" href="#"><i class="dw dw-edit2"></i> Chi tiết</a>
                                                        <a
                                                        class="dropdown-item" 
                                                        id="delete"
                                                        href="?action=block&&email=<?php echo $data['list'][$i]['email'] ?>">
                                                        <i class="dw dw-delete-3"></i> 
                                                            Khóa
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

        <!-- click chỉnh sửa -->
        <?php include('../view/AddandEditUser.php'); ?>

        <!-- js -->
        <?php include('../view/Layout/js/tablejs.php'); ?>

        <?php for ($i = 0; $i < count($data['list']); $i++) { ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $(document).on('click', '#edit<?php echo $i; ?>', function () {
                    var name = $('#username<?php echo $i; ?>').text().trim();// get username
                    var pass = $('#password<?php echo $i; ?>').text().trim();// get password
                    var sex = $('#sex<?php echo $i; ?>').text().trim();// get sex
                    var id = $('#id<?php echo $i; ?>').text().trim();// get id
                    var mail = $('#email<?php echo $i; ?>').text().trim();// get email
                    $('#edit').modal('show');//load modal
                    $('#eusername').val(name);
                    $('#epassword').val(pass);
                    $('#eid').val(id);
                    $('#eemail').val(mail);
                    if (sex.trim() === "Nam") {
                        $('#erdbMale').attr('checked', true);
                    } else {
                        $('#erdbFemale').attr('checked', true);
                    }
                });
            });
        </script>
    <?php } ?>
</html>