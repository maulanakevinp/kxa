    <footer class="page-footer dark" id="page-footer" style="background-image: url(&quot;<?= base_url('') ?>assets/img/navbar/gambar-background-kayu-hd.jpg&quot;);">
        <div class="container text-center">
            <h4 class="text-white mb-3">Hubungi Kami</h4>
            <div><i class="fa fa-phone text-white mr-2 mb-2" style="font-size: 22px;height: 24px; width: 24.75px;"></i>
                <a href="tel:0251-8414-950" class="text-white">0251-8414-950<br></a>
            </div>
            <div><i class="fab fa-whatsapp text-white mr-2 mb-2" style="font-size: 22px;height: 24px; width: 24.75px;"></i>
                <a href="https://web.whatsapp.com/send?phone=6281380030690" class="text-white">0813-8003-0690<br></a>
            </div>
            <div><i class="fas fa-mail-bulk text-white mr-2 mb-2" style="font-size: 22px;height: 24px; "></i>
                <a href="http://karyaxyloabadi@gmail.com" class="text-white">karyaxyloabadi@gmail.com<br></a>
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
        var elmnt = document.getElementById("page-footer");

        function scrollToTop() {
            elmnt.scrollIntoView(true); // Top
        }

        function scrollToBottom() {
            elmnt.scrollIntoView(false); // Bottom
            console.log('bottom');
        }
    </script>
    </body>

    </html>