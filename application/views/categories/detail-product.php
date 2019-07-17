    <main>
        <section class="clean-block slider dark" style="background-image: url(&quot;<?= base_url('') ?>assets/img/navbar/Light-wood-background.jpg&quot;);">
            <div class="container">
                <div class="block-heading" style="padding-top: 80px;">
                    <h2 class="text-white"><?= $title ?></h2>
                </div>
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner text-center" role="listbox">
                        <div class="carousel-item active "><img class="mw-100" src="<?= base_url('') ?>assets/img/categories/<?= $photo['photo1'] ?>" alt="Slide Image"></div>
                        <?php for ($i = 2; $i <= 6; $i++) {
                            if (!empty($photo['photo' . $i])) { ?>
                                <div class="carousel-item"><img class="mw-100" src="<?= base_url('') ?>assets/img/categories/<?= $photo['photo' . $i] ?>" alt="Slide Image"></div>
                            <?php }
                        } ?>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                </div>
            </div>
        </section>
        <section class="clean-block clean-hero" style="background-image: url(&quot;<?= base_url('') ?>assets/img/navbar/gambar-background-kayu-hd.jpg&quot;);color: rgba(9,162,255,0.24);">
            <div class="text">
                <h2>Rp. <?= number_format($product['unit_price'], 2, ',', '.') ?><br></h2>
                <p><?= $product['description'] ?></p>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Pesan Melalui</h2>
                    <div class="clean-block add-on social-icons">
                        <div class="icons">
                            <?php if (!empty($product['bukalapak'])) { ?>
                                <a href="<?= $product['bukalapak'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/bukalapak.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                            <?php } ?>
                            <?php if (!empty($product['tokopedia'])) { ?>
                                <a href="<?= $product['tokopedia'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/tokopedia.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                            <?php } ?>
                            <?php if (!empty($product['olx'])) { ?>
                                <a href="<?= $product['olx'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/olx.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>