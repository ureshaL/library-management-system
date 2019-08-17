const addModal = $('#add-modal');
const btnProceed = $('#btn-proceed');
const txtUserId = $('#txtUserId');
let selectedUser = null;

addModal.on('hidden.bs.modal', function () {
    if (selectedUser === null) {
        window.location.href = "index.php";
    }
});

addModal.modal('show');

btnProceed.click(function () {
    $.ajax({
        url: API_URL + '/UserService.php?action=search?nic=' + txtUserId.val(),
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            selectedUser = res;
            addModal.modal('hide');
        }
    });
});
