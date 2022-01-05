<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row justify-content-between">
    <div><h2>Клиенты</h2></div>
    <div class="d-flex justify-content-end" style="align-self: center;"><a href="clients/create" class="btn btn-primary mb-2">Добавить нового клиента</a></div>
</div>

<div class="d-flex flex-column bd-highlight mb-3 align-items-center">
<?php if(count($clients) > 0): ?>
    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-row justify-content-between bd-highlight mb-3 card" style="width: 50rem;">
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
                <div>
                    <a class="btn btn-warning" href="<?php echo e(route('clients.edit', $client->id)); ?>">Изменить</a>
                </div>
                <div>
                    <form action="<?php echo e(route('clients.destroy',$client->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button  type="submit"  class="btn btn-danger ms-2">Удалить</button>
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
        <button type='submit' class="btn btn-outline-success" style="margin-left:10px; margin-right:20px;">Filter</button>
    </form>
    <form class="d-flex" method="get" action="/clients/search">
        <input class="form-control me-2" type="text" id="search" name="text" placeholder="Поиск по фамилии" aria-label="Search">
        <button type='submit' class="btn btn-outline-success">Search</button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>Клиенты</title>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/std/orkis_web/resources/views//clients/index.blade.php ENDPATH**/ ?>