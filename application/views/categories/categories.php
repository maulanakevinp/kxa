    <main>
        <section class="clean-block clean-catalog dark" style="padding-top: 100px">
            <div class="container-fluid">
                <div class="content p-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                            <form action="<?= base_url('categories/search') ?>" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Keyword..." name="keyword" autocomplete="off" value="<?= set_value('keyword') ?>">
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit" value="submit">
                                    </div>
                                </div>
                                <?php if ($title == 'Cari Produk') { ?>
                                    <p class="ml-2 mt-2">Hasil : <?= $total_rows ?> </p>
                                <?php } ?>
                            </form>
                            <div class="list-group mt-3">
                                <?php
                                $titles = array('Semua Kategori', 'Ruang Tamu', 'Ruang Kerja', 'Ruang Makan', 'Ruang Tidur', 'Dekorasi Rumah', 'Dekorasi Hotel & Restouran');
                                $link = array('', 'livingroom', 'workspace', 'diningroom', 'bedroom', 'homedecoration', 'hoteldecoration');
                                for ($i = 0; $i < 7; $i++) {
                                    if ($title == $titles[$i]) : ?>
                                        <a class="list-group-item list-group-item-action active" href="<?= base_url('categories/' . $link[$i]) ?>"><?= $titles[$i] ?></a>
                                    <?php else : ?>
                                        <a class="list-group-item list-group-item-action" href="<?= base_url('categories/' . $link[$i]) ?>"><?= $titles[$i] ?></a>
                                    <?php endif;
                                } ?>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12 p-4">
                            <div class="row">
                                <?php foreach ($product as $pr) : ?>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-4">
                                        <div class="card">
                                            <img src="<?= base_url('assets/img/categories/') . $pr['photo1'] ?>" class="card-img-top" style="height: 200px">
                                            <div class="card-body">
                                                <h5 class="card-title"><a href="<?= base_url('categories/detailProduct/') . $pr['id'] ?>" class="card-link"><?= $pr['name'] ?></a></h5>
                                                <p class="card-text float-right">Rp. <?= number_format($pr['unit_price'], 2, ',', '.') ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>