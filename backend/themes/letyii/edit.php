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
                <div class="page-content page-posts">

                    <h4>Tạo bài viết mới</h4>
                    <div class="row">

                        <div class="col-md-7">
                            <!-- Make post Widget -->
                            <div class="widget">

                                <!-- Widget head -->
                                <div class="widget-head">
                                    <h5><i class="fa fa-desktop"></i> Thông tin </h5>	
                                </div>

                                <!-- Widget body -->
                                <div class="widget-body">
                                    <!-- Post title area -->
                                    <label>Enter Title</label>
                                    <input type="text" class="form-control col-lg-8" placeholder="Enter Title">
                                    <div class="clearfix"></div>
                                    <!-- Post content area -->
                                    <label>Enter Content</label>
                                    <textarea class="form-control" rows="8" name="input"></textarea>	
                                    <div class="clearfix"></div>												
                                </div>

                                <!-- Widget foot -->
                                <div class="widget-foot">
                                    <div class="pull-left">Word Count : 253</div>
                                    <div class="pull-right">
                                        <!-- Buttons -->
                                        <button class="btn btn-default btn-xs">Save Draft</button> 
                                        <button class="btn btn-info btn-xs">Publish</button>
                                        <button class="btn btn-danger btn-xs">Trash</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-5">
                            <!-- Make post Widget -->
                            <div class="widget">

                                <!-- Widget head -->
                                <div class="widget-head">
                                    <h5>Post Details</h5>	
                                </div>

                                <!-- Widget body -->
                                <div class="widget-body">
                                    <strong>Category</strong>

                                    <ul>
                                        <li>
                                            <input type="checkbox" value="1" name="chk-1" id="chk-1-0" class="check_all_tree"> 
                                            <label for="chk-1-0">Categories in English Page</label>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" value="3" name="chk-3" checked="checked" id="chk-3-1" class="check_all_tree"> 
                                                    <label for="chk-3-1">Sightseeing Tours</label>
                                                    <ul>
                                                        <li>
                                                            <input type="checkbox" value="8" name="chk-8" checked="checked" id="chk-8-3" class="check_all_tree"> 
                                                            <label for="chk-8-3">London Coach Tours</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" value="9" name="chk-9" checked="checked" id="chk-9-3" class="check_all_tree"> 
                                                            <label for="chk-9-3">Out of London Coach Tours</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" value="10" name="chk-10" checked="checked" id="chk-10-3" class="check_all_tree"> 
                                                            <label for="chk-10-3">Walking and Bike Tours</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" value="11" name="chk-11" checked="checked" id="chk-11-3" class="check_all_tree"> 
                                                            <label for="chk-11-3">Black Taxi Tours</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" value="12" name="chk-12" checked="checked" id="chk-12-3" class="check_all_tree"> 
                                                            <label for="chk-12-3">Evening Tours</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" value="13" name="chk-13" checked="checked" id="chk-13-3" class="check_all_tree"> 
                                                            <label for="chk-13-3">Celebrity Tours</label>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <input type="checkbox" value="4" name="chk-4" id="chk-4-1" class="check_all_tree"> 
                                                    <label for="chk-4-1">Low Cost Tours</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" value="5" name="chk-5" id="chk-5-1" class="check_all_tree"> 
                                                    <label for="chk-5-1">Eurostar Trips</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" value="6" name="chk-6" id="chk-6-1" class="check_all_tree"> 
                                                    <label for="chk-6-1">Attraction Tickets</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" value="7" name="chk-7" id="chk-7-1" class="check_all_tree"> 
                                                    <label for="chk-7-1">Dining &amp; Entertainment</label>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <input type="checkbox" value="2" name="chk-2" id="chk-2-0" class="check_all_tree"> 
                                            <label for="chk-2-0">Categories in Vietnamese Page</label>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" value="15" name="chk-15" id="chk-15-2" class="check_all_tree"> 
                                                    <label for="chk-15-2">Tour tham quan</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" value="16" name="chk-16" id="chk-16-2" class="check_all_tree"> 
                                                    <label for="chk-16-2">Tour giá rẻ</label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <hr />
                                    <strong>Tags</strong>
                                    <input class="col-lg-12 form-control" type="text" placeholder="Tags"><br />
                                    <div class="clearfix"></div>
                                </div>

                                <!-- Widget foot -->
                                <div class="widget-foot">

                                </div>

                            </div>
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