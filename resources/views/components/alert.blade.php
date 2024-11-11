<script>
    @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}', 'Success', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 10000
        });
    @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}', 'Error', {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 10000
        });
    @endif
</script>
