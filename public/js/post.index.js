$(document).ready(function() {
    $('#posts-table').DataTable();
});

function confirmDelete(postId) {
    var modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'), {
        keyboard: false
    });
    modal.show();

    document.getElementById('deleteConfirmationModal').querySelector('.btn-secondary').onclick = function() {
        modal.hide();
    };

    document.getElementById('deleteConfirmationModal').querySelector('.btn-danger').onclick = function() {
        deletePost(postId);
    };
}

function deletePost(postId) {
    document.getElementById('delete-form-' + postId).submit();
}

$(document).ready(function() {
    $('#postDetailsModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var postId = button.data('post-id');


        $.ajax({
            url: '/admin/posts/' + postId,
            type: 'GET',
            success: function(response) {
                $('.modal-body').html(response);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);

                var errorMessage = 'An error occurred while fetching post details. Please try again later.';
                $('.modal-body').html(errorMessage);
            }
        });
    });
});
