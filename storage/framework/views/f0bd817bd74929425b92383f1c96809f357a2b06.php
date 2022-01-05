<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row justify-content-between">
<div><h2>Валюты на дату: <?php echo e($date); ?></h2></div>
</div>

<div class="d-flex flex-column bd-highlight mb-3 align-items-center">
<table class="table table-sm table-striped ">
    <thead>
        <tr>
            <th scope="col">Код</th>
            <th scope="col">Наименование</th>
            <th scope="col">Курс</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row p-3" style='vertical-align: middle;'><img src="https://img.icons8.com/stickers/100/000000/money.png"/ width='30' class='me-3'><?php echo e($value['NumCode']); ?></th>
                    <td class="p-3"><?php echo e($value['Name']); ?></td>
                    <td class="p-3"><?php echo e($value['Value']); ?></td>
                </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>Валюты</title>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/std/orkis_web/resources/views/currency/index.blade.php ENDPATH**/ ?>