<style>
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-success {
        color: #000000;
        background-color: #fff5b6;
        border-color: #000000;
    }

    .alert-success .close {
        color: #ab4f4f;
    }

    .alert-success a {
        color: #ffffff;
    }
</style>


@if(session('message'))
    <div id="alert-container" class="alert alert-success alert-dismissible fade show" role="alert">
        <button id="close" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('message') }}
    </div>

    <script>
        const closeAlert = () => {
            const box = document.getElementById('alert-container');
            box.style.display = 'none';
        };
        setTimeout(closeAlert, 4000);
        const xbtn = document.getElementById('close');
        xbtn.addEventListener('click', closeAlert);
    </script>
@endif

<script>
    document.getElementById('imageInput').addEventListener('change', function (e) {
        var preview = document.getElementById('preview');
        var file = e.target.files[0];
        var reader = new FileReader();

        reader.onload = function () {
            var img = new Image();
            img.src = reader.result;
            img.style.maxWidth = '100%';
            img.style.maxHeight = '200px';
            preview.innerHTML = '';
            preview.appendChild(img);
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
</script>
