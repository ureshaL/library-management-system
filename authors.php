<?php include_once('includes/top.php') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Authors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Library Management System</a></li>
                        <li class="breadcrumb-item active">Authors</li>
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
                        <h3 class="card-title d-inline-block pt-1">Manage all authors</h3>
                        <div class="float-right d-inline-block">
                            <button class="btn btn-success" data-toggle="modal" data-target="#add-modal">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Author
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Author ID</th>
                                    <th>Author Name</th>
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
                <h4 class="modal-title">Add New Author</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group">
                        <label for="autName">Author Name</label>
                        <input type="text" class="form-control"
                               id="autName" name="AuthorName"
                               placeholder="Enter Author name">
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
                <h4 class="modal-title">Update Author</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form-update">
                    <div class="form-group">
                        <label for="upCatId">Author ID</label>
                        <input type="text" class="form-control"
                               id="upAutId" name="AuthorID">
                    </div>
                    <div class="form-group">
                        <label for="upAutName">Author Name</label>
                        <input type="text" class="form-control"
                               id="upAutName" name="AuthorName"
                               placeholder="Enter Author name">
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
                <h4 class="modal-title">Delete Author?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Are you sure do you really want to delete this author?
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
<script src="controller/author-controller.js"></script>
</body>
</html>
