<!-- Begin Page Content -->
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('menu/category') ?>">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <form action="<?= base_url('menu/editCategory/' . $category['id']) ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="category" name="category" autocomplete="off" placeholder="Category Name" value="<?= $category['category'] ?>">
                </div>
                <div class="input-group mb-3">
                    <img src="<?= base_url('assets/img/categories/' . $category['photo']) ?>" width="100%" height="250px">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="photo">
                        <label class="custom-file-label" for="photo">Choose photo</label>
                    </div>
                </div>
                <button type="Submit" class="btn btn-success btn-block"> Edit Category </button>
                <a href="<?= base_url('menu/deleteCategory/' . $category['id']) ?>" onclick="return confirm('Are you sure want to DELETE this category ?');" class="btn btn-danger btn-block">Delete Category</a>
            </form>
        </div>
        <div class="col-lg-6">
            <a href="" class="btn btn-primary mb-3 addTypeModal" data-toggle="modal" data-target="#TypeModal">Add New Type</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($type as $t) : ?>
                        <tr>
                            <td>
                                <?= $i ?>
                            </td>
                            <td>
                                <?= $t['type'] ?>
                            </td>
                            <td>
                                <a href="" class="badge badge-success mb-3 editTypeModal" data-toggle="modal" data-target="#TypeModal" data-id="<?= $t['id'] ?>" data-url="<?= $category['id'] ?>">Edit</a>
                                <a href="<?= base_url('menu/deleteType/' . $category['id'] . '/' . $t['id']) ?>" onclick="return confirm('Are you sure want to DELETE this type ?');"><span class="badge badge-danger">delete</span></a>
                            </td>
                        </tr>
                        <?php $i++;
                    endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Type-->
<div class="modal fade" id="TypeModal" tabindex="-1" role="dialog" aria-labelledby="TypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TypeModalLabel">Add New Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" action="<?= base_url('menu/addType/' . $category['id']) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="type" name="type" placeholder="Type Name" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>