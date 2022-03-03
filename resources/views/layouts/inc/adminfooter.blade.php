<footer class="footer py-4  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          {{-- <div class="copyright text-center text-sm text-muted text-lg-start">
            © <script>
              document.write(new Date().getFullYear())
            </script>,
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
            for a better web.
          </div> --}}
        </div>
        <div class="col-lg-12">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
         
            <li class="nav-item">
              <a href="#" class="nav-link pe-0 text-muted" target="_blank">About</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Services</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</main>

<script src="{{asset('admin/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/js/plugins/smooth-scrollbar.min.js')}}"></script>



<script src="{{asset('admin/js/material-dashboard.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
  <script>
    swal("{{session('status')}}"," ","success");
   
  </script>
@endif
@if(session('home'))
  <script>
    swal("{{session('home')}}");
    
           
        
  </script>
@endif
@php
Session::forget('status');
@endphp
</body>

</html>