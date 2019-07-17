<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-md-3">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('menu/addProduct') ?>" class="btn btn-primary mb-3">Add New Product</a>
        </div>
        <div class="col-md-3">
            <!-- <select id="category" name="category" class="form-control">
                <option value="all">Category</option>
                <?php $i = 1;
                foreach ($categories as $cat) : ?>
                                        <option value="<?= $i ?>"><?= $cat['category'] ?></option>
                                        <?php $i++;
                                    endforeach ?>
            </select> -->
        </div>
        <div class="col-md-6">
            <form action="<?= base_url('menu/product') ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off">
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit" value="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <?php foreach ($product as $pr) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/img/categories/') . $pr['photo1'] ?>" class="card-img-top" style="height: 200px">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?= base_url('menu/editProduct/') . $pr['id'] ?>" class="card-link"><?= $pr['name'] ?></a></h5>
                        <p class="card-text float-right">Rp. <?= number_format($pr['unit_price'], 2, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <?= $this->pagination->create_links(); ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->