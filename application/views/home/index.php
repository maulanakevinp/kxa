    <main class=" landing-page">
        <section class="clean-block slider dark" style="background-image: url(&quot;<?= base_url('') ?>assets/img/navbar/Light-wood-background.jpg&quot;);">
            <div class="container">
                <div class="block-heading" style="padding-top: 80px;">
                    <h2 class="text-white">Xylo Furniture</h2>
                </div>
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner text-center" role="listbox">
                        <div class="carousel-item active "><img class="mw-100" src="<?= base_url('') ?>assets/img/carousel/<?= $photo['photo1'] ?>" alt="Slide Image"></div>
                        <?php for ($i = 2; $i <= 6; $i++) {
                            if (!empty($photo['photo' . $i])) { ?>
                                <div class="carousel-item"><img class="mw-100" src="<?= base_url('') ?>assets/img/carousel/<?= $photo['photo' . $i] ?>" alt="Slide Image"></div>
                            <?php }
                        } ?>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                </div>
            </div>
        </section>
        <section class="clean-block clean-hero" style="background-image: url(&quot;<?= base_url('') ?>assets/img/navbar/gambar-background-kayu-hd.jpg&quot;);color: rgba(9,162,255,0.24);">
            <div class="text">
                <h2>By <?= $company['company_name'] ?><br></h2>
                <p><?= $company['description'] ?></p>
            </div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Silahkan Pilih Kategori</h2>
                </div>
                <div class="row">
                    <?php foreach ($category as $c) : ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                            <a class="card-link" href="<?= base_url('h/category/' . $c['id']) ?>" style="font-size: 20px;">
                                <div class="card">
                                    <img class="card-img-top" style="height: 200px" src="<?= base_url('assets/img/categories/' . $c['photo']) ?>">
                                    <div class="card-body text-center">
                                        <h5><?= $c['category'] ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Pesan Melalui</h2>
                    <div class="clean-block add-on social-icons">
                        <div class="icons">
                            <a href="<?= $company['bukalapak'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/bukalapak.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                            <a href="<?= $company['tokopedia'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/tokopedia.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                            <a href="<?= $company['olx'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/olx.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                            <a href="<?= $company['whatsapp'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/whatsapp.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                            <a href="<?= $company['line'] ?>" target="_blank" style="width: 80px;height: 80px;"><img src="<?= base_url('') ?>assets/img/e-commerce/line.png" style="width: 80px;height: 80px;padding: 15px;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="testimonials-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Testimonials </h2>
                <p class="text-center">Our customers love us! Read what they have to say below. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
            </div>
            <div class="row people">
                <div class="col-md-6 col-lg-4 item">
                    <div class="box">
                        <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est.</p>
                    </div>
                    <div class="author"><img class="rounded-circle" src="<?= base_url('') ?>assets/img/1.jpg">
                        <h5 class="name">Ben Johnson</h5>
                        <p class="title">CEO of Company Inc.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box">
                        <p class="description">Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, et interdum justo suscipit id.</p>
                    </div>
                    <div class="author"><img class="rounded-circle" src="<?= base_url('') ?>assets/img/3.jpg">
                        <h5 class="name">Carl Kent</h5>
                        <p class="title">Founder of Style Co.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box">
                        <p class="description">Aliquam varius finibus est, et interdum justo suscipit. Vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu.</p>
                    </div>
                    <div class="author"><img class="rounded-circle" src="<?= base_url('') ?>assets/img/2.jpg">
                        <h5 class="name">Emily Clark</h5>
                        <p class="title">Owner of Creative Ltd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map-clean">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Alamat</h2>
                <p class="text-center"><?= $company['address'] ?> <br>Telp : <?= $company['number_phone'] ?></p>
            </div>
        </div>
        <iframe src="<?= $company['maps'] ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>