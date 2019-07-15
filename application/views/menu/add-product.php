<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
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
                    <input type="text" class="form-control" name="name" placeholder="Product Name" value="<?= set_value('name') ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="category">Category</label> <label class="text-danger">*</label>
                    <select name="category" class="form-control">
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
                    <input type="number" class="form-control" name="unit_price" placeholder="Unit price" value="<?= set_value('unit_price') ?>">
                    <?= form_error('unit_price', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="bukalapak">Bukalapak</label>
                    <input type="text" class="form-control" name="bukalapak" placeholder="Bukalapak URL" value="<?= set_value('bukalapak') ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tokopedia">Tokopedia</label>
                    <input type="text" class="form-control" name="tokopedia" placeholder="Tokopedia URL" value="<?= set_value('tokopedia') ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="olx">OLX</label>
                    <input type="text" class="form-control" name="olx" placeholder="OLX URL" value="<?= set_value('olx') ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Description text" value="<?= set_value('description') ?>">
                </div>
            </div>
            <div>
                <label> Photo </label> <label class="text-danger">*</label>
                <?= form_error('photo', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="form-row">
                <div class="input-group col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="photo">
                        <label class="custom-file-label" for="photo">Choose photo</label>
                    </div>
                </div>
                <div class="input-group col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo1" name="photo1" aria-describedby="photo1">
                        <label class="custom-file-label" for="photo1">Choose photo</label>
                    </div>
                </div>
                <div class="input-group col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo2" name="photo2" aria-describedby="photo2">
                        <label class="custom-file-label" for="photo2">Choose photo</label>
                    </div>
                </div>
                <div class="input-group col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo3" name="photo3" aria-describedby="photo3">
                        <label class="custom-file-label" for="photo3">Choose photo</label>
                    </div>
                </div>
                <div class="input-group col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo4" name="photo4" aria-describedby="photo4">
                        <label class="custom-file-label" for="photo4">Choose photo</label>
                    </div>
                </div>
                <div class="input-group col-md-6 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo5" name="photo5" aria-describedby="photo5">
                        <label class="custom-file-label" for="photo5">Choose photo</label>
                    </div>
                </div>
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