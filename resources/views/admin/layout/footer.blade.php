  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/admin') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/admin') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/admin') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('assets/admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- tinymce -->
<script src="{{ asset('assets/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin') }}/dist/js/adminlte.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- AdminLTE for demo purposes -->
<script>
  CKEDITOR.replace('editorku', {
    height: 60,
    // Define the toolbar groups as it is a more accessible solution.
    toolbarGroups: [{
        "name": "basicstyles",
        "groups": ["basicstyles"]
      },
      {
        "name": "links",
        "groups": ["links"]
      },
      {
        "name": "paragraph",
        "groups": ["list", "blocks"]
      },
      {
        "name": "document",
        "groups": ["mode"]
      },
      
    ],
    // Remove the redundant buttons from toolbar groups defined above.
    removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
  });
  // Tes
  
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace( 'kontenku',
    {
      filebrowserBrowseUrl : '{{ asset("assets/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=") }}',
      filebrowserUploadUrl : '{{ asset("assets/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=") }}',
      filebrowserImageBrowseUrl : '{{ asset("assets/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr==") }}'
} 
);
</script>
<!-- Page Script -->
<script>

$( function() {
    $( ".tanggal" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy",
    });
  } );
  
$(function () {
   //Initialize Select2 Elements
  //Initialize Select2 Elements
  $('.select2').select2({
    theme: 'bootstrap4'
  })
  
  $('.mselect2').select2({
    dropdownParent: $('.Tambah')
  });
 
  $('.checkbox-toggle').click(function () {
    var clicks = $(this).data('clicks')
    if (clicks) {
      //Uncheck all checkboxes
      $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
      $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
    } else {
      //Check all checkboxes
      $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
      $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
    }
    $(this).data('clicks', !clicks)
  })

  //Handle starring for glyphicon and font awesome
  $('.mailbox-star').click(function (e) {
    e.preventDefault()
    //detect type
    var $this = $(this).find('a > i')
    var glyph = $this.hasClass('glyphicon')
    var fa    = $this.hasClass('fa')

    //Switch states
    if (glyph) {
      $this.toggleClass('glyphicon-star')
      $this.toggleClass('glyphicon-star-empty')
    }

    if (fa) {
      $this.toggleClass('fa-star')
      $this.toggleClass('fa-star-o')
    }
  })
})
</script>

<script>
  // Popup Delete
  $(document).on("click", ".delete-link", function(e){
    e.preventDefault();
    url = $(this).attr("href");
    Swal.fire({
        title: 'Anda yakin?',
        text: "Jika dihapus, data tidak dapat dikembalikan lagi!",
        icon: 'warning',
        timer: 3000,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
              url: url,
              success: function(resp){
                window.location.href = url;
              }
            });
        }
      })
  });

 // Popup Delete
$(document).on("click", ".disable-link", function(e){
  e.preventDefault();
  url = $(this).attr("href");
  Swal.fire({
    title:"Yakin akan mengupdate data ini?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: 'btn btn-danger',
    cancelButtonClass: 'btn btn-success',
    buttonsStyling: false,
    confirmButtonText: "Delete",
    cancelButtonText: "Cancel",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
  },
  function(isConfirm){
    if(isConfirm){
      $.ajax({
        url: url,
        success: function(resp){
          window.location.href = url;
        }
      });
    }
    return false;
  });
});


  @if ($message = Session::get('sukses'))
    Swal.fire({
      icon: 'success',
      heightAuto: false,
      timer: 1000,
      title: 'Sukses...',
      text: 'Anda berhasil logout.',
    })
  @endif
  @if ($message = Session::get('warning'))
  // Notifikasi
  Swal.fire({
    icon: 'warning',
    title: 'Oops...',
    timer: 3000,
    heightAuto: false,
    text: '<?php echo $message ?>',
  })
  @endif
  @if ($message = Session::get('sukses'))
  // Notifikasi
  Swal.fire({
    icon: 'success',
    heightAuto: false,
    timer: 1000,
    title: 'Sukses...',
    text: '<?php echo $message ?>',
  })
   @endif
  </script>

{{-- <script src="{{ asset('assets/admin') }}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/admin') }}/dist/js/pages/dashboard.js"></script>
</body>
</html>