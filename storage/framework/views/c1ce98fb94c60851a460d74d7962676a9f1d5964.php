<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row justify-content-between">
<div><h2>Соглашения без договора</h2></div>
<div class="d-flex justify-content-end" style="align-self: center;"><a href="agreement/create" class="btn btn-primary mb-2">Создать новое соглашение</a></div>
</div>

<div class="d-flex flex-column bd-highlight mb-3 align-items-center">
<div class="d-flex flex-row justify-content-between bd-highlight mb-3" >
    <table class="table table-striped ">
    <thead>
        <tr>
        <th scope="col">Согл.</th>
        <th scope="col">Дата оформления</th>
        <th scope="col">Количество участников</th>
        <th scope="col">Начало поездки</th>
        <th scope="col">Конец поездки</th>
        <th scope="col">Организация</th>
        <th scope="col">Агент</th>
        <th scope="col">Клиент</th>
        <th scope="col">Страна </th>
        <th scope="col">Город(а) </th>
        <!-- <th scope="col">Сотрудник</th> -->
        <th scope="col">Действия</th>
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $agreements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agreement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <th scope="row"><?php echo e($agreement->id); ?></th>
        <td><?php echo e($agreement->date); ?></td>
        <td><?php echo e($agreement->number_of_participants); ?></td>
        <td><?php echo e($agreement->start_of_trip); ?></td>
        <td><?php echo e($agreement->end_of_trip); ?></td>
        <td><?php echo e($agreement->organization_name); ?></td>
        <td><?php echo e($agreement->agent_surname); ?> <?php echo e($agreement->agent_name); ?> <?php echo e($agreement->agent_patronymic); ?></td>
        <td><?php echo e($agreement->client_surname); ?> <?php echo e($agreement->client_name); ?> <?php echo e($agreement->client_patronymic); ?></td>
        <td><?php echo e($agreement->name_country); ?></td>
        <td><?php echo e($agreement->cities); ?></td>
        <!-- <td><?php echo e($agreement->employee_surname); ?></td> -->
        <td><div class="p-2 bd-highlight d-flex  align-items-end">
            <!-- <div>
                <a class="btn btn-warning" href="<?php echo e(route('agreement.edit', $agreement->id)); ?>">Изменить</a>
            </div> -->
            <div>
                <form action="<?php echo e(route('agreement.destroy',$agreement->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button  type="submit"  class="btn btn-danger ms-2">Удалить</button>
                </form>
            </div>
        </div>
    </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    
    </table>


</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>Соглашения</title>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/std/orkis_web/resources/views/agreement/index.blade.php ENDPATH**/ ?>