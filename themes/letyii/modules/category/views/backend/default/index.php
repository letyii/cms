<!-- Content starts -->
<div class="container">
    <div class="page-content page-media">

        <div>
            <div class="btn-group pull-left" data-toggle="buttons">
                <button class="btn btn-primary">
                    Kích hoạt
                </button >
                <button class="btn btn-black">
                    Vô hiệu hóa
                </button>
                <button class="btn btn-primary">
                    Tiêu điểm
                </button>
                <button class="btn btn-black">
                    Bỏ tiêu điểm
                </button>
                <button class="btn btn-warning">
                    Di chuyển
                </button>
                <button class="btn btn-danger">
                    Xóa
                </button>
            </div>
            <div class="btn-group pull-right" data-toggle="buttons">
                <button class="btn btn-success" onclick="window.location = '<?php echo yii\helpers\Url::toRoute('backend/default/create'); ?>';">
                    Tạo bài viết
                </button>
                <button class="btn btn-success">
                    Tạo danh mục
                </button>
                <button class="btn btn-black">
                    Danh sách danh mục
                </button>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="widget">

            <div class="widget-head">
                <h5 class="pull-left"><i class="fa fa-camera"></i> Media</h5>	
                <div class="clearfix"></div>
            </div>

            <div class="widget-body no-padd">
                <div class="table-responsive">
                    <table class="table table-bordered fix_table_width">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" value="check1" class="checkall" />
                                </th>
                                <th>Hình ảnh</th>
                                <th class="td_free">Tiêu đề</th>
                                <th>Tác giả</th>
                                <th>Thời gian</th>
                                <th>Tiêu điểm</th>
                                <th>Điều khiển</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $i <= 20; $i++): ?>
                                <tr>
                                    <td>                  
                                        <input type="checkbox" value="check1" class="checkone" />
                                    </td>
                                    <td><img src="img/user.jpg" alt="" class="img-responsive img-thumbnail"/></td>
                                    <td class="td_free">
                                        <strong><a href="edit.php">Tàu Trường Sa mini "khoác áo mới" chờ ra biển</a></strong>
                                        <p>Tàu ngầm Trường Sa vừa được phủ lớp sơn đen bóng với hình quốc kỳ Việt Nam. Nếu được cấp phép, tàu sẽ ra biển Tiền Hải (Thái Bình) thử...</p>
                                    </td>
                                    <td>Ashok</td>
                                    <td>23/12/2012</td>
                                    <td><button class="btn btn-xs"><i class="fa fa-times"></i> </button></td>
                                    <td>
                                        <button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> </button>
                                        <button class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="widget-foot">

                <ul class="pagination pull-right">
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>

                <div class="clearfix"></div>

            </div>
        </div>

    </div>
</div>
<!-- Content ends -->
