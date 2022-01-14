<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row justify-content-between">
<div><h2>Не оплаченные договора</h2></div>
<div class="d-flex justify-content-end" style="align-self: center; padding: 10px; background-color: #17D7A0; border-radius: 15px; box-shadow: 0px 1px 12px 2px rgba(34, 60, 80, 0.4);"><a href="contract/create" class="" style="color: #FFF; text-decoration: none;" >Создать новый договор</a></div>
</div>

<div class="d-flex flex-column bd-highlight mb-3 align-items-center">
<table class="table table-sm table-striped ">
    <thead>
        <tr>
        <th scope="col">Договор</th>
        <th scope="col">Согл.</th>
        <th scope="col">Дата создания контракта</th>
        <th scope="col">Агент</th>
        <th scope="col">Организация</th>
        <th scope="col">Клиент</th>
        <th scope="col">Участник(и)</th>
        <th scope="col">Страна, город</th>
        <th scope="col">Гостиница</th>
        <th scope="col">Тип номера</th>
        <th scope="col">Тип питания</th>
        <th scope="col">Начало поездки</th>
        <th scope="col">Конец поездки</th>
        <th scope="col">Стоимость в валюте</th>
        <!-- <th scope="col">Действия</th> -->
        </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <th scope="row"><?php echo e($contract->id); ?></th>
        <th><?php echo e($contract->id_agreement); ?></th>
        <td><?php echo e($contract->contract_created_at); ?></td>
        <td><?php echo e($contract->agent_surname); ?> <?php echo e($contract->agent_name); ?> <?php echo e($contract->agent_patronymic); ?></td>
        <td><?php echo e($contract->organization_name); ?></td>
        <td><?php echo e($contract->client_surname); ?> <?php echo e($contract->client_name); ?> <?php echo e($contract->client_patronymic); ?></td>
        <td><?php echo e($contract->participant_fullname); ?></td>
        <td><?php echo e($contract->name_country); ?> <?php echo e($contract->name_city); ?></td>
        <td><?php echo e($contract->hotel_name); ?></td>
        <td><?php echo e($contract->type_room); ?></td>
        <td><?php echo e($contract->type_food); ?></td>
        <td><?php echo e($contract->start_of_trip); ?></td>
        <td><?php echo e($contract->end_of_trip); ?></td>
        <td><?php echo e($contract->amount_in_currency); ?></td>
        <td><div class="p-2 bd-highlight d-flex  align-items-end">
            <!-- <div>
                <a class="btn btn-warning" href="<?php echo e(route('contract.edit', $contract->id)); ?>">Изменить</a>
            </div> -->
            <!-- <div>
                <form action="<?php echo e(route('contract.destroy',$contract->id)); ?>" method="post">
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
<title>Договоры</title>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro16/Downloads/laba5/orkis_web/resources/views/contract/index.blade.php ENDPATH**/ ?>