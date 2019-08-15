<?php include_once('includes/top.php') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Library Management System</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 id="booksCount">---</h3>

                            <p>Books</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-book"></i>
                        </div>
                        <a href="books.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3 id="usersCount">---</h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-person"></i>
                        </div>
                        <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 id="categoriesCount">---</h3>

                            <p>Categories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-filing"></i>
                        </div>
                        <a href="categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3 id="borrowingsCount">---</h3>

                            <p>Borrowings</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-list-outline"></i>
                        </div>
                        <a href="view-borrowings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12 mb-3">
                    <img src="dist/img/intro-img.png" class="w-100" alt="Intro Image">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include_once('includes/common-scripts.php') ?>
</body>
</html>
