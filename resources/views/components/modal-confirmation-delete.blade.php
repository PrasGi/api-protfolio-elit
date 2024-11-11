<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" id="confirmDeleteButton" class="btn btn-danger">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Ambil elemen-elemen yang diperlukan
    var deleteButtons = document.querySelectorAll('.delete-alert');
    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    var confirmDeleteButton = document.getElementById('confirmDeleteButton');
    var urlToDelete = '';

    // Tambahkan event listener untuk tombol delete-alert
    deleteButtons.forEach(function(button) {
      button.addEventListener('click', function() {
        // Ambil URL dan method dari tombol yang diklik
        urlToDelete = button.getAttribute('data-bs-url');

        // Tampilkan modal
        deleteModal.show();
      });
    });

    // Event listener untuk tombol konfirmasi hapus
    confirmDeleteButton.addEventListener('click', function() {
      // Kirim request menggunakan fetch dengan method DELETE
      fetch(urlToDelete, {
          method: 'DELETE'
          , headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Kirim CSRF token
            'Content-Type': 'application/json'
          , }
        , })
        .then(response => {
          window.location.reload();
        })
        .catch(error => {
          console.error('Error:', error);
          alert('An error occurred. Please try again.');
        });

      // Sembunyikan modal setelah tombol "Yes" ditekan
      deleteModal.hide();
    });
  });

</script>
