<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row justify-content-between">
<div><h2>Оплаченные договора</h2></div>
<div class="d-flex justify-content-end" style="align-self: center; padding: 10px; background-color: #17D7A0; border-radius: 15px; box-shadow: 0px 1px 12px 2px rgba(34, 60, 80, 0.4);"><a href="payment/create" class="" style="color: #FFF; text-decoration: none;">Создать новый платеж</a></div>
</div>

<div class="d-flex flex-column bd-highlight mb-3 align-items-center">
        <table class="table table-striped ">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Номер договора</th>
            <th scope="col">Дата оплаты</th>
            <th scope="col">Организация</th>
            <th scope="col">Бухгалтер</th>
            <th scope="col">Сумма в рублях</th>
            <!-- <th scope="col">Действия</th> -->
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <th scope="row"><?php echo e($payment->id); ?></th>
            <td><?php echo e($payment->id_contract); ?></td> 
            <td><?php echo e($payment->date_of_payment); ?></td>
            <td><?php echo e($payment->organization_name); ?></td> 
            <td> <?php echo e($payment->employee_surname); ?>  <?php echo e($payment->employee_name); ?> <?php echo e($payment->employee_patronymic); ?></td> 
            <td><?php echo e($payment->amount_in_rubels); ?></td>
            <td><div class="p-2 bd-highlight d-flex  align-items-end">
                <!-- <div>
                    <a class="btn btn-warning" href="<?php echo e(route('payment.edit', $payment->id)); ?>">Изменить</a>
                </div> -->
                <!-- <div>
                    <form action="<?php echo e(route('payment.destroy',$payment->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button  type="submit"  class="btn btn-danger ms-2">Удалить</button>
                    </form>
                </div> -->
            </div>
        </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>Платежи</title>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro16/Downloads/laba5/orkis_web/resources/views//payment/index.blade.php ENDPATH**/ ?>