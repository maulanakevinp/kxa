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
            <?php echo form_open_multipart('menu/addProduct'); ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label> <label class="text-danger">*</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" value="<?= set_value('name') ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Price</label> <label class="text-danger">*</label>
                    <input type="number" class="form-control" name="price" autocomplete="off" value="<?= set_value('price') ?>">
                    <?= form_error('price', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="category">Category</label> <label class="text-danger">*</label>
                    <select id="category" name="category" class="form-control">
                        <option value="">Select Category</option>
                        <?php foreach ($category as $cat) : ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['category'] ?></option>
                            <?php $i++;
                        endforeach ?>
                    </select>
                    <?= form_error('category', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Type</label> <label class="text-danger">*</label>
                    <select id="type" name="type" class="form-control">
                        <option value="">Select Type</option>
                        <?php foreach ($type as $t) : ?>
                            <option value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('type', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="bukalapak">Bukalapak</label>
                    <input type="text" class="form-control" name="bukalapak" autocomplete="off" value="<?= set_value('bukalapak') ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="tokopedia">Tokopedia</label>
                    <input type="text" class="form-control" name="tokopedia" autocomplete="off" value="<?= set_value('tokopedia') ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="olx">OLX</label>
                    <input type="text" class="form-control" name="olx" autocomplete="off" value="<?= set_value('olx') ?>">
                </div>
            </div>
            <div class="form-row">
                <div class=" form-group col-md">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5"><?= set_value('description') ?></textarea>
                    <?= form_error('description', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div>
                <label> Photo </label> <label class="text-danger">*</label>
                <?= form_error('photo1', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-row">
                <?php for ($i = 1; $i <= 6; $i++) { ?>
                    <div class="input-group col-md-6 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo<?= $i ?>" name="photo<?= $i ?>" aria-describedby="photo">
                            <label class="custom-file-label" for="photo">Choose photo</label>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="form-group row justify-content-end">
                <button type="submit" class="btn btn-primary btn-block">
                    Add New Product
                </button>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->