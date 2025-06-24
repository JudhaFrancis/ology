<script type="text/javascript">

   let tableBanner;
   let base_url = '<?= base_url();?>';

   // Show Table
   $(document).ready(function(){
      tableBanner = $('#tableBanner').DataTable({
         processing: true,
         serverSide: true,
         order: [],
         ajax: {
            'url': "<?= base_url('back/banner/ajax_list') ?>",
            'type': "POST"
         },
         columnDefs: [
            { 
               'targets': [ 0, 1, 2, 3 ], 
               'orderable': false, 
            },
         ],
      });
   });

   // Reload Button
   function reload_table(){
      tableBanner.ajax.reload(null, false);
   }

   //Save
   function save(){
      $('#btn_save').text('Saving...');
      $('#btn_save').attr('disabled', true);
      
      var formData = new FormData($('#form')[0]);

      $.ajax({
         url: '<?= base_url('back/banner/action') ?>',
         type: 'post',
         data: formData,
         contentType: false,
         processData: false,
         dataType: 'json',
         success: function(data){
            if(data.status){
               $('#modalBanner').modal('hide');
               Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  showConfirmButton: true
               });
               tableBanner.draw();
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
            $('#modalBanner').modal('hide');
            $('#btn_save').text('Save');
            $('#btn_save').attr('disabled', false);
         }
      }); 
   }

   //Edit  
   function edit_banner(id){
      $.ajax({
         url : '<?= base_url('back/banner/get_data/') ?>',
         data: {id: id},
         type: 'post',
         dataType: 'json',
         success: function(data){
            console.log(data);
            $('[name="id"]').val(data.id);
            $('[name="title"]').val(data.title);
            $('[name="author"]').val(data.author);
            $('[name="describtion"]').val(data.describtion);
            $('[name="published_date"]').val(data.published_date);

            $('.modal-title').text('Edit Banner');
            $('#photo-preview').show();
            $('#modalBanner').modal('show');

            if(data.photo){
               $('#label-photo').text('Change Photo'); 

               $('#photo-preview div').html(`
               <img src="${base_url}/images/banner/${data.photo}" class="img-responsive" style="max-height:250px; max-width:650px;">`);

               $('#photo-preview div').append(`
               <br> 
               <input type="checkbox" name="remove_photo" value="${data.photo}"/> Delete Photo`); 
            }else{
               $('#photo-preview div').text('(No photo)');
            }
         },
      });
   }

   function delete_banner(id){
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
               url: '<?= base_url('back/banner/delete'); ?>',
               data: {
                  id: id
               },
               success: function(data){
                  if(data.status){
                     tableBanner.row( $(this).parents('tr') ).remove().draw();
                     $('#modalBanner').modal('hide');
                     Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        showConfirmButton: true
                     });
                  }
               },
               error: function(){
                  $('#modalbanner').modal('hide');
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

   function bulk_delete(){
      var list_id = [];
      $(".data-check:checked").each(function() {
         list_id.push(this.value);
      });
      if(list_id.length > 0){
         Swal.fire({
         title: 'Are you sure delete this '+list_id.length+' data?',
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
                  url: '<?= base_url('back/banner/bulk_delete'); ?>',
                  data: {
                     id: list_id
                  },
                  success: function(data){
                     if(data.status){
                        tableBanner.row( $(this).parents('tr') ).remove().draw();
                        $('#modalBanner').modal('hide');
                        Swal.fire({
                           icon: 'success',
                           title: 'Success',
                           showConfirmButton: true
                        });
                        reload_table();
                     }
                  },
                  error: function(){
                     $('#modalBanner').modal('hide');
                     Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An error occurred!',
                        showConfirmButton: true
                     });
                  }
               });
            }
         });
      }else{
         Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No Data Selected!',
            showConfirmButton: true
         });
      }
   }


</script>