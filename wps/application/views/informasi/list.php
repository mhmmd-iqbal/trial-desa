<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Informasi Umum</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Informasi Umum</a></li>
            <li class="breadcrumb-item active">Data Kategori</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 mb-2">
          <button class="btn btn-primary mr-1" id="back"><i class="fa fa-chevron-left"></i> Back</button>
          <button class="btn btn-primary mr-1" id="add" style="float: right"  >
            <i class="fa fa-plus"></i> Add New
          </button>
        </div>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table" style="width: 99%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Category</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <label for="">Category Name</label>
          </div>
          <div class="col-lg-12">
            <input type="text" class="form-control" id="kategori">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
        <button type="button" class="btn btn-primary" id="save-data">Save</button>
      </div>
    </div>
  </div>
</div>

