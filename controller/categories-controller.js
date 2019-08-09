const btnSave = $('#btn-save');
const btnDelete = $('#btn-delete');
const btnUpdate = $('#btn-update');
const formAdd = $('#form-add');
const formUpdate = $('#form-update');
const addModal = $('#add-modal');
const deleteModal = $('#delete-modal');
const updateModal = $('#update-modal');
const updateFormControls = {
    catId: $('#upCatId'),
    catName: $('#upCatName')
};
const tblBody = $('#user-tbl-body');
let dataTable;
function initDataTable() {
    dataTable = $("#example1").DataTable();
} initDataTable();

btnSave.click(function () {
    $.ajax({
        url: API_URL + '/CategoryService.php?action=save',
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
        url: API_URL + '/CategoryService.php?action=update',
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

function loadAllData() {
    $.ajax({
        url: API_URL + '/CategoryService.php?action=getAll',
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
                        <td class="text-center">
                            <button onclick="loadUpdateModal('${row[0]}','${row[1]}','${row[2]}','${row[3]}')" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Update</button>
                            <button onclick="deleteRow('${row[0]}')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                        </td>
                    </tr>
                `);
            }
            initDataTable();
        }
    });
} loadAllData();

function loadUpdateModal(catId, catName) {
    updateFormControls.catId.val(catId);
    updateFormControls.catName.val(catName);

    updateModal.modal('show');
}

function deleteRow(id) {
    deleteModal.modal('show');
    btnDelete.click(function () {
        $.ajax({
            url: API_URL + '/CategoryService.php?action=delete',
            method: 'POST',
            data: {CategoryID: id},
            dataType: 'json'
        }).done(function (res) {
            if (res.success === true) {
                deleteModal.modal('hide');
                loadAllData();
            } else {
                alert(res.success);
            }
        });
    });
}
