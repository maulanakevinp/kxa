<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; CV. Karya Xylo Abadi. All Right Reserved <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script>
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $("#category").on("change", function() {
            const category_id = $(this).val();
            if (category_id != '') {
                $.ajax({
                    url: '<?= base_url('menu/categoryid') ?>',
                    type: 'post',
                    data: {
                        id: category_id
                    },
                    success: function(data) {
                        $("#type").html(data);
                    }
                });
            } else {
                $("#type").html('<option value=""> Select Type </option>');
            }
        });
        $("#categorySearch").on("change", function() {
            const category_id = $(this).val();
            if (category_id != '') {
                document.location.href = "<?= base_url('menu/productByCategory/'); ?>" + category_id;
            } else {
                document.location.href = "<?= base_url('menu/product'); ?>";
            }
        });
        $("#typeSearch").on("change", function() {
            const category_id = $("#categorySearch").val();
            const type_id = $(this).val();
            if (type_id != '') {
                document.location.href = "<?= base_url('menu/productByType/'); ?>" + category_id + "/" + type_id;
            } else {
                document.location.href = "<?= base_url('menu/productByCategory/'); ?>" + category_id;
            }
        });
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');
            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }
            });
        });
        $('.addTypeModal').on('click', function() {
            $('#TypeModalLabel').html('Add New Type');
            $('.modal-footer button[type=submit]').html('Add Type');
        });

        $('.editTypeModal').on('click', function() {
            const id = $(this).data('id');
            const url = $(this).data('url');
            $('#TypeModalLabel').html('Edit Type');
            $('.modal-footer button[type=submit]').html('Edit Type');
            $('#form').attr('action', '<?= base_url('menu/editType/') ?>' + url + '/' + id);

            $.ajax({
                url: '<?= base_url('menu/getType') ?>',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#type').val(data.type);
                }
            });

        });
    });
</script>

</body>

</html>