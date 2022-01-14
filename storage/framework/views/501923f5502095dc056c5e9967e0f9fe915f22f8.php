<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row justify-content-between">
    <div><h2>Список клиентов</h2></div>
    <div class="d-flex justify-content-end" style="align-self: center; padding: 10px; background-color: #17D7A0; border-radius: 15px; box-shadow: 0px 1px 12px 2px rgba(34, 60, 80, 0.4);"><a href="clients/create" class="" style="color: #FFF; text-decoration: none; ">Добавить нового клиента</a></div>
</div>

<div class="d-flex flex-column bd-highlight mb-3 align-items-center mt-3">
<?php if(count($clients) > 0): ?>
    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-row justify-content-between bd-highlight mb-3 card" style="width: 100%; background-color: #F2FFE9; border-radius: 20px; box-shadow: 0px 2px 8px 0px rgba(34, 60, 80, 0.2);">
            <div class="p-2 bd-highlight" style="align-self:center">
                <strong>Имя:</strong>
                <p><?php echo e($client->name); ?></p>
                <strong>Фамилия:</strong>
                <p><?php echo e($client->surname); ?></p>
                <strong>Отчество:</strong>
                <p><?php echo e($client->patronymic); ?> </p>
                <strong>Дата рождения:</strong>
                <p><?php echo e($client->bth); ?> </p>
                <strong>Серия паспорта:</strong>
                <p><?php echo e($client->series_passport); ?> </p>
                <strong>Номер паспорта:</strong>
                <p><?php echo e($client->number_passport); ?> </p>
            </div>
            <div class="p-2 bd-highlight" style="align-self:center">
                <strong>Дата выдачи паспорта:</strong>
                <p><?php echo e($client->date_of_issue); ?> </p>
                <strong>Дата окончания срока действия</strong>
                <p><?php echo e($client->expiration_date); ?> </p>
                <strong>Орган выдавший документ:</strong>
                <p><?php echo e($client->government_agency); ?> </p>
                <strong>Место рождения:</strong>
                <p><?php echo e($client->place_of_birth); ?> </p>
                <strong>Пол:</strong>
                <p><?php echo e($client->type_sex); ?> </p>
                <strong>Статус клиента:</strong>
                <p><?php echo e($client->type_client); ?></p>
            </div>
            <div class="p-2 bd-highlight d-flex  align-items-end">
                <div style="padding: 10px; background-color: #009DAE; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4);">
                    <a class="" href="<?php echo e(route('clients.edit', $client->id)); ?>" style="color: #FFF; text-decoration: none;">Изменить</a>
                </div>
                <div>
                    <form action="<?php echo e(route('clients.destroy',$client->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button  type="submit"  class="btn btn-danger ms-2" style="padding: 10px; background-color: #CD1818; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4);">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <p>Записей не найдено...</p>
    <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>
    <form class="d-flex" method="get" action="/clients/filter">
        <select id="typeClient" name='filter' class="form-select" aria-label="Default select example" required >
                <option disabled>Фильтр по статусу </option>
                <option value="1">VIP</option>
                <option value="2">Привилегированный</option>
                <option value="3">Обычный</option>
        </select>
        <button type='submit' class="btn btn-outline-primary" style="margin-left:10px; margin-right:20px;">Фильтр</button>
    </form>
    <form class="d-flex" method="get" action="/clients/search">
        <input class="form-control me-2" type="text" id="search" name="text" placeholder="Поиск по фамилии" aria-label="Search">
        <button type='submit' class="btn btn-outline-primary">Поиск</button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>Клиенты</title>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro16/Downloads/laba5/orkis_web/resources/views//clients/index.blade.php ENDPATH**/ ?>