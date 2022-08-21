<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>@yield('title')</title>

    {{-- icon link --}}
    <link rel="icon" href="{{ asset('assets/img/admin.png') }}">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/" />

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/cms/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/cms/css/dashboard.css') }}" rel="stylesheet" />

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('assets/cms/css/style.css') }}">

    {{-- css post --}}
    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/cms/trixeditor/css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('assets/cms/trixeditor/js/trix.js') }}"></script>
    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }
    </style>
    {{-- end trix editor --}}


    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- end Select2 -->

    {{-- end css post --}}


</head>

<body>
    {{-- header --}}

    <x-cms.header />
    {{-- end header --}}

    <div class="container-fluid">
        <div class="row">
            {{-- sidebar --}}
            <x-cms.sidebar />
            {{-- end sidebar --}}

            {{-- main --}}
            @yield('main')
            {{-- end main --}}
        </div>
    </div>

    <script src="{{ asset('assets/cms/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/cms/js/script.js') }}"></script>



    {{-- trix editor --}}
    <script>
        document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
   
    </script>
    {{-- trix editor --}}

    {{-- select2 --}}

    <script>
        $(function () {
        //Initialize Select2 Elements
        $('#tag').select2();
        });

        function previewImage()
        {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();

            oFReader.readAsDataURL(image.files[0]);
            
            oFReader.onload = function(oFREvent)
            {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
    {{-- select2 --}}

</body>

</html>