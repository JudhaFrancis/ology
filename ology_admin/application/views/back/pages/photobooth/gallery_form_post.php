<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Gallery</title>
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
                            <h3 class="page-header"><?= $title ?></h3>
                        </div>
                    </div>

                    <br>

                    <?= form_open_multipart($form_action, ['id' => 'gallery-form']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Title</label>
                        <div class="col-sm-10">
                            <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'required' => true, 'autofocus' => true, 'autocomplete' => 'off']) ?>
                            <?= form_error('title', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label"><span class="text-danger">*</span> Description</label>
                        <div class="col-sm-10">
                            <?= form_textarea(['name' => 'description', 'id' => 'description', 'class' => 'form-control', 'rows' => '4', 'required' => true, 'value' => $input->description]) ?>
                            <?= form_error('description', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row py-3">
                        <label for="photo" class="col-sm-2 col-form-label">Event Image</label>
                        <div class="col-sm-10">
                            <?= form_upload('photo', '', ['id' => 'photo']) ?>
                            <?php if (!empty($input->photo)): ?>
                                <img src="<?= base_url("images/gallery/{$input->photo}") ?>" alt="" height="150">
                            <?php endif; ?>
                            <br>
                            <!-- Image Preview -->
                            <img id="image-preview" src="#" alt="Selected Image Preview" style="display:none; padding-top: 20px;" height="150">
                        </div>
                    </div>

                    <div class="form-group row py-3">
                        <label for="video" class="col-sm-2 col-form-label">Video</label>
                        <div class="col-sm-10">
                            <?= form_upload('video', '', ['id' => 'video', 'accept' => 'video/*']) ?>
                            <?php if (!empty($input->video)): ?>
                                <video width="320" height="240" controls>
                                    <source src="<?= base_url("uploads/videos/{$input->video}") ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            <?php endif; ?>
                            <br>
                            <!-- Video Preview -->
                            <video id="video-preview" width="320" height="240" controls style="display:none; padding-top: 20px;">
                                <source src="#" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>

                    <div class="form-group row py-3">
                        <label for="images" class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <?= form_upload('images[]', '', ['id' => 'images', 'multiple' => true, 'accept' => 'image/*']) ?>
                        </div>
                    </div>

                    <br>
                    <!-- Images Preview -->
                    <div id="images-preview" style="padding-top: 20px;">
                        <?php if (!empty($input->gallery_images)): ?>
                            <?php foreach ($input->gallery_images as $image): ?>
                                <div class="image-container" style="display: inline-block; margin-right: 10px;">
                                    <img src="<?= base_url("uploads/videos/{$image->images}") ?>" alt="Gallery Image" style="height: 150px;" />
                                    <button type="button" class="btn btn-danger btn-sm remove-image" data-id="<?= $image->id ?>" style="display: block; margin-top: 5px;">Remove</button>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No images found.</p>
                        <?php endif; ?>
                    </div>
                    <!-- Buttons -->
                    <button type="button" id="add-more-images" style="margin-top: 10px;">Add +</button>
                    <button type="button" id="select-images" style="margin-top: 10px;">Select</button>
                    <button type="button" id="remove-images" style="margin-top: 10px;">Remove</button>
                    <!-- Hidden Input for Additional Images -->
                    <input type="file" id="more-images" name="images[]" style="display: none;" multiple accept="image/*">

                    <br>
                    <a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-secondary">Back</a>
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

    <script>
        // Handle single image preview
        document.getElementById('photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    preview.src = reader.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });

        // Handle video preview
        document.getElementById('video').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('video-preview');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });

        // Handle multiple images preview and selection
        let isSelectMode = false;
        let selectedImages = [];

        document.getElementById('images').addEventListener('change', event => previewImages(event.target.files));
        document.getElementById('add-more-images').addEventListener('click', () => document.getElementById('more-images').click());
        document.getElementById('more-images').addEventListener('change', event => previewImages(event.target.files));

        document.getElementById('select-images').addEventListener('click', function() {
            isSelectMode = !isSelectMode;
            this.style.backgroundColor = isSelectMode ? '#0099cc' : '#00aaff';
        });

        document.getElementById('remove-images').addEventListener('click', () => removeSelectedImages());

        function previewImages(files) {
            const previewContainer = document.getElementById('images-preview');
            Array.from(files).forEach(file => {
                if (!Array.from(previewContainer.children).some(img => img.dataset.fileName === file.name)) {
                    const reader = new FileReader();
                    reader.onload = e => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.height = 150;
                        img.style.marginRight = '10px';
                        img.style.cursor = 'pointer';
                        img.dataset.fileName = file.name; // Store file name for tracking
                        img.addEventListener('click', () => {
                            if (isSelectMode) {
                                if (selectedImages.some(f => f.name === file.name)) {
                                    img.style.filter = 'none';
                                    selectedImages = selectedImages.filter(f => f.name !== file.name);
                                } else {
                                    img.style.filter = 'blur(5px)';
                                    selectedImages.push(file);
                                }
                            }
                        });
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function removeSelectedImages() {
            const previewContainer = document.getElementById('images-preview');
            selectedImages.forEach(file => {
                // Remove corresponding img element from preview container
                Array.from(previewContainer.children).forEach(img => {
                    if (img.dataset.fileName === file.name) {
                        previewContainer.removeChild(img);
                    }
                });
            });
            selectedImages = [];
            isSelectMode = false;
            document.getElementById('select-images').style.backgroundColor = '#00aaff';
        }

        // Handle form submission
        document.getElementById('gallery-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Create FormData object
            const formData = new FormData(this);

            // Append selected images
            selectedImages.forEach(file => {
                formData.append('images[]', file);
            });

            // Submit form data using Fetch API or another method
            fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Handle response data
                    console.log('Success:', data);
                    window.location.href = '<?= base_url('admin/gallery') ?>'; // Redirect on success
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // Remove image button click handler
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                const imageContainer = this.closest('.image-container');
                imageContainer.remove();

                // Optionally, send an AJAX request to delete the image from the server
                const imageId = this.getAttribute('data-id');
                fetch(`<?= base_url('admin/gallery/delete_image/') ?>${imageId}`, {
                    method: 'DELETE'
                });
            });
        });
    </script>
</body>

</html>