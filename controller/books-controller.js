const btnSave = $('#btn-save');
const btnDelete = $('#btn-delete');
const btnUpdate = $('#btn-update');
const formAdd = $('#form-add');
const formUpdate = $('#form-update');
const addModal = $('#add-modal');
const deleteModal = $('#delete-modal');
const updateModal = $('#update-modal');
const updateFormControls = {
    isbn: $('#up-isbn'),
    bookName: $('#up-bookName'),
    author: $('#up-authorSelect'),
    cat: $('#up-catSelect'),
    pub: $('#up-pubSelect'),
    qty: $('#up-qty'),
};
const tblBody = $('#user-tbl-body');
let dataTable;
function initDataTable() {
    dataTable = $("#example1").DataTable();
} initDataTable();
const addFormAuthor = $("#authorSelect");
const addFormCategory = $("#catSelect");
const addFormPublisher = $("#pubSelect");

function loadAllData() {
    $.ajax({
        url: API_URL + '/BookService.php?action=getAll',
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            dataTable.destroy();
            tblBody.html('');
            for (const row of res) {
                tblBody.append(`
                    <tr>
                        <td>${row[0]}</td>
                        <td>${row[1]}</td>
                        <td>${row[3]}</td>
                        <td>${row[5]}</td>
                        <td>${row[7]}</td>
                        <td>${row[8]}</td>
                        <td class="text-center">
                            <button onclick="loadUpdateModal('${row[0]}','${row[1]}','${row[2]}','${row[4]}','${row[6]}','${row[8]}')" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Update</button>
                            <button onclick="deleteRow('${row[0]}')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                        </td>
                    </tr>
                `);
            }
            initDataTable();
        }
    });
} loadAllData();

btnSave.click(function () {
    $.ajax({
        url: API_URL + '/BookService.php?action=save',
        method: 'POST',
        data: formAdd.serializeArray(),
        dataType: 'json'
    }).done(function (res) {
        if (res.success === true) {
            addModal.modal('hide');
            loadAllData();
        } else {
            alert(res.success);
        }
    });
});

btnUpdate.click(function () {
    $.ajax({
        url: API_URL + '/BookService.php?action=update',
        method: 'POST',
        data: formUpdate.serializeArray(),
        dataType: 'json'
    }).done(function (res) {
        if (res.success === true) {
            updateModal.modal('hide');
            loadAllData();
        } else {
            alert(res.success);
        }
    });
});

function loadAllAuthors() {
    $.ajax({
        url: API_URL + '/AuthorService.php?action=getAll',
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            for (const row of res) {
                addFormAuthor.append(`
                    <option value="${row[0]}">${row[1]}</option>
                `);
                updateFormControls.author.append(`
                    <option value="${row[0]}">${row[1]}</option>
                `);
            }
        }
    });
} loadAllAuthors();

function loadAllCategories() {
    $.ajax({
        url: API_URL + '/CategoryService.php?action=getAll',
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            for (const row of res) {
                addFormCategory.append(`
                    <option value="${row[0]}">${row[1]}</option>
                `);
                updateFormControls.cat.append(`
                    <option value="${row[0]}">${row[1]}</option>
                `);
            }
        }
    });
} loadAllCategories();

function loadAllPublishers() {
    $.ajax({
        url: API_URL + '/PublisherService.php?action=getAll',
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            for (const row of res) {
                addFormPublisher.append(`
                    <option value="${row[0]}">${row[1]}</option>
                `);
                updateFormControls.pub.append(`
                    <option value="${row[0]}">${row[1]}</option>
                `);
            }
        }
    });
} loadAllPublishers();

function loadUpdateModal(isbn, bookName, authorId, catId, pubId, qty) {
    updateFormControls.isbn.val(isbn);
    updateFormControls.bookName.val(bookName);
    updateFormControls.author.val(authorId);
    updateFormControls.cat.val(catId);
    updateFormControls.pub.val(pubId);
    updateFormControls.qty.val(qty);
    updateModal.modal('show');
}

function deleteRow(id) {
    deleteModal.modal('show');
    btnDelete.off('click');
    btnDelete.click(function () {
        $.ajax({
            url: API_URL + '/BookService.php?action=delete',
            method: 'POST',
            data: {isbn: id},
            dataType: 'json'
        }).done(function (res) {
            if (res.success != null && res.success === true) {
                deleteModal.modal('hide');
                loadAllData();
            } else {
                alert(res.success);
            }
        });
    });
}
