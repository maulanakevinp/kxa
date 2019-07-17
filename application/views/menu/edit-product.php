<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><?= $title ?> </h2>

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
                        <label for="category">Category</label> <label class="text-danger">*</label>
                        <select name="category" class="form-control">
                            <option value="<?= $product['category_id'] ?>"><?= $category['category'] ?></option>
                            <?php $i = 1;
                            foreach ($categories as $cat) : ?>
                                <option value="<?= $i ?>"><?= $cat['category'] ?></option>
                                <?php $i++;
                            endforeach ?>
                        </select>
                        <?= form_error('category', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="unit_price">Price</label> <label class="text-danger">*</label>
                        <input type="number" class="form-control" name="unit_price" autocomplete="off" value="<?= $product['unit_price'] ?>">
                        <?= form_error('unit_price', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bukalapak">Bukalapak</label>
                        <input type="text" class="form-control" name="bukalapak" autocomplete="off" value="<?= $product['bukalapak'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tokopedia">Tokopedia</label>
                        <input type="text" class="form-control" name="tokopedia" autocomplete="off" value="<?= $product['tokopedia'] ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="olx">OLX</label>
                        <input type="text" class="form-control" name="olx" autocomplete="off" value="<?= $product['olx'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" autocomplete="off" value="<?= $product['description'] ?>">
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
                <div class="col-md-6 mb-3">
                    <img class="mb-1" src="<?= base_url('assets/img/categories/') . $photo['photo1'] ?>" width="100%" height="250px">
                    <form action="<?= base_url('') ?>menu/updateImage/<?= $product['id'] ?>/1/<?= $photo['photo1'] ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo1" name="photo1" aria-describedby="photo1" required>
                                <label class="custom-file-label" for="photo1">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <?php if (!empty($photo['photo2'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/categories/') . $photo['photo2'] ?>" width="100%" height="250px">
                        <a href="<?= base_url('menu/deleteImage/') . $product['id'] . '/2/' . $photo['photo1'] ?>" onclick="return confirm('Are you sure want to DELETE this photo ?');" class="btn btn-danger btn-block mb-1">Delete Photo</a>
                    <?php } else if (empty($photo['photo'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/noimage.jpg') ?>" width="100%" height="250px">
                    <?php } ?>
                    <form action="<?= base_url('') ?>menu/updateImage/<?= $product['id'] ?>/2/<?= $photo['photo1'] ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo2" name="photo2" aria-describedby="photo2" required>
                                <label class="custom-file-label" for="photo3">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <?php if (!empty($photo['photo3'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/categories/') . $photo['photo3'] ?>" width="100%" height="250px">
                        <a href="<?= base_url('menu/deleteImage/') . $product['id'] . '/3/' . $photo['photo1'] ?>" onclick="return confirm('Are you sure want to DELETE this photo ?');" class="btn btn-danger btn-block mb-1">Delete Photo</a>
                    <?php } else if (empty($photo['photo'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/noimage.jpg') ?>" width="100%" height="250px">
                    <?php } ?>
                    <form action="<?= base_url('') ?>menu/updateImage/<?= $product['id'] ?>/3/<?= $photo['photo1'] ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo3" name="photo3" aria-describedby="photo3" required>
                                <label class="custom-file-label" for="photo3">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <?php if (!empty($photo['photo4'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/categories/') . $photo['photo4'] ?>" width="100%" height="250px">
                        <a href="<?= base_url('menu/deleteImage/') . $product['id'] . '/4/' . $photo['photo1'] ?>" onclick="return confirm('Are you sure want to DELETE this photo ?');" class="btn btn-danger btn-block mb-1">Delete Photo</a>
                    <?php } else if (empty($photo['photo'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/noimage.jpg') ?>" width="100%" height="250px">
                    <?php } ?>
                    <form action="<?= base_url('') ?>menu/updateImage/<?= $product['id'] ?>/4/<?= $photo['photo1'] ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo4" name="photo4" aria-describedby="photo4" required>
                                <label class="custom-file-label" for="photo4">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <?php if (!empty($photo['photo5'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/categories/') . $photo['photo5'] ?>" width="100%" height="250px">
                        <a href="<?= base_url('menu/deleteImage/') . $product['id'] . '/5/' . $photo['photo1'] ?>" onclick="return confirm('Are you sure want to DELETE this photo ?');" class="btn btn-danger btn-block mb-1">Delete Photo</a>
                    <?php } else if (empty($photo['photo'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/noimage.jpg') ?>" width="100%" height="250px">
                    <?php } ?>
                    <form action="<?= base_url('') ?>menu/updateImage/<?= $product['id'] ?>/5/<?= $photo['photo1'] ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo5" name="photo5" aria-describedby="photo5" required>
                                <label class="custom-file-label" for="photo5">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mb-3">
                    <?php if (!empty($photo['photo6'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/categories/') . $photo['photo6'] ?>" width="100%" height="250px">
                        <a href="<?= base_url('menu/deleteImage/') . $product['id'] . '/6/' . $photo['photo1'] ?>" onclick="return confirm('Are you sure want to DELETE this photo ?');" class="btn btn-danger btn-block mb-1">Delete Photo</a>
                    <?php } else if (empty($photo['photo'])) { ?>
                        <img class="mb-1" src="<?= base_url('assets/img/noimage.jpg') ?>" width="100%" height="250px">
                    <?php } ?>
                    <form action="<?= base_url('') ?>menu/updateImage/<?= $product['id'] ?>/6/<?= $photo['photo1'] ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo6" name="photo6" aria-describedby="photo6" required>
                                <label class="custom-file-label" for="photo6">Choose photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->