<?php include_once('includes/top.php') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Borrow Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Library Management System</a></li>
                        <li class="breadcrumb-item active">Borrow Books</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="display: none;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title d-inline-block pt-1">Manage All User Borrwings</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="card">
                            <div class="card-header bg-light">User Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nic">Nic</label>
                                            <input type="text" class="form-control" id="nic" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" class="form-control" id="mobile" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-light">Search Books</div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped w-100">
                                    <thead>
                                    <tr>
                                        <th>ISBN</th>
                                        <th>Book Name</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Publisher</th>
                                        <th>QTY</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="user-tbl-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-light">Selected Books</div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped w-100">
                                    <thead>
                                    <tr>
                                        <th>ISBN</th>
                                        <th>Book Name</th>
                                        <th>Author</th>
                                        <th>Category</th>
                                        <th>Publisher</th>
                                    </tr>
                                    </thead>
                                    <tbody id="selected-books-tbl-body">

                                    </tbody>
                                </table>
                                <div class="text-center pt-1">
                                    <span id="msg-no-books-selected">No books selected</span>
                                </div>

                                <div class="text-right mt-3">
                                    <button id="btn-confirm" class="btn btn-success">
                                        <i class="far fa-check-circle"></i> Confirm Borrowing
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Add Modal -->
<div class="modal fade" id="add-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Enter User NIC</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group">
                        <label for="txtUserId">User NIC</label>
                        <input type="text" class="form-control"
                               id="txtUserId" placeholder="Enter user nic">
                        <span id="error-user-nic" class="text-danger" style="display: none">*cannot find user</span>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="btn-proceed" class="btn btn-success">Proceed</button>
            </div>

        </div>
    </div>
</div>

<?php include_once('includes/common-scripts.php') ?>
<script src="constants/constants.js"></script>
<script src="controller/borrow-books-controller.js"></script>
</body>
</html>
