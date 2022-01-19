<!-- modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Chỉnh sửa danh mục</h4>
            </div>
            <div class="modal-body">
                <form action="../controller/CategoryController.php" method="post" enctype="multipart/form-data">
                    <div>
                        <input id="eid" name="txt_category_id" class="form-control" type="text" placeholder="" readonly>
                    </div>
                    <div>
                        <input id="ecatename" name="txt_category_name" class="form-control" type="text" placeholder="Danh mục">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="grp_btn_category" value="edit" class="btn btn-primary">Chỉnh sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- model add -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Thêm danh mục mới</h4>
            </div>
            <div class="modal-body">
                <form action="../controller/CategoryController.php" method="post">
                    <div>
                        <input class="form-control" name="txt_category_name" type="text" placeholder="Danh mục">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" name="grp_btn_category" value="add" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>