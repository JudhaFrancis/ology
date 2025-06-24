<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Gallery</title>
    <link href="<?= base_url("assets/back/vendors/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= base_url("assets/back/vendors/datatables/dataTables.bootstrap4.min.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/back/css/sb-admin-2.min.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/back/vendors/summernote/dist/summernote-bs4.min.css") ?>">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('back/layouts/_sidebar') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('back/layouts/_navbar') ?>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-header"><?= $title ?></h3>
                        </div>
                    </div>

                    <br>

                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

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
                            <?= form_textarea(['name' => 'description', 'id' => 'description', 'class' => 'form-control', 'rows' => '4', 'value' => $input->description]) ?>
                            <?= form_error('description', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row py-3 align-items-center">
                        <label for="photo" class="col-sm-2 col-form-label">Event Image</label>
                        <div class="col-sm-10">
                            <?= form_upload('photo', '', ['id' => 'photo']) ?>
                            <?php if (!empty($input->photo)): ?>
                                <img src="<?= base_url("images/gallery/{$input->photo}") ?>" alt="" height="150">
                            <?php endif; ?>
                            <br>
                            <img id="image-preview" src="#" alt="Selected Image Preview" style="display:none; padding-top: 20px;" height="150">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="video_url" class="col-sm-2 col-form-label">YouTube Video Links</label>
                        <div class="col-sm-10">
                            <div id="video-url-container">
                                <div class="input-group mb-3">
                                    <?= form_input('video_urls[]', '', ['class' => 'form-control video-url-input', 'placeholder' => 'Enter YouTube link here']) ?>
                                    <div class="input-group-append" style="margin-left:10px">
                                        <button type="button" class="btn btn-success" id="add-video-url"> + </button>
                                    </div>
                                </div>
                                <div class="video-preview"></div>

                                <?php if (!empty($input->videos) && is_array($input->videos)): ?>
                                    <?php foreach ($input->videos as $video): ?>
                                        <div class="input-group mb-3">
                                            <?= form_input('video_urls[]', $video->video_url, ['class' => 'form-control video-url-input', 'placeholder' => 'Enter YouTube link here']) ?>
                                        </div>
                                        <div class="video-preview">
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row py-3 ">
                        <label for="images" class="col-sm-2 col-form-label">Multi Images</label>
                        <div class="col-sm-10">
                            <?= form_upload('images[]', '', ['id' => 'images', 'accept' => 'image/*', 'multiple' => true]) ?>
                            <div id="images-preview" style="padding: 20px;">
                                <?php if (!empty($input->images) && is_array($input->images)): ?>
                                    <?php foreach ($input->images as $image): ?>
                                        <img src="<?= base_url("images/gallery/{$image->images}") ?>" alt="" height="150" style="padding:10px">
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <input type="file" id="more-images" name="images[]" style="display: none;" multiple accept="image/*">

                    <br>
                    <a href="<?= base_url('admin/gallery') ?>" class="btn btn-sm btn-secondary">Back</a>
                    <button type="submit" class="btn btn-sm btn-primary float-right">Save</button>
                    <?= form_close() ?>
                </div>
            </div>
            <?php $this->load->view('back/layouts/_footer') ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <style>
        button {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
            color: white;
            border: none;
            cursor: pointer;
        }

        #add-more-images,
        #select-images {
            background-color: #007bff;
        }

        #remove-images {
            background-color: #dc3545;
        }
    </style>
    <script src="<?= base_url("assets/back/vendors/jquery/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/back/vendors/popper/popper.min.js") ?>"></script>
    <script src="<?= base_url("assets/back/vendors/bootstrap/js/bootstrap.min.js") ?>"></script>

    <script src="<?= base_url("assets/back/vendors/jquery-easing/jquery.easing.min.js") ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        document.getElementById('photo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('image-preview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('images').addEventListener('change', function(event) {
            const files = event.target.files;
            const imagesPreviewContainer = document.getElementById('images-preview');
            imagesPreviewContainer.innerHTML = '';

            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageContainer = document.createElement('div');
                    imageContainer.className = 'image-container';
                    imageContainer.style.display = 'inline-block';
                    imageContainer.style.marginRight = '10px';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Gallery Image';
                    img.style.height = '150px';

                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.className = 'btn btn-danger btn-sm remove-image';
                    removeButton.style.display = 'block';
                    removeButton.style.margin = '5px 0px 10px 0px';
                    removeButton.innerText = 'Remove';

                    imageContainer.appendChild(img);
                    imageContainer.appendChild(removeButton);
                    imagesPreviewContainer.appendChild(imageContainer);

                    removeButton.addEventListener('click', function() {
                        imageContainer.remove();
                    });
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            });
        });

        $(document).ready(function() {
            function getYouTubeVideoId(url) {
                const regExp = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i;
                const match = url.match(regExp);
                return (match && match[1]) ? match[1] : false;
            }

            function generateVideoPreview(videoId) {
                return `<iframe width="200" height="150" src="https://www.youtube.com/embed/${videoId}" 
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>`;
            }

            function updateVideoPreview(inputField) {
                const videoUrl = inputField.val();
                const videoId = getYouTubeVideoId(videoUrl);
                const previewContainer = inputField.closest('.input-group').next('.video-preview');

                if (videoId) {
                    previewContainer.html(generateVideoPreview(videoId));
                } else {
                    previewContainer.empty();
                }
            }

            $(document).on('input', '.video-url-input', function() {
                updateVideoPreview($(this));
            });

            $('#add-video-url').click(function() {
                const newVideoInput = `
            <div class="input-group mb-3">
                <?= form_input('video_urls[]', '', ['class' => 'form-control video-url-input', 'placeholder' => 'Enter YouTube link here']) ?>
                <div class="input-group-append" style="margin-left:10px">
                    <button type="button" class="btn btn-danger remove-video-url"> - </button>
                </div>
            </div>
            <div class="video-preview"></div>
        `;
                $('#video-url-container').append(newVideoInput);
            });

            $(document).on('click', '.remove-video-url', function() {
                $(this).closest('.input-group').next('.video-preview').remove();
                $(this).closest('.input-group').remove(); 
            });

            $('.video-url-input').each(function() {
                updateVideoPreview($(this));
            });
        });
    </script>
</body>

</html>