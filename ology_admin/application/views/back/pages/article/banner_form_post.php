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
    <!-- Summernote -->
    <link rel="stylesheet" href="<?= base_url("assets/back/vendors/summernote/dist/summernote-bs4.min.css") ?>">

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css">
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

                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Blog Title</label>
                        <div class="col-sm-10">
                            <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off']) ?>
                            <?= form_error('title', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="author" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Blog Author</label>
                        <div class="col-sm-10">
                            <?= form_input('author', $input->author, ['class' => 'form-control', 'id' => 'author', 'required' => true]) ?>
                            <?= form_error('author', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="published_date" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Published Date</label>
                        <div class="col-sm-10">
                            <?= form_input('published_date', $input->published_date, ['class' => 'form-control datepicker', 'id' => 'published_date', 'required' => true]) ?>
                            <?= form_error('published_date', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="photo" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <?= form_upload('photo', '', ['id' => 'photo']) ?>
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger">
                                    <?= $this->session->flashdata('image_error') ?>
                                </small>
                            <?php endif ?>
                            <?php if (!empty($input->photo)) : ?>
                                <img src="<?= base_url("images/banner/$input->photo") ?>" alt="" height="150">
                            <?php endif; ?>
                            <br>
                            <!-- Image Preview -->
                            <img id="image-preview" src="#" alt="Selected Image Preview" style="display:none; padding-top: 20px;" height="150">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="describtion" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Description</label>
                        <div class="col-sm-10">
                            <?= form_textarea(['name' => 'describtion', 'id' => 'describtion', 'class' => 'form-control', 'rows' => '4', 'required' => true, 'value' => $input->describtion]) ?>
                            <?= form_error('describtion', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <a href="<?= base_url('admin/banner') ?>" class="btn btn-sm btn-secondary">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary float-right" style="padding-right: 10px;">Save</button>

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

            CKEDITOR.replace('describtion');
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