<!-- Begin Page Content -->
<div class="container-fluid">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('menu/product') ?>">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg">
            <form action="<?= base_url('') ?>menu/editProduct/<?= $product['id'] ?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label> <label class="text-danger">*</label>
                        <input type="text" class="form-control" name="name" autocomplete="off" value="<?= $product['name'] ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label> <label class="text-danger">*</label>
                        <input type="number" class="form-control" name="price" autocomplete="off" value="<?= $product['price'] ?>">
                        <?= form_error('price', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="category">Category</label> <label class="text-danger">*</label>
                        <select id="category" name="category" class="form-control">
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $cat) :
                                if ($product['category_id'] == $cat['id']) { ?>
                                    <option selected value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                                <?php }
                            endforeach ?>
                        </select>
                        <?= form_error('category', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="type">Type</label> <label class="text-danger">*</label>
                        <select id="type" name="type" class="form-control">
                            <option value="">Select Type</option>
                            <?php foreach ($type as $t) :
                                if ($product['type_id'] == $t['id']) { ?>
                                    <option selected value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                                <?php } else { ?>
                                    <option value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                                <?php }
                            endforeach ?>
                        </select>
                        <?= form_error('type', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="bukalapak">Bukalapak</label>
                        <input type="text" class="form-control" name="bukalapak" autocomplete="off" value="<?= $product['bukalapak'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tokopedia">Tokopedia</label>
                        <input type="text" class="form-control" name="tokopedia" autocomplete="off" value="<?= $product['tokopedia'] ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="olx">OLX</label>
                        <input type="text" class="form-control" name="olx" autocomplete="off" value="<?= $product['olx'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class=" form-group col-md">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="5"><?= $product['description'] ?></textarea>
                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <button type="submit" class="btn btn-success btn-block">
                        Edit Product
                    </button>
                    <a href="<?= base_url('menu/deleteProduct/') . $product['id'] . '/' . $photo['photo1'] ?>" onclick="return confirm('Are you sure want to DELETE this product ?');" class="btn btn-danger btn-block">Delete Product</a>
                </div>
            </form>

            <div>
                <label> Photo </label> <label class="text-danger">*</label>
                <?= form_error('photo', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-row">
                <?php for ($i = 1; $i <= 6; $i++) { ?>
                    <div class="col-md-6 mb-3">
                        <?php if (!empty($photo['photo' . $i])) { ?>
                            <img class="mb-1" src="<?= base_url('assets/img/products/') . $photo['photo' . $i] ?>" width="100%" height="250px">
                            <?php if ($i > 1) { ?>
                                <a href="<?= base_url('menu/deleteImage/') . $product['id'] . '/' . $i . '/' . $photo['photo1'] ?>" onclick="return confirm('Are you sure want to DELETE this photo ?');" class="btn btn-danger btn-block mb-1">Delete Photo</a>
                            <?php } ?>
                        <?php } else if (empty($photo['photo' . $i])) { ?>
                            <img class="mb-1" src="<?= base_url('assets/img/noimage.jpg') ?>" width="100%" height="250px">
                        <?php } ?>
                        <form action="<?= base_url('menu/updateImage/' . $product['id'] . '/' . $i . '/' . $photo['photo1']) ?>" method="post" enctype="multipart/form-data">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo<?= $i ?>" .$i name="photo<?= $i ?>" .$i aria-describedby="photo<?= $i ?>" .$i required>
                                    <label class="custom-file-label" for="photo<?= $i ?>">Choose photo</label>
                                </div>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success btn-sm" type="submit">Upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->