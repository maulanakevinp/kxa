<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-md">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('menu/addProduct') ?>" class="btn btn-primary mb-3">Add New Product</a>

        </div>
    </div>
    <div class="row">
        <?php foreach ($product as $pr) : ?>
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/categories/') . $pr['photo'] ?>" class="card-img-top" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?= base_url('menu/detailProduct/') . $pr['id'] ?>" class="card-link"><?= $pr['name'] ?></a></h5>
                        <p class="card-text"><?= $pr['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->