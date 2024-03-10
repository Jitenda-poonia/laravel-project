<div id="footer-sec">
    &copy; 2014 TeachZento | Design By : <a href="http://www.binarytheme.com/" target="_blank">Jitendra</a>
</div>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
   <!-- CUSTOM SCRIPTS -->
<script src="{{asset('assets/js/custom.js')}}"></script>

<!-- file upload-->
<script src="{{ asset('assets/js/bootstrap-fileupload.js')}}"></script>

{{-- table link --}}
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- Datatable  -->
 <script>
    $(document).ready(function(){
        $('#myTable').DataTable();
    });
  </script>

{{-- -------end datadale --}}

{{-- --description----- --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',
            }
        })
        .catch( error => {
              
        } );
</script> 
