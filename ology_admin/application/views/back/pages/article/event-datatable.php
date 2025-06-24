<script type="text/javascript">

   let tableEvent;
   let base_url = '<?= base_url();?>';

   // Show Table
   $(document).ready(function(){

      tableEvent = $('#tableEvent').DataTable({
         processing: true,
         serverSide: true,
         order: [],
         ajax: {
            'url': "<?= base_url('back/event/ajax_list') ?>",
            'type': "POST"
         },
         columnDefs: [
            { 
               'targets': [  0, -1 ], 
               'orderable': false, 
            }]
      });

   });

   // Reload Button
   function reload_table(){
      tableEvent.ajax.reload(null, false);
   }

   // Add Menu
   function add_event(){
      $('#form')[0].reset();
      $('.modal-title').text('Add Event');
      $('#modalEvent').modal('show');
   }

   // Save Button Modal
   function save(){
      $('#btn_save').text('Saving...');
      $('#btn_save').attr('disabled', true);

      $.ajax({
         type: 'post',
         dataType: 'json',
         url: '<?= base_url('back/event/action') ?>',
         data: $('#form').serialize(),
         success: function(data){
            if(data.status){
               $('#modalEvent').modal('hide');
               Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  showConfirmButton: true
               });
               tableEvent.draw();
            }
            $('#btn_save').text('Save');
            $('#btn_save').attr('disabled', false);
         },
         error: function(){
            Swal.fire({
               icon: 'error',
               title: 'Oops...',
               text: 'Something Happened!',
               showConfirmButton: true
            });
            $('#modalEvent').modal('hide');
            $('#btn_save').text('Save');
            $('#btn_save').attr('disabled', false);
         }
      }); 
   }

   //Edit  
   function edit_event(id){
      method = 'update';
      $.ajax({
         url : '<?= base_url('back/event/get_data/') ?>',
         data: {id :id},
         type: 'post',
         dataType: 'json',
         success: function(data){
            $('[name="id"]').val(data.id);
            $('[name="event_type"]').val(data.event_type);

            $('.modal-title').text('Edit Event Type');
            $('#modalEvent').modal('show');
         },
      });
   }

   // Delete Menu
   function delete_event(id){
      Swal.fire({
         title: 'Are you sure?',
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Delete!'
         }).then((result) => {
         if (result.value) {
            $.ajax({
               type: 'post',
               dataType: 'json',
               url: '<?= base_url('back/event/delete'); ?>',
               data: {
                  id: id
               },
               success: function(data){
                  if(data.status){
                     tableEvent.row( $(this).parents('tr') ).remove().draw();
                     $('#modalEvent').modal('hide');
                     Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        showConfirmButton: true
                     });
                  }
               },
               error: function(){
                  $('#modalEvent').modal('hide');
                  Swal.fire({
                     icon: 'error',
                     title: 'Oops...',
                     text: 'Something Happened!',
                     showConfirmButton: true
                  });
               }
            });
         }
      });
   }

</script>