<?php include_once('includes/top.php') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Library Management System</a></li>
                        <li class="breadcrumb-item active">Books</li>
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
                        <h3 class="card-title d-inline-block pt-1">Manage all books</h3>
                        <div class="float-right d-inline-block">
                            <button class="btn btn-success" data-toggle="modal" data-target="#add-modal">
                                <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Books
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Book Name</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Publisher</th>
                                    <th>QTY</th>
                                    <th data-width="150">Actions</th>
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
                <h4 class="modal-title">Add New Book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form-add">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control"
                               id="isbn" name="isbn"
                               placeholder="Enter isbn of book">
                    </div>
                    <div class="form-group">
                        <label for="bookName">Book Name</label>
                        <input type="text" class="form-control"
                               id="bookName" name="bookName"
                               placeholder="Enter book name">
                    </div>
                    <div class="form-group">
                        <label for="authorSelect">Author</label>
                        <select class="form-control" id="authorSelect" name="authorId">
                            <option value="-1" disabled selected>Select Author</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catSelect">Category</label>
                        <select class="form-control" id="catSelect" name="categoryId">
                            <option value="-1" disabled selected>Select Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pubSelect">Publisher</label>
                        <select class="form-control" id="pubSelect" name="publisherId">
                            <option value="-1" disabled selected>Select Publisher</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <input type="number" class="form-control"
                               id="qty" name="qty"
                               placeholder="Enter book qty">
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
                <h4 class="modal-title">Update Book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form-update">
                    <div class="form-group">
                        <label for="up-isbn">ISBN</label>
                        <input type="text" class="form-control"
                               id="up-isbn" name="isbn"
                               placeholder="Enter isbn of book">
                    </div>
                    <div class="form-group">
                        <label for="up-bookName">Book Name</label>
                        <input type="text" class="form-control"
                               id="up-bookName" name="bookName"
                               placeholder="Enter book name">
                    </div>
                    <div class="form-group">
                        <label for="up-authorSelect">Author</label>
                        <select class="form-control" id="up-authorSelect" name="authorId">
                            <option value="-1" disabled selected>Select Author</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="up-catSelect">Category</label>
                        <select class="form-control" id="up-catSelect" name="categoryId">
                            <option value="-1" disabled selected>Select Category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="up-pubSelect">Publisher</label>
                        <select class="form-control" id="up-pubSelect" name="publisherId">
                            <option value="-1" disabled selected>Select Publisher</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="up-qty">QTY</label>
                        <input type="number" class="form-control"
                               id="up-qty" name="qty"
                               placeholder="Enter book qty">
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
                <h4 class="modal-title">Delete Book?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Are you sure do you really want to delete this book?
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
<script src="controller/books-controller.js"></script>
</body>
</html>
