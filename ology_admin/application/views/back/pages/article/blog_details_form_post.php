<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="sub_title" content="">

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
                        <label for="sub_title" class="col-sm-2 col-form-label"><span class="text-danger">*</span>sub_title</label>
                        <div class="col-sm-10">
                            <?= form_input('sub_title', $input->sub_title, ['class' => 'form-control', 'id' => 'sub_title', 'required' => true, ]) ?>
                            <?= form_error('sub_title', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="paragraph" class="col-sm-2 col-form-label"><span class="text-danger">*</span> paragraph</label>
                        <div class="col-sm-10">
                            <?= form_input('paragraph', $input->paragraph, ['class' => 'form-control', 'id' => 'paragraph', 'required' => true, ]) ?>
                            <?= form_error('paragraph', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                <a href="<?= base_url('back/banner/create_blog') ?>" class="btn btn-sm btn-secondary">Back</a>
                <button type="submit" class="btn btn-sm btn-primary float-right" style="padding-right: 10px;">Save</button>

                <?= form_close() ?>

            </div>

        </div>
        <!-- End of Main Content -->

    <div class="row mt-3 container">
        <div class="col">
        <a href="<?= base_url("back/banner/create_blog_details") ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add</a>
        <button class="btn btn-outline-secondary btn-sm" onclick="reload_table()">
            <i class="fas fa-sync-alt"></i> Reload
        </button>
        <button class="btn btn-outline-danger btn-sm" onclick="bulk_delete()">
            <i class="fas fa-trash"></i> Multiple Delete
        </button>
    </div>
</div>

<br>

        <div class="table-responsive container">
    <table id="tableBanner" class="table table-striped table-bordered"  cellspacing="0" width="100%">
        <thead>
        <tr>
            <th><input type="checkbox" id="check-all"></th>
            <th>Sub Title</th>
            <th>Paragraph</th>
        </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>
</div>

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
    <!-- Summernote -->
    <script src="<?= base_url("assets/back/vendors/summernote/dist/summernote-bs4.min.js") ?>"></script>

    <script>
        $('#summernote').summernote({
            height: 300,
        });
    </script>

<script>
$(function() {
    $("#published_date").datepicker({
        dateFormat: 'yy-mm-dd' // Customize format as needed
    });
});
</script>

<!-- Add this in your HTML head -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css">

<!-- Add this before your closing body tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd', // You can adjust the date format to your needs
            autoclose: true,
            todayHighlight: true
        });
    });
</script>





</body>

</html>