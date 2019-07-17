    <main>
        <section class="clean-block clean-catalog dark">

            <div class="container">
                <div class="text-center" style="padding-top: 100px">
                    <h4 class=""><?= $title ?></h4>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-none d-md-block">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3 class="text-center">Kategori</h3>
                                        <form action="<?= base_url('categories') ?>" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off">
                                                <div class="input-group-append">
                                                    <input class="btn btn-primary" type="submit" name="submit" value="submit">
                                                </div>
                                            </div>
                                        </form>
                                        <ul class="list-group mt-3">
                                            <li class="list-group-item"><a class="card-link" href="<?= base_url('categories') ?>">Semua Kategori</a></li>
                                            <li class="list-group-item"><a class="card-link" href="<?= base_url('categories/livingroom') ?>">Ruang Tamu</a></li>
                                            <li class="list-group-item"><a class="card-link" href="<?= base_url('categories/workspace') ?>">Ruang Kerja</a></li>
                                            <li class="list-group-item"><a class="card-link" href="<?= base_url('categories/diningroom') ?>">Ruang Makan</a></li>
                                            <li class="list-group-item"><a class="card-link" href="<?= base_url('categories/bedroom') ?>">Ruang Tidur</a></li>
                                            <li class="list-group-item"><a class="card-link" href="<?= base_url('categories/homedecoration') ?>">Dekorasi Rumah</a></li>
                                            <li class="list-group-item"><a class="card-link" href="<?= base_url('categories/hoteldecoration') ?>">Dekorasi Hotel &amp; Restouran</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 p-4">
                            <div class="row">
                                <?php foreach ($product as $pr) : ?>
                                    <div class="col-md-4 col-sm-6 col-12 mb-4">
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