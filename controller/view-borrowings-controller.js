const tblBody = $('#user-tbl-body');
let dataTable;
function initDataTable() {
    dataTable = $("#example1").DataTable();
} initDataTable();
const viewBooksMdl = $('#view-books-modal');
const borrowedBooksTblBody = $('#borrowed-books-tbl-body');

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
                        <td><a href="#">${row[2]}</a></td>
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
}
