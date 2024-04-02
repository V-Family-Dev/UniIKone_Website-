$(document).ready(function() {
    // For example:

    const currentDate = new Date();
    const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"];

    const month = monthNames[currentDate.getMonth()];
    const day = currentDate.getDate();
    const year = currentDate.getFullYear();

    const formattedDate = `${month} ${day}, ${year}`;

    document.getElementById('currentDate').innerHTML = formattedDate;

    $('[data-toggle=sidebar-colapse]').click(function () {
        SidebarCollapse();
    });

    $('.menu-collapsed').toggleClass('d-block');
    $('#sidebar-container').toggleClass('d-none');

    function SidebarCollapse() {
        $('.menu-collapsed').toggleClass('d-block');
        $('#sidebar-container').toggleClass('d-block');

        $('#collapse-icon').toggleClass('fa-bars fa-times');
    }

    $('.dataTables_filter').hide();

    var table = $('#showTable').DataTable();

    $('#searchBtn').on('click', function() {
        performSearch();
    });

    $('#searchBox').on('keydown', function(e) {
        if (e.keyCode === 13) { // Check if Enter key is pressed
            performSearch();
        }
    });

    function performSearch() {
        var searchText = $('#searchBox').val();
        table.search(searchText).draw();
    }
});
