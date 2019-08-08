<?php include_once('includes/top.php') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Library Management System</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title d-inline-block pt-1">Manage all users</h3>
                        <div class="float-right d-inline-block">
                            <button class="btn btn-success" data-toggle="modal" data-target="#add-modal">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New User
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User NIC</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="user-tbl-body">
                            </tbody>
                        </table>
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
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="cus-form-add">
                    <div class="form-group">
                        <label for="nic">User NIC</label>
                        <input type="text" class="form-control" id="nic" name="nic" placeholder="970243097V">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="userName" placeholder="John Smith">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="0779293446">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="No.100, Green Avenue,Colombo 7, Sri Lanka"></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="btn-save" class="btn btn-success">Save</button>
            </div>

        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="update-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Update User</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="cus-form-update">
                    <div class="form-group">
                        <label for="upNic">User NIC</label>
                        <input type="text" class="form-control" id="upNic" name="nic" placeholder="970243097V">
                    </div>
                    <div class="form-group">
                        <label for="upName">Name</label>
                        <input type="text" class="form-control" id="upName" name="userName" placeholder="John Smith">
                    </div>
                    <div class="form-group">
                        <label for="upMobile">Mobile Number</label>
                        <input type="text" class="form-control" id="upMobile" name="mobile" placeholder="0779293446">
                    </div>
                    <div class="form-group">
                        <label for="upAddress">Address</label>
                        <textarea class="form-control" id="upAddress" name="address" placeholder="No.100, Green Avenue,Colombo 7, Sri Lanka"></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="btn-update" class="btn btn-success">Update</button>
            </div>

        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete User?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Are you sure do you really want to delete this user?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="btn-delete" class="btn btn-danger">Delete</button>
            </div>

        </div>
    </div>
</div>

<?php include_once('includes/common-scripts.php') ?>
<script src="constants/constants.js"></script>
<script src="controller/users-controller.js"></script>
</body>
</html>
