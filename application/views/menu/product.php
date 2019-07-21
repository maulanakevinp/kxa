<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <a href="<?= base_url('menu/addProduct') ?>" class="btn btn-primary mb-3">Add New Product</a>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" name="category" id="categorySearch">
                <option value="">Select Category</option>
                <?php foreach ($category as $c) :
                    if ($this->uri->segment(3) == $c['id']) { ?>
                        <option selected value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
                    <?php } else { ?>
                        <option value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
                    <?php }
                endforeach ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control" name="type" id="typeSearch">
                <option value="">Select Type</option>
                <?php if ($this->uri->segment(3) != null) {
                    foreach ($type as $t) {
                        if ($this->uri->segment(4) == $t['id']) { ?>
                            <option selected value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                        <?php }
                    }
                } ?>
            </select>
        </div>
        <div class="col-md-3">
            <form action="<?= base_url('menu/searchProduct') ?>" method="post">
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
        <?php
        if (count($product) == 0) { ?>
            <div class="col-xl text-center">
                <h4>Sorry Product Not Found</h4>
            </div>
        <?php } else {
            foreach ($product as $pr) : ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                    <a href="<?= base_url('menu/editProduct/') . $pr['id'] ?>" class="card-link">
                        <div class="card">
                            <img src="<?= base_url('assets/img/products/') . $pr['photo1'] ?>" class="card-img-top" style="height: 200px">
                            <div class="card-body">
                                <h5 class="card-title"><?= $pr['name'] ?>
                                </h5>
                                <p class="card-text float-right">Rp. <?= number_format($pr['price'], 2, ',', '.') ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach;
        } ?>
    </div>
    <?= $this->pagination->create_links(); ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->