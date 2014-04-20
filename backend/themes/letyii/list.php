<?php include "./_header.php"; ?>
        <div class="out-container">
            <div class="outer">
                <?php include "./_box_menu.php"; ?>

                <!-- Mainbar starts -->
                <div class="mainbar">
                    <?php include "./_box_dashboard.php"; ?>
                    <?php include "./_box_pathway.php"; ?>

                    <!-- Content starts -->
                    <div class="container">
                        <div class="page-content page-media">
                            
                            <div>
                                <div class="btn-group pull-left" data-toggle="buttons">
                                    <label class="btn btn-primary">
                                        <input type="checkbox"> Kích hoạt
                                    </label>
                                    <label class="btn btn-black">
                                        <input type="checkbox"> Vô hiệu hóa
                                    </label>
                                    <label class="btn btn-primary">
                                        <input type="checkbox"> Tiêu điểm
                                    </label>
                                    <label class="btn btn-black">
                                        <input type="checkbox"> Bỏ tiêu điểm
                                    </label>
                                    <label class="btn btn-warning">
                                        <input type="checkbox"> Di chuyển
                                    </label>
                                    <label class="btn btn-danger">
                                        <input type="checkbox"> Xóa
                                    </label>
                                </div>
                                <div class="btn-group pull-right" data-toggle="buttons">
                                    <label class="btn btn-success">
                                        <input type="checkbox"> Tạo bài viết
                                    </label>
                                    <label class="btn btn-success">
                                        <input type="checkbox"> Tạo danh mục
                                    </label>
                                    <label class="btn btn-black">
                                        <input type="checkbox"> Danh sách danh mục
                                    </label>
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

                </div>
                <!-- Mainbar ends -->

                <div class="clearfix"></div>
            </div>
        </div>
<?php include "./_footer.php"; ?>