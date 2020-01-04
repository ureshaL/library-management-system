const tblBody = $('#user-tbl-body');
let dataTable;
function initDataTable() {
    dataTable = $("#example1").DataTable();
} initDataTable();
const viewBooksMdl = $('#view-books-modal');
const viewUserMdl = $('#view-user-modal');
const borrowedBooksTblBody = $('#borrowed-books-tbl-body');
const borrowedUsersTblBody = $('#borrowed-users-tbl-body');

function loadAllData() {
    $.ajax({
        url: API_URL + '/BorrowOrderService.php?action=getAll',
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
                        <td><a href="#" onclick="viewBorrowedUsers('${row[2]}')">${row[2]}</a></td>
                        <td class="text-center">
                            <button onclick="viewBorrowedBooks('${row[0]}')" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> View Books</button>
                        </td>
                    </tr>
                `);
            }
            initDataTable();
        }
    });
} loadAllData();

function viewBorrowedBooks(borrowOrderId) {
    viewBooksMdl.modal('show');
    $.ajax({
        url: API_URL + '/BookService.php?action=getByBorrowOrderId&bro_id='+borrowOrderId,
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            borrowedBooksTblBody.html('');
            for (const row of res) {
                borrowedBooksTblBody.append(`
                    <tr>
                        <td>${row[0]}</td>
                        <td>${row[1]}</td>
                        <td>${row[3]}</td>
                        <td>${row[5]}</td>
                        <td>${row[7]}</td>
                    </tr>
                `);
            }
        }
    });
}

function viewBorrowedUsers(nic) {
    viewUserMdl.modal('show');
    $.ajax({
        url:API_URL + '/UserService.php?action=search&nic='+ nic,
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.success !== null) {
            borrowedUsersTblBody.html('');
            borrowedUsersTblBody.append(`
                <tr>
                    <td>${res.user.nic}</td>
                    <td>${res.user.user_name}</td>
                    <td>${res.user.address}</td>
                    <td>${res.user.mobile}</td>
                </tr>
                `);

        }
    });
}
