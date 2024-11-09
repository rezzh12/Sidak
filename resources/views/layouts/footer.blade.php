 <!-- ======= Footer ======= -->
 <footer id="footer">


   <div class="container py-3">
     <div class="copyright pt-1">
       &copy; Copyright <strong><span>Eli</span></strong>. All Rights Reserved
     </div>
     <div class="credits  pt-1">
       <!-- All the links in the footer should remain intact. -->
       <!-- You can delete the links only if you purchased the pro version. -->
       <!-- Licensing information: https://bootstrapmade.com/license/ -->
       <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
       <b>Versi</b> <a href="https://bootstrapmade.com/">1.0</a>
     </div>
   </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
 <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('asset_user/vendor/aos/aos.js')}}"></script>
 <script src="{{asset('asset_user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('asset_user/vendor/glightbox/js/glightbox.min.js')}}"></script>
 <script src="{{asset('asset_user/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
 <script src="{{asset('asset_user/vendor/php-email-form/validate.js')}}"></script>
 <script src="{{asset('asset_user/vendor/swiper/swiper-bundle.min.js')}}"></script>
 <script src="{{asset('asset_user/vendor/slick/slick.min.js')}}"></script>

 <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

 <!-- Template Main JS File -->
 <script src="{{asset('asset_user/js/main.js')}}"></script>
 <script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE')}}/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE')}}/dist/js/pages/dashboard.js"></script>

 <script>
   $("#example1").DataTable({
     "responsive": true,
     "autoWidth": false,
   });

   $("input[name=pencarian]:radio").click(function() {
     if ($('input[name=pencarian]:checked').val() == "rekomendasi") {
       $('.pencek').attr("Disabled", true);
     } else if ($('input[name=pencarian]:checked').val() == "penerima") {
       $('.pencek').attr("Disabled", false);
     }
   });
 </script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        time: 3000,
    })
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type')}}";
    switch (type) {
        case 'info':
            Toast.fire({
                type: 'info',
                title: "{{Session::get('message')}}"
            })
            break;
        case 'success':
            Toast.fire({
                type: 'success',
                title: "{{Session::get('message')}}"
            })
            break;
        case 'warning':
            Toast.fire({
                type: 'warning',
                title: "{{Session::get('message')}}"
            })
            break;
        case 'error':
            Toast.fire({
                type: 'error',
                title: "{{Session::get('message')}}"
            })
            break;
        case 'dialog_error':
            Toast.fire({
                type: 'error',
                title: "{{Session::get('message')}}",
                timer: 3000
            })
            break;
    }
    @endif

    @if($errors -> any())
    @foreach($errors -> all() as $error)
    Swal.fire({
        type: 'error',
        title: "Ooops",
        text: "{{ $error }}",
    })
    @endforeach
    @endif
    $('#table-data').DataTable();
    let baseurl = "<?=url('/')?>";
    let fullURL = "<?=url()->full()?>";
    </script>
  <script>
    
    @if(session('warning'))
            Swal.fire({
                title: 'Peringatan!',
                text: "{{ session('warning') }}",
                icon: 'warning',
                timer: 3000
            })
        @endif
        @if($errors->any())
            @php
                $message = '';
                foreach($errors->all() as $error)
                {
                    $message .= $error."<br/>";
                }
            @endphp
            Swal.fire({
                title: 'kesalahan',
                html: "{!! $message !!}",
                icon: 'error',
            })
        @endif

    @if(session('status'))
            Swal.fire({
                title: 'Selamat!',
                text: "{{ session('status') }}",
                icon: 'Success',
                timer: 3000
            })
        @endif
        @if($errors->any())
            @php
                $message = '';
                foreach($errors->all() as $error)
                {
                    $message .= $error."<br/>";
                }
            @endphp
            Swal.fire({
                title: 'kesalahan',
                html: "{!! $message !!}",
                icon: 'error',
            })
        @endif
        
    </script>
<script>
        $(document).ready( function () {
    $('#table-data').DataTable();
} );
    </script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type ="text/javascript" src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

                <script type ="text/javascript" src="https://cdn.datatables.net/1.11.13/js/jquery.dataTables.min.js"></script>
                <script type ="text/javascript" src="https://cdn.datatables.net/1.11.13/js/datTables.bootstrap5.min.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
}); 
// DOMContentLoaded  end
                </script>

 </body>

 </html>