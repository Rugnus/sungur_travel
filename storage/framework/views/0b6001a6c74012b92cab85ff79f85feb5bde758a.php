<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>
<body>

<div class="container p-5" style="margin-bottom: 100px; background-color: #F2FFE9;">
<h1>Создание нового сотрудника</h1>
<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>
<form method="post" action="/employees" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <div class="mb-3">
        <label for="name" class="form-label">Имя:</label>
        <input type="text" name='name' class="form-control" id="name"  placeholder="Ваше имя" style="border-radius: 15px;">
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Фамилия:</label>
        <input type="text" name='surname' class="form-control" id="surname" placeholder="Ваше Фамилие" style="border-radius: 15px;">
    </div>
    <div class="mb-3">
        <label for="patronymic" class="form-label">Отчество:</label>
        <input type="text" name='patronymic' class="form-control" id="patronymic" placeholder="Ваше Отчество" style="border-radius: 15px;">
    </div>
    <div class="mb-3">
        <label for="bth" class="form-label">День рождения:</label>
        <input type="date" name='bth' class="form-control" id="bth" style="border-radius: 15px;">
    </div>
    <div class="mb-3">
        <label for="photo" class="form-label">Фото:</label>
        <input type="file" name='photo' class="form-control" id="photo" >
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">Должность сотрудника:</label>
        <select id="position" name='type_position' class="form-select" aria-label="Default select example" style="border-radius: 15px;" required >
            <option disabled>-- Выберите должность сотрудника --</option>
            <option value="1">Бухгалтер</option>
            <option value="2">Администратор</option>
            <option value="3">Менеджер</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="Id_organization" class="form-label">Организация:</label>
        <select id="Id_organization" name='Id_organization' class="form-select" aria-label="Default select example" style="border-radius: 15px;" required >
            <option disabled>-- Выберите организацию --</option>
            <?php $__currentLoopData = $listOrganizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($organization->id); ?>"><?php echo e($organization->organization_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email для входа в систему:</label>
        <input type="email" name='email' class="form-control" id="email" placeholder="example@gmail.com" style="border-radius: 15px;">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Пароль для входа в систему:</label>
        <input type="text" name='password' class="form-control" id="password" placeholder="**********" style="border-radius: 15px;">
    </div>
    <div class="md-3">
        <button type="submit" class="btn" style="padding: 10px; background-color: #2F86A6; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4); color: white">Добавить</button>
        <a href="/employees" class="btn btn-danger" style="padding: 10px; background-color: #CD1818; border-radius: 15px; box-shadow: 0px 4px 12px 2px rgba(34, 60, 80, 0.4);">Отменить</a>
    </div>
    
</form>
</div>

</body>
</html>


<?php /**PATH /Users/macbookpro16/Downloads/laba5/orkis_web/resources/views/employees/create.blade.php ENDPATH**/ ?>