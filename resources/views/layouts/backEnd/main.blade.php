<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Kuin | {{ $title }}</title>
    <script>
        function saveScrollPosition() {
            var scrollPosition = window.scrollY;
            sessionStorage.setItem('scrollPosition', scrollPosition);
        }

        function restoreScrollPosition() {
            var savedScrollPosition = sessionStorage.getItem('scrollPosition');
            if (savedScrollPosition !== null) {
                window.scrollTo(0, savedScrollPosition);
                sessionStorage.removeItem('scrollPosition');
            }
        }
    </script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('template') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/summernote/summernote-bs4.min.css">
    {{-- Accordion --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/style.css"> {{-- https://preview.colorlib.com/theme/bac/accordion-03/ --}}

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link href="{{ asset('landingPage') }}/img/bps.png" rel="icon">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

</head>

<body
    class="hold-transition sidebar-mini {{ Request::is('tpi*') || Request::is('satker*') || Request::is('lke*') || Request::is('prov/evaluasi*') ? 'sidebar-collapse' : '' }}">
    <div class="wrapper">
        <!-- Preloader -->
        <div id="my-element" class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('img/e-kuin-logo.png') }}" alt="AdminLTELogo" height="100"
                width="100">
        </div>

        {{-- Navbar --}}
        @include('layouts.backEnd.navbar')
        {{-- EndNavbar --}}

        {{-- Sidebar --}}
        @include('layouts.backEnd.sidebar')
        {{-- EndSidebar --}}
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div id="header" class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        {{-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @can('admin')
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                @endcan
                                @isset($master)
                                    <li class="breadcrumb-item"><a href="{{ $link }}">{{ $master }}</a>
                                    </li>
                                @endisset
                                <li class="breadcrumb-item active">{{ $title }}</li>


                            </ol>
                        </div><!-- /.col --> --}}
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        {{-- Content --}}
                        @yield('content')
                        {{-- EndContent --}}

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <b href="https://adminlte.io">E-Kuin</b>.
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; {{ date('Y') }} </strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    {{-- Scroll to Top --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="fas fa-arrow-up"></i></a>
    <script src="{{ asset('') }}js/main.js"></script>


    {{-- Font Awesome updated --}}
    <script src="https://kit.fontawesome.com/48de642077.js" crossorigin="anonymous"></script>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('template') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('template') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('template') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- InputMask -->
    <script src="{{ asset('template') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('template') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('template') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script>
        //Date range picker
        var startDate = $('#reservation*').data('start');
        var endDate = $('#reservation*').data('end');
        $('#reservation*').daterangepicker({
            startDate: startDate,
            endDate: endDate,
            // Other options...
        });
    </script>

    <script>
        $(document).ready(function() {
            for (let i = 1; i <= 18; i++) {
                $(`#reservationdate${i}`).datetimepicker({
                    format: 'L'
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#reservationdate1').datetimepicker();
            $('#reservationdate2').datetimepicker({
                useCurrent: false
            });

            $("#reservationdate1").on("change.datetimepicker", function(e) {
                $('#reservationdate2').datetimepicker('minDate', e.date);
            });

            $("#reservationdate2").on("change.datetimepicker", function(e) {
                $('#reservationdate1').datetimepicker('maxDate', e.date);
            });
        });
    </script>
    {{-- Select search --}}
    <!-- Select2 -->
    <script src="{{ asset('template') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('template') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('template') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    {{-- Export to excel -> https://docs.sheetjs.com/ --}}
    <script script src="https://cdn.sheetjs.com/xlsx-latest/package/dist/xlsx.full.min.js"></script>
    {{-- Export File by excel --}}
    <script>
        function exportFile() {
            var wb = XLSX.utils.table_to_book(document.getElementById('excel'));
            XLSX.writeFile(wb, 'sample.xlsx');

        }

        function exportFile2() {
            var wb = XLSX.utils.table_to_book(document.getElementById('excel2'));
            XLSX.writeFile(wb, 'sample.xlsx');

        }
    </script>
    {{-- toast --}}
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        if (Session::has('success')) {
            Toast.fire({
                icon: 'success',
                title: "{{ Session::get('success') }}"
            })
        }
    </script>
    {{-- Accordion --}}
    {{-- Accordion --}}
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"796cb3b09d786bff","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}'
        crossorigin="anonymous"></script>
    <!-- Page specific script -->
    {{-- AdminLTE Costumize --}}
    <script>
        $(function() {
            $('#summernote').summernote({
                height: 200, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true // set focus to editable area after initializing summe
            });
            $("#example1*").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": false,



                "buttons": ["csv", "excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>





    {{-- File input --}}
    <script>
        $('.custom-file input').change(function(e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }
            $(this).next('.custom-file-label').html(files.join(', '));
        });
    </script>
    <!-- Stay In Position when refresh -->
    <script>
        // Set posisi scroll saat halaman dimuat
        window.onload = function() {
            restoreScrollPosition();
        };
    </script>


    <script>
        // Mendapatkan URL saat ini
        var currentURL = window.location.href;

        // Mengecek apakah URL mengandung ID tujuan scroll
        if (currentURL.indexOf("#") > -1) {
            // Mengambil URL saat ini
            var url = window.location.href;
            var hash2 = url.substring(url.indexOf("#") + 1);
            var hash1 = hash2.substring(0, 4)



            // Mencari elemen dengan ID tujuan
            var targetElement = document.getElementById(hash1);

            var targetElement2 = document.getElementById(hash2);

            // Memeriksa apakah elemen ditemukan 
            if (targetElement) {
                // Mengaktifkan elemen collapse
                targetElement.classList.add('show');
                targetElement.setAttribute("aria-expanded", "true");

                // Melakukan scroll otomatis ke elemen tujuan
                $('html, body').animate({
                    scrollTop: $(targetElement2).offset().top
                }, 1000);
            }
        }
    </script>

</body>

</html>
