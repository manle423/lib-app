<script type="text/javascript">
    let currentPage = 0;
    const categoriesPerPage = 5;

    function showPage(page) {
        const tabs = document.querySelectorAll('.tabs .tab');
        const totalCategories = tabs.length;
        const totalPages = Math.ceil(totalCategories / categoriesPerPage);

        // Ẩn tất cả các category
        tabs.forEach((tab, index) => {
            tab.style.display = 'none';
        });

        // Hiển thị các category của trang hiện tại
        const start = page * categoriesPerPage;
        const end = start + categoriesPerPage;
        for (let i = start; i < end && i < totalCategories; i++) {
            tabs[i].style.display = 'inline';
        }

        // Ẩn/Hiện các nút Previous/Next
        document.getElementById('prevPage').style.display = page > 0 ? 'inline' : 'none';
        document.getElementById('nextPage').style.display = page < totalPages - 1 ? 'inline' : 'none';
    }

    function changePage(direction) {
        const tabs = document.querySelectorAll('.tabs .tab');
        const totalCategories = tabs.length;
        const totalPages = Math.ceil(totalCategories / categoriesPerPage);

        // Chuyển sang trang mới
        currentPage += direction;

        // Giới hạn trang hiện tại trong khoảng hợp lệ
        if (currentPage < 0) {
            currentPage = 0;
        } else if (currentPage >= totalPages) {
            currentPage = totalPages - 1;
        }

        showPage(currentPage);
    }

    // Hiển thị trang đầu tiên khi tải trang
    showPage(0);
</script>
