<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
    <div class='container p-4' style="margin-bottom: 100px;">
        <div class="row">
            <div class="d-flex flex-row justify-content-between bd-highlight col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Изменить клиента c id: <?php echo e($client->id); ?></h2>
                </div>
                <div class="pull-right">
                    <a class="btn " href="<?php echo e(route('clients.index')); ?>" style="padding: 10px; background-color: #FFA400; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4); color: #fff;">Вернуться назад <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>

        <?php if(count($errors) > 0): ?>
  	<div class="alert alert-danger">
    		<ul>
      			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        		<li><?php echo e($error); ?></li>
      			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</ul>
  	</div>
	<?php endif; ?>

        <form action="<?php echo e(route('clients.update',$client->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="mb-3">
                        <strong>Имя:</strong>
                        <input type="text" name="name" value="<?php echo e($client->name); ?>" class="form-control" >
                </div>
                <div class="mb-3">
                        <strong>Фамилия:</strong>
                        <input type="text" name="surname" value="<?php echo e($client->surname); ?>" class="form-control" >
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Имя:</strong>
                        <input type="text" name="patronymic" value="<?php echo e($client->patronymic); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Дата рождения:</strong>
                        <input type="date" name="bth" value="<?php echo e($client->bth); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Серия паспорта:</strong>
                        <input type="text" name="series_passport" value="<?php echo e($client->series_passport); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Номер паспорта:</strong>
                        <input type="text" name="number_passport" value="<?php echo e($client->number_passport); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Дата выдачи:</strong>
                        <input type="date" name="date_of_issue" value="<?php echo e($client->date_of_issue); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Дата окончания срока действия:</strong>
                        <input type="date" name="expiration_date" value="<?php echo e($client->expiration_date); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Орган выдавший документ:</strong>
                        <input type="text" name="government_agency" value="<?php echo e($client->government_agency); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Место рождения:</strong>
                        <input type="text" name="place_of_birth" value="<?php echo e($client->place_of_birth); ?>" class="form-control" >
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Пол:</strong>
                        <select id="sex" name='type_sex' class="form-select" aria-label="Default select example" required >
                            <option <?php if($client->type_sex == 'ж') echo("selected"); ?>  value="1">Женский</option>
                            <option <?php if($client->type_sex == 'м') echo("selected"); ?>  value="2">Мужской</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                        <strong>Статус:</strong>
                        <select id="typeClient" name='type_client' class="form-select" aria-label="Default select example" required >
                            <option <?php if($client->type_client == 'VIP') echo("selected"); ?> value="1">VIP</option>
                            <option <?php if($client->type_client == 'Привилегированный') echo("selected"); ?> value="2">Привилегированный</option>
                            <option <?php if($client->type_client == 'Обычный')  echo("selected"); ?>  value="3">Обычный</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn " style="padding: 10px; background-color: #69DADB; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4); color: white">Сохранить изменения</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
<?php /**PATH /Users/macbookpro16/Downloads/laba5/orkis_web/resources/views/clients/edit.blade.php ENDPATH**/ ?>