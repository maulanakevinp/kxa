    <main>
        <section class="clean-block clean-catalog dark">

            <div class="container-fluid">
                <div class="text-center" style="padding-top: 100px">
                </div>
                <div class="content p-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                            <form class="mb-3" action="<?= base_url('categories') ?>" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Keyword.." name="keyword" autocomplete="off">
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit" value="submit">
                                    </div>
                                </div>
                            </form>
                            <div class="list-group mt-3" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-all-categories-list" data-toggle="list" href="#list-all-categories" role="tab" aria-controls="home">Semua Kategori</a>
                                <a class="list-group-item list-group-item-action" id="list-livingroom-list" data-toggle="list" href="#list-living-room" role="tab" aria-controls="profile">Ruang Tamu</a>
                                <a class="list-group-item list-group-item-action" id="list-workspace-list" data-toggle="list" href="#list-workspace" role="tab" aria-controls="messages">Ruang Kerja</a>
                                <a class="list-group-item list-group-item-action" id="list-diningroom-list" data-toggle="list" href="#list-diningroom" role="tab" aria-controls="settings">Ruang Makan</a>
                                <a class="list-group-item list-group-item-action" id="list-bedroom-list" data-toggle="list" href="#list-bedroom" role="tab" aria-controls="settings">Ruang Tidur</a>
                                <a class="list-group-item list-group-item-action" id="list-homedecoration-list" data-toggle="list" href="#list-homedecoration" role="tab" aria-controls="settings">Dekorasi Rumah</a>
                                <a class="list-group-item list-group-item-action" id="list-hoteldecoration-list" data-toggle="list" href="#list-hoteldecoration" role="tab" aria-controls="settings">Dekorasi Hotel & Restouran</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 col-12 p-4">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-all-categories" role="tabpanel" aria-labelledby="list-all-categories-list">
                                    <div class="row">
                                        <?php foreach ($product as $pr) : ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
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
                                <div class="tab-pane fade" id="list-living-room" role="tabpanel" aria-labelledby="list-livingroom-list">
                                    <div class="tab-pane fade show active" id="list-all-categories" role="tabpanel" aria-labelledby="list-all-categories-list">
                                        <div class="row">
                                            <?php foreach ($livingroom as $lr) : ?>
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                    <div class="card">
                                                        <img src="<?= base_url('assets/img/categories/') . $lr['photo1'] ?>" class="card-img-top" style="height: 200px">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><a href="<?= base_url('categories/detailProduct/') . $lr['id'] ?>" class="card-link"><?= $lr['name'] ?></a></h5>
                                                            <p class="card-text float-right">Rp. <?= number_format($lr['unit_price'], 2, ',', '.') ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <?= $this->pagination->create_links(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-workspace" role="tabpanel" aria-labelledby="list-workspace-list">
                                    <div class="tab-pane fade show active" id="list-all-categories" role="tabpanel" aria-labelledby="list-all-categories-list">
                                        <div class="row">
                                            <?php foreach ($workspace as $ws) : ?>
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                    <div class="card">
                                                        <img src="<?= base_url('assets/img/categories/') . $ws['photo1'] ?>" class="card-img-top" style="height: 200px">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><a href="<?= base_url('categories/detailProduct/') . $ws['id'] ?>" class="card-link"><?= $ws['name'] ?></a></h5>
                                                            <p class="card-text float-right">Rp. <?= number_format($ws['unit_price'], 2, ',', '.') ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <?= $this->pagination->create_links(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-diningroom" role="tabpanel" aria-labelledby="list-diningroom-list">
                                    <div class="tab-pane fade show active" id="list-all-categories" role="tabpanel" aria-labelledby="list-all-categories-list">
                                        <div class="row">
                                            <?php foreach ($diningroom as $dr) : ?>
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                    <div class="card">
                                                        <img src="<?= base_url('assets/img/categories/') . $dr['photo1'] ?>" class="card-img-top" style="height: 200px">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><a href="<?= base_url('categories/detailProduct/') . $dr['id'] ?>" class="card-link"><?= $dr['name'] ?></a></h5>
                                                            <p class="card-text float-right">Rp. <?= number_format($dr['unit_price'], 2, ',', '.') ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                        <?= $this->pagination->create_links(); ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list-bedroom" role="tabpanel" aria-labelledby="list-bedroom-list">
                                    <div class="row">
                                        <?php foreach ($bedroom as $br) : ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                <div class="card">
                                                    <img src="<?= base_url('assets/img/categories/') . $br['photo1'] ?>" class="card-img-top" style="height: 200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="<?= base_url('categories/detailProduct/') . $br['id'] ?>" class="card-link"><?= $br['name'] ?></a></h5>
                                                        <p class="card-text float-right">Rp. <?= number_format($br['unit_price'], 2, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <?= $this->pagination->create_links(); ?>
                                </div>
                                <div class="tab-pane fade" id="list-homedecoration" role="tabpanel" aria-labelledby="list-homedecoration-list">
                                    <div class="row">
                                        <?php foreach ($homedecoration as $homd) : ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                <div class="card">
                                                    <img src="<?= base_url('assets/img/categories/') . $homd['photo1'] ?>" class="card-img-top" style="height: 200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="<?= base_url('categories/detailProduct/') . $homd['id'] ?>" class="card-link"><?= $homd['name'] ?></a></h5>
                                                        <p class="card-text float-right">Rp. <?= number_format($homd['unit_price'], 2, ',', '.') ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <?= $this->pagination->create_links(); ?>
                                </div>
                                <div class="tab-pane fade" id="list-hoteldecoration" role="tabpanel" aria-labelledby="list-hoteldecoration-list">
                                    <div class="row">
                                        <?php foreach ($hoteldecoration as $hotd) : ?>
                                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                                <div class="card">
                                                    <img src="<?= base_url('assets/img/categories/') . $hotd['photo1'] ?>" class="card-img-top" style="height: 200px">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><a href="<?= base_url('categories/detailProduct/') . $hotd['id'] ?>" class="card-link"><?= $hotd['name'] ?></a></h5>
                                                        <p class="card-text float-right">Rp. <?= number_format($hotd['unit_price'], 2, ',', '.') ?></p>
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
                </div>
            </div>
        </section>
    </main>