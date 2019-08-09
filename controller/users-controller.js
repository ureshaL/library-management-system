const btnSave = $('#btn-save');
const btnDelete = $('#btn-delete');
const btnUpdate = $('#btn-update');
const cusFormAdd = $('#cus-form-add');
const cusFormUpdate = $('#cus-form-update');
const addModal = $('#add-modal');
const deleteModal = $('#delete-modal');
const updateModal = $('#update-modal');
const updateFormControls = {
    nic: $('#upNic'),
    name: $('#upName'),
    mobile: $('#upMobile'),
    address: $('#upAddress')
};
const userTblBody = $('#user-tbl-body');
let dataTable;
function initDataTable() {
    dataTable = $("#example1").DataTable();
} initDataTable();

btnSave.click(function () {
    $.ajax({
        url: API_URL + '/UserService.php?action=save',
        method: 'POST',
        data: cusFormAdd.serializeArray(),
        dataType: 'json'
    }).done(function (res) {
        if (res.success === true) {
            addModal.modal('hide');
            loadAllUsers();
        } else {
            alert(res.success);
        }
    });
});

btnUpdate.click(function () {
    $.ajax({
        url: API_URL + '/UserService.php?action=update',
        method: 'POST',
        data: cusFormUpdate.serializeArray(),
        dataType: 'json'
    }).done(function (res) {
        if (res.success === true) {
            updateModal.modal('hide');
            loadAllUsers();
        } else {
            alert(res.success);
        }
    });
});

function loadAllUsers() {
    $.ajax({
        url: API_URL + '/UserService.php?action=getAll',
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            dataTable.destroy();
            userTblBody.html('');
            for (const user of res) {
                userTblBody.append(`
                    <tr>
                        <td>${user[0]}</td>
                        <td>${user[1]}</td>
                        <td>${user[2]}</td>
                        <td>${user[3]}</td>
                        <td class="text-center">
                            <button onclick="loadUpdateModal('${user[0]}','${user[1]}','${user[2]}','${user[3]}')" class="btn btn-secondary btn-sm"><i class="fas fa-edit"></i> Update</button>
                            <button onclick="deleteUser('${user[0]}')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                        </td>
                    </tr>
                `);
            }
            initDataTable();
        }
    });
} loadAllUsers();

function loadUpdateModal(nic, name, mobile, address) {
    updateFormControls.nic.val(nic);
    updateFormControls.name.val(name);
    updateFormControls.mobile.val(mobile);
    updateFormControls.address.val(address);

    updateModal.modal('show');
}

function deleteUser(userId) {
    deleteModal.modal('show');
    btnDelete.click(function () {
        $.ajax({
            url: API_URL + '/UserService.php?action=delete',
            method: 'POST',
            data: {nic: userId},
            dataType: 'json'
        }).done(function (res) {
            if (res.success === true) {
                deleteModal.modal('hide');
                loadAllUsers();
            } else {
                alert(res.success);
            }
        });
    });
}
