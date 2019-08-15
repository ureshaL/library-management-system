
const userCount = $('#usersCount');
const bookCount = $('#booksCount');
const borrowCount = $('#borrowingsCount');
const catCount = $('#categoriesCount');

function getDashboardCounts() {
    $.ajax({
        url: API_URL + '/BorrowOrderService.php?action=getDashboardCounts',
        method: 'GET',
        dataType: 'json'
    }).done(function (res) {
        if (res !== null) {
            userCount.html(res.userCount);
            bookCount.html(res.bookCount);
            catCount.html(res.categoryCount);
            borrowCount.html(res.borrowingCount);
        }
    });
} getDashboardCounts();
