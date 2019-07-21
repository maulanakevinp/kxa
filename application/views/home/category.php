    <main>
        <section class="clean-block clean-catalog dark" style="padding-top: 100px">
            <div class="container-fluid">
                <div class="content p-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                            <form action="<?= base_url('h/search') ?>" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari Mebel..." name="keyword" autocomplete="off" value="<?= set_value('keyword') ?>">
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit" value="submit">
                                    </div>
                                </div>
                                <?php if ($title == 'Cari Produk') { ?>
                                    <p class="ml-2 mt-2">Hasil : <?= $total_rows ?> </p>
                                <?php } ?>
                            </form>
                            <div class="form-group mt-3">
                                <select class="form-control" name="category" id="categorySearch">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($categories as $c) :
                                        if ($this->uri->segment(3) == $c['id']) { ?>
                                            <option selected value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $c['id'] ?>"><?= $c['category'] ?></option>
                                        <?php }
                                    endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="type" id="typeSearch">
                                    <option value="">Pilih Jenis</option>
                                    <?php if ($this->uri->segment(3) != null) {
                                        foreach ($types as $t) {
                                            if ($this->uri->segment(4) == $t['id']) { ?>
                                                <option selected value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $t['id'] ?>"><?= $t['type'] ?></option>
                                            <?php }
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12 p-4">
                            <div class="row">
                                <?php
                                if (count($product) == 0) { ?>
                                    <div class="col-xl text-center">
                                        <h4>Maaf Produk tidak ditemukan</h4>
                                    </div>
                                <?php } else {
                                    foreach ($product as $pr) : ?>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4">
                                            <?php if (count($pr) == 0) { ?>
                                            <?php } else { ?>
                                                <a href="<?= base_url('h/detailProduct/') . $pr['id'] ?>" class="card-link">
                                                    <div class="card">
                                                        <img src="<?= base_url('assets/img/products/') . $pr['photo1'] ?>" class="card-img-top" style="height: 200px">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= $pr['name'] ?>
                                                            </h5>
                                                            <p class="card-text float-right">Rp. <?= number_format($pr['price'], 2, ',', '.') ?></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php endforeach;
                                } ?>
                            </div>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>