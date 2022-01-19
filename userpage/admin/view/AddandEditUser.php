<!-- Edit Modal-->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">Xem thông tin người dùng</h4>
            </div>
            <form action="controller/UserController.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">ID:</span>
                            <input type="text" name="txt_id" style="width:350px;" class="form-control" id="eid">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Username:</span>
                            <input type="text" name="txt_username" style="width:350px;" class="form-control" id="eusername">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Password:</span>
                            <input type="text" name="txt_pass" style="width:350px;" class="form-control" id="epassword">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Giới tính:</span>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="erdbMale" name="rad_gender" value="male" class="custom-control-input"checked>
                                <label class="custom-control-label" for="erdbMale">Nam</label>
                            </div>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="erdbFemale" name="rad_gender" value="female" class="custom-control-input">
                                <label class="custom-control-label" for="erdbFemale">Nữ</label>
                            </div>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Email:</span>
                            <input type="text" name="txt_email" style="width:350px;" class="form-control" id="eemail">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Quay lại</button>
                    <!-- <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Cập nhật</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- add Modal-->
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">Thêm người dùng</h4>
            </div>
            <form action="UserController.php" method="get" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Username:</span>
                            <input type="text" name="txt_username" style="width:350px;" class="form-control" id="eusername">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Password:</span>
                            <input type="text" name="txt_pass" style="width:350px;" class="form-control" id="epassword">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Giới tính:</span>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="erdbMale" name="rad_gender" value="male" class="custom-control-input"checked>
                                <label class="custom-control-label" for="erdbMale">Nam</label>
                            </div>
                            <div class="custom-control custom-radio mb-5">
                                <input type="radio" id="erdbFemale" name="rad_gender" value="female" class="custom-control-input">
                                <label class="custom-control-label" for="erdbFemale">Nữ</label>
                            </div>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Email:</span>
                            <input type="text" name="txt_email" style="width:350px;" class="form-control" id="eemail">
                        </div>     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Bỏ</button>
                    <button type="submit" name="add" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i>Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.modal -->

<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">Xóa người dùng</h4>
            </div>
            <form action="controller/UserController.php" method="post" enctype="multipart/form-data">
                <span>Bạn có chắc muốn xóa người dùng này không?</span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Quay lại</button>
                    <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> </i> Xóa</button>
                </div>
            </form>
        </div>
    </div>
</div>