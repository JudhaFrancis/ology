<div class="container">
   <div class="row">
      <div class="col">
         <h3 class="page-header">Manage Banner</h3>
      </div>
   </div>

   <div class="row">
      <div class="col">
         <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $this->session->flashdata('success') ?>.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>   
            </div>
         <?php elseif($this->session->flashdata('error')) : ?>
            <div class="alert alert-error alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error') ?>.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>   
            </div>
         <?php endif ?>
      </div>
   </div>

   <div class="row mt-3">
      <div class="col">
         <a href="<?= base_url("back/banner/create_blog") ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add</a>
         <button class="btn btn-outline-secondary btn-sm" onclick="reload_table()">
            <i class="fas fa-sync-alt"></i> Reload
         </button>
         <button class="btn btn-outline-danger btn-sm" onclick="bulk_delete()">
            <i class="fas fa-trash"></i> Multiple Delete
         </button>
      </div>
   </div>
<br>

   <div class="table-responsive">
      <table id="tableBanner" class="table table-striped table-bordered"  cellspacing="0" width="100%">
         <thead>
         <tr>
            <th><input type="checkbox" id="check-all"></th>
            <th>Title</th>
            <th>Auther</th>
            <th>describtion</th>
            <th>Date</th>
            <th>Photo</th>
            <th>Action</th>
         </tr>
         </thead>
         <tbody>
         
         </tbody>
      </table>
   </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Edit Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="form" class="form-horizontal">
        
            <input type="hidden" name="id" id="id">

            <div class="form-group row">
               <label for="title" class="col-sm-3 col-form-label">Title</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control" id="title" name="title">
               </div>
            </div> 
            
            <div class="form-group row">
               <label for="author" class="col-sm-3 col-form-label">Author</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control" id="author" name="author">
               </div>
            </div> 

            <div class="form-group row">
               <label for="describtion" class="col-sm-3 col-form-label">Describtion</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control" id="describtion" name="describtion">
               </div>
            </div> 

            <div class="form-group row">
               <label for="published_date" class="col-sm-3 col-form-label">Published Date</label>
               <div class="col-sm-9">
                  <input type="date" class="form-control" id="published_date" name="published_date">
               </div>
            </div> 

            <div class="form-group row" id="photo-preview">
               <label class="col-sm-3 col-form-label">Photo</label>
               <div class="col-sm-9">
                  (No photo)
               </div>
            </div>

            <div class="form-group row">
               <label class="col-sm-3 col-form-label" id="label-photo">Upload Photo </label>
               <div class="col-sm-9">
                  <input name="photo" type="file">
               </div>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" onclick="save()" id="btn_save">Save</button>
      </div>
    </div>
  </div>
</div>
