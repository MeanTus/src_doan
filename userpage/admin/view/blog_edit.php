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
            <form action="controller/BlogController.php" method="post" enctype="multipart/form-data">
            <div>
                <button type="submit" name="edit" class="mb-15 btn btn-primary">Chỉnh sửa</button>
            </div>
            
            <div class="container-fluid">
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:150px;">ID:</span>
                    <input type="text" name="txt_id" style="width:350px;" class="form-control" id="blogdid">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:150px;">Chủ đề:</span>
                    <input type="text" name="txt_vd" style="width:350px;" class="form-control" id="blogname">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:150px;">Ngày đăng:</span>
                    <input type="text" name="txt_status" style="width:350px;" class="form-control" id="blogdate">
                </div>   
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:150px;">Người đăng:</span>
                    <input type="text" name="txt_totalprice" style="width:350px;" class="form-control" id="blogposter">
                </div>   
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:150px;"></span>
                    <p class="input-group-addon">Nội dung:</p>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon fw-bold" style="width:150px;"></span>
                    <textarea id="blogContent" name="w3review" rows="20" cols="100">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad possimus quas, officia nobis aliquid reprehenderit tempora soluta quasi fugiat ab blanditiis accusamus quisquam voluptates quam, autem neque illum nostrum inventore.
                    </textarea>
                </div>
                           
                            </div>
            </form>
                            </div>
                            </div>
                            <!-- load data -->
    <script type="text/javascript">

        $(document).ready(function () {
            $(document).on('click', '#btnt', function () {
                alert("aaaaaaa");
            });
        });
    </script>
    <!-- js -->
    <?php include('Layout/js/tablejs.php'); ?>


</html>