<?php $__env->startSection('content'); ?>
<h1>Главная</h1></br></br>
<div class="container">
    <h4>Добро пожаловать, <?php echo e(Auth::user()->name); ?> , на сайт туристического агенства!</h4>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/std/orkis_web/resources/views/welcome.blade.php ENDPATH**/ ?>