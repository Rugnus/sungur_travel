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

<div class="container p-5" style="margin-bottom: 100px;">
<h1>Создание нового платежа</h1>
<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
<?php endif; ?>
<form method="post" action="/payment" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <div class="mb-3">
        <label for="date_payment" class="form-label">Дата оплаты:</label>
        <input type="date" name='date_payment' class="form-control" id="date_payment" style="border-radius: 15px;" value="<?php echo date("Y-m-d");?>">
    </div>
    <div class="mb-3">
        <label for="organization" class="form-label">Организация:</label>
        <select onchange="getOrganization(this.value)" id="organization" name='organization' class="form-select" style="border-radius: 15px;" aria-label="Default select example" required >
            <option disabled>-- Выберите организацию --</option>
            <?php $__currentLoopData = $listOrganizationsWithContact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($organization->id); ?>"><?php echo e($organization->organization_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_contract" class="form-label">Номер договора:</label>
        <select id="id_contract" name='id_contract' class="form-select" aria-label="Default select example" style="border-radius: 15px;" required >
            <!-- <option disabled>-- Выберите номер договора --</option> -->
        </select>
    </div>
    <div class="mb-3">
        <label for="accountant" class="form-label">Бухгалтер:</label>
        <select id="accountant" name='accountant' class="form-select" aria-label="Default select example" style="border-radius: 15px;" required >
            <!-- <option disabled>-- Бухгалтер --</option> -->
        </select>
    </div>
    <div class="mb-3">
        <label for="amount_in_rubels" class="form-label">Стоимость в рублях:</label>
        <input type="text" name='amount_in_rubels' class="form-control" id="amount_in_rubels" style="border-radius: 15px;" placeholder="XXXXXX.XX">
    </div>
    <div class="md-3">
        <button type="submit" class="btn btn-primary">Добавить</button>
        <a href="/payment" class="btn btn-secondary">Отменить</a>
    </div>
    
</form>
</div>
<script>
    let employee = <?php echo json_encode($listAccounts); ?>;
    let listOrganizationsWithContact = <?php echo json_encode($listOrganizationsWithContact); ?>;
    console.log(listOrganizationsWithContact);
    console.log(employee);
    function getOrganization(idOrganization){
        removeOption('accountant');
	removeOption('id_contract');
        var flag = false;
        employee.map(function(element){
            if(element.Id_organization == idOrganization){
                let newOption = new Option(element.surname+' '+element.name+' '+element.patronymic, element.id);
                accountant.append(newOption);
                newOption.selected = true;
		    if(!flag){
                    listOrganizationsWithContact.map(function(el){
                        if(idOrganization == el.id){
                            createOptionForContract(el.nonpay_id_contract);
                            flag = true;
                        }
                    })
                }   
            }
        })
    }
    function createOptionForContract(nonpay_id_contracts){
        nonpay_id_contracts.split(',').map(function(e){
            newOption = new Option(e, e);
            id_contract.append(newOption);
            newOption.selected = true;
        })
    }
    function removeOption(idElement){
        var i, L = document.getElementById(idElement).options.length - 1;
            for(i = L; i >= 0; i--) {
                document.getElementById(idElement).remove(i);
            } 
    }
</script>
</body>
</html>


<?php /**PATH /Users/macbookpro16/Downloads/laba5/orkis_web/resources/views/payment/create.blade.php ENDPATH**/ ?>