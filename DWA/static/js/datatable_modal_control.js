/*
    Used to control the modal that shows details on a datatable. 

    USAGE:
        Add the class 'modalToggle' to any <tr> tag that need to show its data
*/

$(() => {
    $(".modalToggle").click((e) => {
        if (!$(e.target).is("input"))
            $("#detailModal").modal('show');
    });
});