<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>
    <form action="<?= base_url('menu/company') ?>" method="POST">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="<?= $company['company_name'] ?>">
                    <?= form_error('company_name', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="number_phone">Number Phone</label>
                    <input type="text" class="form-control" id="number_phone" name="number_phone" value="<?= $company['number_phone'] ?>">
                    <?= form_error('number_phone', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="number_wa">Number Whatsapp</label>
                    <input type="text" class="form-control" id="number_wa" name="number_wa" value="<?= $company['number_wa'] ?>">
                    <?= form_error('number_wa', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class=" form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $company['email'] ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class=" form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="2"><?= $company['description'] ?></textarea>
                    <?= form_error('description', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" name="address" id="address" rows="2"><?= $company['address'] ?></textarea>
                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bukalapak">Bukalapak URL</label>
                    <input type="text" class="form-control" id="bukalapak" name="bukalapak" value="<?= $company['bukalapak'] ?>">
                    <?= form_error('bukalapak', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="tokopedia">Tokopedia URL</label>
                    <input type="text" class="form-control" id="tokopedia" name="tokopedia" value="<?= $company['tokopedia'] ?>">
                    <?= form_error('tokopedia', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="olx">OLX URL</label>
                    <input type="text" class="form-control" id="olx" name="olx" value="<?= $company['olx'] ?>">
                    <?= form_error('olx', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="whatsapp">Whatsapp URL</label>
                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="<?= $company['whatsapp'] ?>">
                    <?= form_error('whatsapp', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="line">Line URL</label>
                    <input type="text" class="form-control" id="line" name="line" value="<?= $company['line'] ?>">
                    <?= form_error('line', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="maps">Maps iframe</label>
                    <textarea class="form-control" name="maps" id="maps" rows="3"><?= $company['maps'] ?></textarea>
                    <?= form_error('maps', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-success btn-block">
                    Edit Company
                </button>
            </div>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->