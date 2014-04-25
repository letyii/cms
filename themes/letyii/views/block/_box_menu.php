                <!-- Sidebar starts -->
                <div class="sidebar">
                    <!-- Logo starts -->
                    <div class="logo">
                        <h1><a href="<?php // echo Url::home(); ?>">LetYii 1.0</a></h1>
                    </div>
                    <!-- Logo ends -->

                    <!-- Sidebar buttons starts -->
                    <div class="sidebar-buttons text-center">
                        <!-- User button -->
                        <div class="btn-group">
                            <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/index']); ?>" class="btn btn-black btn-xs"><i class="fa fa-user"></i></a>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl(['user/index']); ?>" class="btn btn-danger btn-xs">Hồ sơ người dùng</a>
                        </div>
                        <!-- Logout button -->
                        <div class="btn-group">
                            <a href="login.html" class="btn btn-black btn-xs"><i class="fa fa-power-off"></i></a>
                            <a href="<?php echo \Yii::$app->urlManager->createUrl(['site/logout']); ?>" class="btn btn-danger btn-xs">Thoát</a>
                        </div>
                    </div>
                    <!-- Sidebar buttons ends -->

                    <!-- Sidebar search -->
                    <div class="sidebar-search">
                        <form class="form-inline" role="form">
                            <div class="input-group">
                                <input type="text" class="form-control" id="s" placeholder="Nhập từ khóa tìm kiếm...">
                                <!-- Search button -->
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <!-- Sidebar search -->

                    <!-- Sidebar navigation starts -->
                    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>
                    <div class="sidey">
                        <ul class="nav">
                            <li><a href="<?php echo \yii\helpers\Url::home(); ?>"><i class="fa fa-desktop"></i> Tổng quan</a></li>
                            <?php foreach (array_keys(Yii::$app->modules) as $module): ?>
                            <?php
                            if ($module == 'debug')
                                continue;
                            $moduleUrl = ($module == 'gii') ? \Yii::$app->urlManager->createUrl([$module]) : \Yii::$app->urlManager->createUrl([$module . '/backend/default/index']);
                            ?>
                            <li<?php if ($module == Yii::$app->controller->module->id): ?> class="current"<?php endif; ?>><a href="<?php echo $moduleUrl; ?>"><i class="fa fa-folder<?php if ($module == Yii::$app->controller->module->id): ?>-open<?php endif; ?>"></i> <?php echo $module; ?></a></li>
                            <?php endforeach; ?>
                        </ul>               
                    </div>
                    <!-- Sidebar navigation ends -->
                </div>
                <!-- Sidebar ends -->
