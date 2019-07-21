    <footer class="page-footer dark" id="page-footer" style="background-image: url(&quot;<?= base_url('') ?>assets/img/navbar/gambar-background-kayu-hd.jpg&quot;);">
        <div class="container text-center">
            <h4 class="text-white mb-3">Hubungi Kami</h4>
            <div><i class="fa fa-phone text-white mr-2 mb-2" style="font-size: 22px;height: 24px; width: 24.75px;"></i>
                <a href="tel:<?= $company['number_phone'] ?>" target="_blank" class="text-white"><?= $company['number_phone'] ?><br></a>
            </div>
            <div><i class="fab fa-whatsapp text-white mr-2 mb-2" style="font-size: 22px;height: 24px; width: 24.75px;"></i>
                <a href="<?= $company['whatsapp'] ?>" target="_blank" class="text-white"><?= $company['number_wa'] ?><br></a>
            </div>
            <div><i class="fas fa-mail-bulk text-white mr-2 mb-2" style="font-size: 22px;height: 24px; "></i>
                <a href="http://<?= $company['email'] ?>" target="_blank" class="text-white"><?= $company['email'] ?><br></a>
            </div>
        </div>
        <div class="container text-center">
            <hr>
            <h5 class="text-white">Pembayaran dapat melalui :</h5>
            <div class="icon">
                <img src="<?= base_url('assets/img/e-commerce/bca.png') ?>" style="height: 50px">
                <img src="<?= base_url('assets/img/e-commerce/bni.png') ?>" style="height: 50px">
            </div>
        </div>
        <div class="footer-copyright">
            <span class="text-white">Copyright &copy; CV. Karya Xylo Abadi. All Right Reserved <?= date('Y') ?></span>
        </div>
    </footer>
    <script src="<?= base_url('') ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url('') ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/smoothproducts.min.js"></script>
    <script src="<?= base_url('') ?>assets/js/theme.js"></script>
    <script>
        $(document).ready(function() {
            $("#categorySearch").on("change", function() {
                const category_id = $(this).val();
                if (category_id != '') {
                    document.location.href = "<?= base_url('h/category/'); ?>" + category_id;
                } else {
                    document.location.href = "<?= base_url('h/product'); ?>";
                }
            });
            $("#typeSearch").on("change", function() {
                const category_id = $("#categorySearch").val();
                const type_id = $(this).val();
                if (type_id != '') {
                    document.location.href = "<?= base_url('h/type/'); ?>" + category_id + "/" + type_id;
                } else {
                    document.location.href = "<?= base_url('h/category/'); ?>" + category_id;
                }
            });
            $("#contact-us").click(function() {
                $('html, body').animate({
                    scrollTop: $(".page-footer").offset().top
                }, 100);
            });
        });
    </script>
    </body>

    </html>