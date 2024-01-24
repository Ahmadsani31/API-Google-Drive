<form action="{{ route('save.file') }}" onsubmit="return false" id="form-simpan" class="form-horizontal" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Form -->
    <div class="form-group mb-4">
        <label for="email">Nama</label>
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1">
                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                    </path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
            </span>
            <input type="text" name="nama" class="form-control" placeholder="nama"
                id="email" autofocus required>
        </div>
    </div>
    <!-- End of Form -->
    <div class="form-group">
        <!-- Form -->
        <div class="form-group mb-4">
            <label for="password">File</label>
            <div class="input-group">
                <input type="file" name="filePdf" placeholder="Password" class="form-control" id="password"
                    required>
            </div>
        </div>
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-gray-800">Upload</button>
    </div>
</form>
    <!-- JS Libraies -->
<script>
    $(document).ready(function() {
        $('#form-simpan').submit(function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                enctype: 'multipart/form-data',
                data: new FormData(form),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data, textStatus) {

                    console.log(data);
                    console.log(textStatus);
                },
                error: function(jqXhr, textStatus, errorMessage) {
                    console.log(textStatus)
                    console.log(errorMessage)
                    console.log(jqXhr.responseJSON.message)
        
                }
            })
        });
    });
</script>
    <!-- Page Specific JS File -->

