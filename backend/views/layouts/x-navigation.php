<?php
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
?>
<nav id="main-menu-navigation" class="navigation-main">
    <div class="nav-lavel">M01 - Quản trị hệ thống</div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-box"></i><span>Cấu hình phân quyền</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/rbac/route') ?>" class="menu-item">Route</a>
            <a href="<?= Url::to('/rbac/permission') ?>" class="menu-item">Permission</a>
            <a href="<?= Url::to('/rbac/role') ?>" class="menu-item">role</a>
            <a href="<?= Url::to('/rbac/assignment') ?>" class="menu-item">Assignment</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-box"></i><span>Tài khoản quản trị</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/user/create') ?>" class="menu-item">Thêm mới</a>
            <a href="<?= Url::to('/user/index') ?>" class="menu-item">Danh sách</a>
        </div>
    </div>
    <div class="nav-lavel">M02 - Dữ liệu</div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-box"></i><span>Banner</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/banner/create')?>" class="menu-item">Thêm mới</a>
            <a href="<?= Url::to('/banner/index')?>" class="menu-item">Danh sách</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-box"></i><span>Tin tức</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/articles/create')?>" class="menu-item ">Thêm mới</a>
            <a href="<?= Url::to('/articles/index')?>" class="menu-item">Danh sách</a>
            <a href="<?= Url::to('/tags/index')?>" class="menu-item">Tags</a>
            <a href="<?= Url::to('/cat-articles/index')?>" class="menu-item">Nhóm tin</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-gitlab"></i><span>Bảo hiểm</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/products/create')?>" class="menu-item">Thêm mới</a>
            <a href="<?= Url::to('/products/index')?>" class="menu-item">Danh sách</a>
            <a href="<?= Url::to('/cat-insurrances/index')?>" class="menu-item">Nhóm bảo hiểm</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-gitlab"></i><span>Hợp đồng /Thanh toán</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/contract/index')?>" class="menu-item">Hợp đồng</a>
            <a href="<?= Url::to('/payment/index')?>" class="menu-item">Thanh toán</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-gitlab"></i><span>Khách hàng</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/customer/create')?>" class="menu-item">Thêm mới</a>
            <a href="<?= Url::to('/customer/index')?>" class="menu-item">Danh sách</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-gitlab"></i><span>Email</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/mail/mail-boi-hoan')?>" class="menu-item">Email bồi hoàn</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-gitlab"></i><span>Thanh viên/Khách hàng/Đối tác</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/parter/index')?>" class="menu-item">Đối tác</a>
        </div>
    </div>
    <div class="nav-lavel">M03 - Thống kê/Báo cáo</div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-box"></i><span>Cấu hình phân quyền</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/rbac/route') ?>" class="menu-item">Route</a>
            <a href="<?= Url::to('/rbac/permission') ?>" class="menu-item">Permission</a>
            <a href="<?= Url::to('/rbac/role') ?>" class="menu-item">role</a>
            <a href="<?= Url::to('/rbac/assignment') ?>" class="menu-item">Assignment</a>
        </div>
    </div>
    <div class="nav-item has-sub">
        <a href="#"><i class="ik ik-box"></i><span>Tài khoản quản trị</span></a>
        <div class="submenu-content">
            <a href="<?= Url::to('/user/create') ?>" class="menu-item">Thêm mới</a>
            <a href="<?= Url::to('/user/index') ?>" class="menu-item">Danh sách</a>
        </div>
    </div>
</nav>