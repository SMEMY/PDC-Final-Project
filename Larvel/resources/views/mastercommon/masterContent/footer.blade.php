 <!-- jQuery -->
 <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
 <!-- Bootstrap Core JS -->
 <script src="{{ asset('assets/js/popper.min.js') }}"></script>
 <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
 <!-- Slimscroll JS -->
 <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
 <!-- Chart JS -->
 <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
 <script src="{{ asset('assets/js/chart.js') }}"></script>
 <!-- Custom JS -->
 <script src="{{ asset('assets/js/app.js') }}"></script>
 <!-- Datetimepicker JS -->
 <script src="{{ asset('assets/js/moment.min.js') }}"></script>
 <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
 <!-- Select2 JS -->
 <script src="{{ asset('assets/js/select2.min.js') }}"></script>
 <!-- Tagsinput JS -->
 <script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
 <!-- bootstrap growl js -->
 <script src="{{ asset('assets/growl/jquery.bootstrap-growl.min.js') }}"></script>
 <!-- sweet alert -->
 <script src="{{ asset('assets/sweet-alert/sweetalert.min.js') }}"></script>
 <!-- chart-js -->
 <script src="{{ asset('assets/chart-js/dist/chart.min.js') }}"></script>
 {{-- <!-- <script src="{{ asset('node_modules/jspdf/dist/jspdf.umd.min.js') }}"></script> --> --}}
 <script>
     const audio = new Audio();
     audio.src = "{{ asset('assets/clickSounds/click.mp3') }}";
 </script>


 @yield('custom-js')

 </body>

 </html>
