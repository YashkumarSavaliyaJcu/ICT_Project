</div> <!-- .wrapper -->
<script src="{{ asset('public/Assets/Admin') }}/js/jquery-3.5.1.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/popper.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/moment.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/simplebar.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/daterangepicker.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/jquery.stickOnScroll.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/tinycolor-min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/config.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/d3.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/topojson.min.js"></script>

<script src="{{ asset('public/Assets/Admin') }}/js/gauge.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/jquery.sparkline.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/jquery.mask.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/select2.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/quill.min.js"></script>
<script src="{{asset('public/Assets/Admin')}}/js/jquery.steps.min.js"></script>
<script src="{{asset('public/Assets/Admin')}}/js/jquery.validate.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('public/Assets/Admin') }}/js/dataTables.responsive.min.js"></script>
<!-- <script src="{{ asset('public/Assets/Admin') }}/js/dataTables.bootstrap4.min.js"></script> -->
<script src="{{ asset('public/Assets/Admin') }}/js/summernote.min.js"></script>
<script src="{{asset('public/Assets/Admin')}}/js/sweetalert2.all.min.js"></script>

<script>
    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
      @if(session()->has('errormessage'))
        Toast.fire({
            icon: 'error',
            title: "{{session()->get('errormessage')}}"
        })
      @elseif(session()->has('successmessage'))
          Toast.fire({
              icon: 'success',
              title: "{{session()->get('successmessage')}}"
          })
      @endif
      // $('#dataTable-1').DataTable(
      // {
      //   autoWidth: true,
      //   "lengthMenu": [
      //     [16, 32, 64, -1],
      //     [16, 32, 64, "All"]
      //   ]
      // });
  $('#dataTable-1').DataTable(
    {
      autoWidth: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ]
    });
</script>
<!-- Delete Confirmation -->
<script type="text/javascript">
    $('.delete_recoard').click(function(){
      var delete_redirect=$(this).attr('redirect');
      var delete_message=$(this).attr('message');
      var delete_table=$(this).attr('table');
      var delete_field=$(this).attr('field');
      var delete_value=$(this).attr('value');
      $('#delete_redirect').val(delete_redirect);
      $('#delete_message').val(delete_message);
      $('#delete_table').val(delete_table);
      $('#delete_field').val(delete_field);
      $('#delete_value').val(delete_value);
    });

    $('.approve_confirm').click(function(){
      var approved_value=$(this).attr('value');
      $('#approved_value').val(approved_value);
    });
</script>
<!-- End Delete Confirmation -->
<script>
  $('.select2').select2(
  {
    theme: 'bootstrap4',
  });
</script>
<script>
    $('.updatestatus').on('click',function(){
        var oid=$(this).attr('data');
        var status=$(this).attr('status');
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you want to Update order status?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{url('Admin/updateorderstatus')}}"+"/"+ oid+"/"+status,
                        dataType: 'json',
                        success: function(result) {
                            Toast.fire({
                                icon: result.status,
                                title: result.message
                            }).then(function() {
                                window.location.reload();
                            });
                        }
                    });
                }
            })
    });
</script>
<script src="{{ asset('public/Assets/Admin') }}/js/apps.js"></script>
</body>
</html>