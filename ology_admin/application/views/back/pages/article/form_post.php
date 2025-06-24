<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Admin</title>

   <!-- Font Awesome -->
   <link href="<?= base_url("assets/back/vendors/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <!-- Datatables -->
   <link href="<?= base_url("assets/back/vendors/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet">
   <!-- Custom styles for this template-->
   <link href="<?= base_url("assets/back/css/sb-admin-2.min.css") ?>" rel="stylesheet">

   <link rel="stylesheet" href="<?= base_url("assets/back/vendors/summernote/dist/summernote-bs4.min.css") ?>">

</head>

<body id="page-top">

   <!-- Page Wrapper -->
   <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view('back/layouts/_sidebar') ?>

      <!-- Content Wrapper -->

      <div id="content-wrapper" class="d-flex flex-column">

         <!-- Main Content -->
         <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('back/layouts/_navbar') ?>

            <!-- Begin Page Content -->
            <div class="container">

               <div class="row">
                  <div class="col">
                     <h3 class="page-header">Add Post</h3>
                  </div>
               </div>

               <br>

               <?= form_open_multipart($form_action) ?>

               <!-- <?php var_dump($input) ?> -->

               <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

               <div class="form-group row">
                  <label for="event_name" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Event Name</label>
                  <div class="col-sm-10">
                     <?= form_input('event_name', $input->event_name, ['class' => 'form-control', 'id' => 'event_name', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off']) ?>
                     <?= form_error('event_name', '<small class="form-text text-danger">', '</small>') ?>
                  </div>
               </div>

               <div class="form-group row">
                  <label for="description" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Description</label>
                  <div class="col-sm-10">
                     <?= form_textarea('description', $input->description, ['row' => 4, 'class' => 'form-control', 'id' => 'description', 'required' => true,]); ?>
                     <?= form_error('Description', '<small class="form-text text-danger">', '</small>') ?>
                  </div>
               </div>

               <div class="form-group row">
                  <div class="col">
                     <label for="category" class="col-form-label"><span class="text-danger">*</span> Category</label>
                     <select class="form-control" id="id_category" name="id_category">
                        <option value="">- Select -</option>
                        <?php foreach ($category as $c) : ?>
                           <option value="<?= $c->id ?>"
                              <?php if ($c->id == $input->id_category) {
                                 print ' selected';
                              } ?>><?= $c->category_name ?></option>
                        <?php endforeach ?>
                     </select>
                     <?= form_error('id_category', '<small class="form-text text-danger">', '</small>') ?>
                  </div>

                  <div class="col">
                     <label for="event_date" class="col col-form-label"><span class="text-danger">*</span> Event Date</label>
                     <?= form_input('event_date', $input->event_date, ['class' => 'form-control datepicker', 'id' => 'event_date', 'required' => true]) ?>
                     <?= form_error('Event Date', '<small class="form-text text-danger">', '</small>') ?>
                  </div>

                  <div class="col">
                     <label for="starting_time" class="col col-form-label"><span class="text-danger">*</span> Starting Time</label>
                     <?= form_input('starting_time', $input->starting_time, ['class' => 'form-control', 'id' => 'starting_time', 'required' => true]) ?>
                     <?= form_error('Starting Time', '<small class="form-text text-danger">', '</small>') ?>
                  </div>

                  <div class="col">
                     <label for="ending_time" class="col col-form-label"><span class="text-danger">*</span> Ending Time</label>
                     <?= form_input('ending_time', $input->ending_time, ['class' => 'form-control', 'id' => 'ending_time', 'required' => true]) ?>
                     <?= form_error('Ending Time', '<small class="form-text text-danger">', '</small>') ?>
                  </div>
               </div>

               <div class="form-group row">
                  <div class="col">
                     <label for="venue" class="col col-form-label"><span class="text-danger">*</span> Venue</label>
                     <?= form_input('venue', $input->venue, ['class' => 'form-control', 'id' => 'venue', 'required' => true]) ?>
                     <?= form_error('Venue', '<small class="form-text text-danger">', '</small>') ?>
                  </div>

                  <div class="col">
                     <label for="address" class="col col-form-label"><span class="text-danger">*</span> Address</label>
                     <?= form_input('address', $input->address, ['class' => 'form-control', 'id' => 'address', 'required' => true]) ?>
                     <?= form_error('Address', '<small class="form-text text-danger">', '</small>') ?>
                  </div>

                  <div class="col">
                     <label for="reg_link" class="col col-form-label"><span class="text-danger">*</span> Register Link</label>
                     <?= form_input('reg_link', $input->reg_link, ['class' => 'form-control', 'id' => 'reg_link', 'required' => true]) ?>
                     <?= form_error('Register Link', '<small class="form-text text-danger">', '</small>') ?>
                  </div>

                  <div class="col">
                     <label for="registration_amount" class="col col-form-label"><span class="text-danger">*</span> Registration Amount</label>
                     <?= form_input('registration_amount', $input->registration_amount, ['class' => 'form-control', 'id' => 'registration_amount', 'required' => true]) ?>
                     <?= form_error('Registration Amount', '<small class="form-text text-danger">', '</small>') ?>
                  </div>
               </div>

               <div class="form-group row py-3">
                  <label for="photo" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                     <?= form_upload('photo', '', ['id' => 'photo']) ?>
                     <?php if ($this->session->flashdata('image_error')) :  ?>
                        <small class="form-text text-danger">
                           <?= $this->session->flashdata('image_error') ?>
                        </small>
                     <?php endif ?>
                     <?php if (!empty($input->photo)) : ?>
                        <img src="<?= base_url("images/posting/$input->photo") ?>" alt="" height="150">
                     <?php endif; ?>
                     <br>
                     <!-- Image Preview -->
                     <img id="image-preview" src="#" alt="Selected Image Preview" style="display:none; padding-top: 20px;" height="150">
                  </div>
               </div>

               <a href="<?= base_url('admin/posting') ?>" class="btn btn-sm btn-secondary">Back</a>
               <button type="submit" class="btn btn-sm btn-primary float-right">Save</button>

               <?= form_close() ?>

            </div>

         </div>
         <!-- End of Main Content -->

         <!-- Footer -->
         <?php $this->load->view('back/layouts/_footer') ?>

      </div>
      <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>


   <!-- Core JavaScript-->
   <script src="<?= base_url("assets/back/vendors/jquery/jquery.min.js") ?>"></script>
   <script src="<?= base_url("assets/back/vendors/popper/popper.min.js") ?>"></script>
   <script src="<?= base_url("assets/back/vendors/bootstrap/js/bootstrap.min.js") ?>"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url("assets/back/vendors/jquery-easing/jquery.easing.min.js") ?>"></script>
   <!-- Bootstrap Datepicker -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
   <!-- CKEditor -->
   <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
   <script>
      $(document).ready(function() {
         $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
         });
         CKEDITOR.replace('description');
      });
   </script>

   <script>
      document.getElementById('photo').addEventListener('change', function(event) {
         var reader = new FileReader();
         reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.src = reader.result;
            output.style.display = 'block';
         };
         if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
         } else {
            document.getElementById('image-preview').style.display = 'none';
         }
      });
   </script>


</body>

</html>