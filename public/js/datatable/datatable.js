$(document).ready(function() {
    $('#employeTable').DataTable({
        "aLengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ]
    });
});

// function alert_delete() {

//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'

//     }).then((result) => {
//         if (result.isConfirmed) {
//             window.location.href = $("#deleteemploye").getAttribute('href');
//         }
//     })
// }