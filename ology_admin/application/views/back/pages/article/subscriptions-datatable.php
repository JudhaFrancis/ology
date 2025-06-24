<script type="text/javascript">

   let tableSubscriptions;

  // Show Table
   $(document).ready(function(){
      tableSubscriptions = $('#tableSubscriptions').DataTable({
         processing: true,
         serverSide: true,
         order: [],
         ajax: {
            'url': "<?= base_url('back/subscriptions/ajax_list') ?>",
            'type': "POST"
         },
         columnDefs: [
            { 
               'targets': [ 0, -1 ], 
               'orderable': false, 
            }
         ],
      });
   });

   // Reload Button
  function reload_table(){
    tableSubscriptions.ajax.reload(null, false);
  }

   // Save Button Modal
   function save(){
      $('#btn_save').text('Saving...');
      $('#btn_save').attr('disabled', true);

      $.ajax({
         type: 'post',
         dataType: 'json',
         url: '<?= base_url('back/subscriptions/action') ?>',
         data: $('#form').serialize(),
         success: function(data){
            if(data.status){
               $('#modalSubscriptions').modal('hide');
               Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  showConfirmButton: true
               });
               tableSubscriptions.draw();
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
            $('#modalSubscriptions').modal('hide');
            $('#btn_save').text('Save');
            $('#btn_save').attr('disabled', false);
         }
      }); 
   }

   // Add Menu
   function add_Subscriptions(){
      $('#form')[0].reset();
      $('.modal-title').text('Add Subscriptions');
      $('#modalSubscriptions').modal('show');
   }

   //Edit  
   function edit_Subscriptions(id){
      method = 'update';
      $.ajax({
         url : '<?= base_url('back/Subscriptions/get_data/') ?>',
         data: {id :id},
         type: 'post',
         dataType: 'json',
         success: function(data){
            $('[name="id"]').val(data.id);
            $('[name="Subscriptions_name"]').val(data.Subscriptions_name);
            $('[name="is_active"]').val(data.is_active);

            $('.modal-title').text('Edit Menu');
            $('#modalSubscriptions').modal('show');
         },
      });
   }

   // Delete Menu
   function delete_Subscriptions(id){
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
               url: '<?= base_url('back/Subscriptions/delete'); ?>',
               data: {
                  id: id
               },
               success: function(data){
                  if(data.status){
                     tableSubscriptions.row( $(this).parents('tr') ).remove().draw();
                     $('#modalSubscriptions').modal('hide');
                     Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        showConfirmButton: true
                     });
                  }
               },
               error: function(){
                  $('#modalSubscriptions').modal('hide');
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