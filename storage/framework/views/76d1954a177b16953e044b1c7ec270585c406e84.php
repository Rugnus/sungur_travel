<?php $__env->startSection('content'); ?>

<div class="d-flex flex-row justify-content-between">
    <div><h2>Сотрудники</h2></div>
    <div class="d-flex justify-content-end" style="align-self: center;"><a href="employees/create" class="btn btn-primary mb-2">Добавить нового сотрудника</a></div>
</div>
<?php if(\Session::has('flash_message')): ?>
    <div class="alert alert-danger">
        <p><?php echo \Session::get('flash_message'); ?></p>
    </div>
<?php endif; ?>
<div class="d-flex flex-column bd-highlight mb-3 align-items-center">
    <?php if(count($employees) > 0): ?>
    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-row justify-content-between bd-highlight mb-3 card" style="width: 50rem;">
            <div class="p-2 bd-highlight" style="align-self:center">
                <strong>Имя:</strong>
                <p><?php echo e($employee->name); ?></p>
                <strong>Фамилия:</strong>
                <p><?php echo e($employee->surname); ?></p>
                <strong>Отчество:</strong>
                <p><?php echo e($employee->patronymic); ?> </p>
                <strong>Дата рождения:</strong>
                <p><?php echo e($employee->bth); ?> </p>
                <strong>Должность сотрудника:</strong>
                <p><?php echo e($employee->type_position); ?> </p>
                <strong>Организация:</strong>
                <p><?php echo e($employee->organization_name); ?></p> 
            </div>
            <div class="p-2 bd-highlight" >
                <strong>Фото сотрудника:</strong>
                <p><img src="<?php echo e(asset('storage/' .$employee->photo)); ?>" alt="photo" height='250px'> </p>
		<a href="<?php echo e(Storage::url($employee->photo)); ?>" download class="btn btn-outline-success">Скачать изображение</a>
            </div>
            <div class="p-2 bd-highlight d-flex  align-items-end">
                <div>
                    <a class="btn btn-warning" href="<?php echo e(route('employees.edit', $employee->id)); ?>">Изменить</a>
                </div>
                <div>
                    <form action="<?php echo e(route('employees.destroy',$employee->id)); ?>" method="post">
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
    <form class="d-flex" method="get" action="/employees/filter">   
        <select id="position" name='filter' class="form-select" aria-label="Default select example" required >
            <option disabled>Фильтр по должности</option>
            <option value="1">Бухгалтер</option>
            <option value="2">Администратор</option>
            <option value="3">Менеджер</option>
        </select>
        <button type='submit' class="btn btn-outline-success" style="margin-left:10px; margin-right:20px;">Filter</button>
    </form>
    <form class="d-flex" method="get" action="/employees/search">
        <input class="form-control me-2" type="text" id="search" name="text" placeholder="Поиск по фамилии" aria-label="Search">
        <button type='submit' class="btn btn-outline-success">Search</button>
    </form>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
<title>Сотрудники</title>
<?php $__env->stopSection(); ?>
    

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/std/orkis_web/resources/views//employees/index.blade.php ENDPATH**/ ?>