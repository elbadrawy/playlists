<?php if(Session::has('flash_message')): ?>
    <script>
        swal({
            title: "<?php echo e(Session::get('flash_message')); ?>",
            text: "This message will disappear after 2 seconds",
            timer: 2000,
            showConfirmButton: false
        });
    </script>

    <?php echo e(Session::forget('flash_message')); ?>


<?php endif; ?>