<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Ahmadshoh Nasrulloev">
    <?=$this->getMeta();?>
    <base href="http://localhost/shop.local/">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="public/admin/fonts/fontawesome.min.css" type="text/css">

    <link rel="stylesheet" href="public/admin/css/summernote.css" type="text/css">

    <link rel="stylesheet" href="public/admin/css/admin.min.css" type="text/css">
    <link rel="stylesheet" href="public/admin/css/style.css" type="text/css">
</head>

<body id="page-top">

<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <hr class="sidebar-divider my-0">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=ADMIN?>">
            <div class="sidebar-brand-text mx-3">Android</div>
        </a>

        <li class="nav-item">
            <a class="nav-link" href="<?=ADMIN?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Home</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
               aria-expanded="true" aria-controls="collapseCategory">
                <i class="fa fa-fw fa-align-justify"></i>
                <span>Категории</span>
            </a>
            <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
                <div class="bg-white collapse-inner rounded">
                    <a class="collapse-item" href="<?=ADMIN?>/category">Список категорий</a>
                    <a class="collapse-item" href="<?=ADMIN?>/category/add">Добавить категорию</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="<?=ADMIN?>/order">
                <i class="fa fa-fw fa-money-bill-alt"></i>
                <span>Заказы</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
               aria-expanded="true" aria-controls="collapseProducts">
                <i class="fa fa-fw fa-cart-plus"></i>
                <span>Товары</span>
            </a>

            <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
                <div class="bg-white collapse-inner rounded">
                    <a class="collapse-item" href="<?=ADMIN?>/product">Список товаров</a>
                    <a class="collapse-item" href="<?=ADMIN?>/product/add">Добавить товар</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
               aria-expanded="true" aria-controls="collapseUsers">
                <i class="fa fa-fw fa-users"></i>
                <span>Пользователи</span>
            </a>

            <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                <div class="bg-white collapse-inner rounded">
                    <a class="collapse-item" href="<?=ADMIN?>/user">Список пользователей</a>
                    <a class="collapse-item" href="<?=ADMIN?>/user/add">Добавить пользователя</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="<?=ADMIN?>/slider">
                <i class="fa fa-fw fa-image"></i>
                <span>Слайдер</span></a>
        </li>

        <hr class="sidebar-divider">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <h3>Панель управления</h3>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ahmadshoh Nasrulloev</span>
<!--                            <img class="img-profile rounded-circle"-->
<!--                                 src="https://source.unsplash.com/QAB-WJcbgJk/60x60">-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <div class="container">
                <div class="row" style="margin-top: 25px;">
                    <div class="col-md-12">
                        <?php if(isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($_SESSION['success'])): ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?=$content?>
    </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Android 2019</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>


<script src="public/js/jquery.js"></script>

<script src="public/admin/js/bootstrap.bundle.min.js"></script>

<script src="public/admin/js/jquery.easing.min.js"></script>

<script src="public/admin/js/summernote.min.js"></script>
<script src="public/admin/js/summernote-ru-RU.js"></script>
<script src="public/admin/js/admin.min.js"></script>
<script src="public/admin/js/admin.js"></script>

</body>

</html>