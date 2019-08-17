const addModal = $('#add-modal');
const btnProceed = $('#btn-proceed');
const txtUserId = $('#txtUserId');
const errorUserNic = $('#error-user-nic');
const mainContent = $('.content');
const selectedBooksTblBody = $('#selected-books-tbl-body');
const msgNoBooksSelected = $('#msg-no-books-selected');
const btnConfirm = $('#btn-confirm');
const userDetailsForm = {
    nic: $('#nic'),
    name: $('#name'),
    address: $('#address'),
    mobile: $('#mobile')
};
let selectedUser = null;
const tblBody = $('#user-tbl-body');
let dataTable;
function initDataTable() {
    dataTable = $("#example1").DataTable();
} initDataTable();
let selectedBooks = [];

addModal.on('hidden.bs.modal', function () {
    if (selectedUser === null) {
        window.location.href = "index.php";
    }
});

addModal.modal('show');

btnProceed.click(function () {
    $.ajax({
        url: API_URL + '/UserService.php?action=search&nic=' + txtUserId.val(),
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res.user !== null) {
            selectedUser = res;
            userDetailsForm.nic.val(res.user.nic);
            userDetailsForm.name.val(res.user.user_name);
            userDetailsForm.address.val(res.user.address);
            userDetailsForm.mobile.val(res.user.mobile);
            mainContent.css('display', 'block');
            addModal.modal('hide');
        } else {
            errorUserNic.css('display', 'block');
            txtUserId.addClass('border-danger');
        }
    });
});

txtUserId.keydown(function () {
    errorUserNic.css('display', 'none');
    txtUserId.removeClass('border-danger');
});

function loadAllBooks() {
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
                            <button onclick="addToSelectedBooks('${row[0]}','${row[1]}','${row[3]}','${row[5]}','${row[7]}')" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Select Book</button>
                        </td>
                    </tr>
                `);
            }
            initDataTable();
        }
    });
} loadAllBooks();

function addToSelectedBooks(isbn, bookName, author, cat, pub) {
    selectedBooks.push({
        isbn: isbn,
        bookName: bookName,
        author: author,
        cat: cat,
        pub: pub
    });

    selectedBooksTblBody.html('');
    for (const book of selectedBooks) {
        selectedBooksTblBody.append(`
            <tr>
                <td>${book.isbn}</td>
                <td>${book.bookName}</td>
                <td>${book.author}</td>
                <td>${book.cat}</td>
                <td>${book.pub}</td>
            </tr>
        `);
    }
    msgNoBooksSelected.css('display', 'none');
}

btnConfirm.click(function () {
    //to code
});
