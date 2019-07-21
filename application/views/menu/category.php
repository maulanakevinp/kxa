<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newCategoryModal">Add New Category</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($category as $c) : ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <a href="<?= base_url('menu/editCategory/') . $c['id'] ?>" class="card-link">
                    <div class="card">
                        <img src="<?= base_url('assets/img/categories/') . $c['photo'] ?>" class="card-img-top" style="height: 200px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= $c['category'] ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div>
    <?= $this->pagination->create_links(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/category') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="category" name="category" autocomplete="off" placeholder="Category Name">
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="photo">
                            <label class="custom-file-label" for="photo">Choose photo</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Add </button>
                </div>
            </form>
        </div>
    </div>
</div>