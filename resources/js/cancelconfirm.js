$(document).ready(function () {
    $(".cancelconfirm").click(function (evt) {
        evt.preventDefault();
        var title = $(this).data("title");
        var form = $(this).closest("form");
        var name = $(this).data("name");
        var yes = $(this).data("yes");
        var no = $(this).data("no");
        
        Swal.fire({
            title: `${title} ${name}?`,
            icon: "error",
            showCancelButton: true,
            confirmButtonText: yes,
            cancelButtonText: no,
            className: "swal-lao",
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
});