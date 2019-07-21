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
        <?php for ($i = 1; $i <= 6; $i++) { ?>
            <div class="col-md-6 mb-3">
                <?php if (!empty($photo['photo' . $i])) { ?>
                    <img class="mb-1" src="<?= base_url('assets/img/carousel/') . $photo['photo' . $i] ?>" width="100%" height="250px">
                    <?php if ($i > 1) { ?>
                        <a href="<?= base_url('menu/deletePicture/' . $i . '/' . $photo['photo1'])  ?>" onclick="return confirm('Are you sure want to DELETE this photo ?');" class="btn btn-danger btn-block mb-1">Delete Photo</a>
                    <?php } ?>
                <?php } else if (empty($photo['photo' . $i])) { ?>
                    <img class="mb-1" src="<?= base_url('assets/img/noimage.jpg') ?>" width="100%" height="250px">
                <?php } ?>
                <form action="<?= base_url('menu/editPicture/' . $i . '/' . $photo['photo1']) ?>" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo<?= $i ?>" .$i name="photo<?= $i ?>" .$i aria-describedby="photo<?= $i ?>" .$i required>
                            <label class="custom-file-label" for="photo<?= $i ?>3">Choose photo</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->