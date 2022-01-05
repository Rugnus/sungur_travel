<?php $__env->startSection('content'); ?>
<h1>Главная</h1></br></br>
<div class="container">
    <h4 style="max-width: 750px; margin-bottom: 70px">Уважаемый <?php echo e(Auth::user()->name); ?> , добро пожаловать на сайт туристического агенства!</h4>
    <div class="d-flex justify-content-between">
        <p style="font-size: 22px">«Sungur Travel» — один из лидеров российского рынка, его услугами пользуются миллионы туристов. 
            Туроператор не просто предлагает путешествия в самые разные страны, 
            но и помогает организовать различные сценарии отдыха: романтический, познавательный, экзотический и т.д. <br>
            Sungur Travel отправляет на отдых из 50 российских городов на курорты 22 стран (2500 отелей), организуя групповые, 
            индивидуальные, корпоративные, спортивные и VIP туры.<br><br>

            Sungur Travel организует путешествия в ОАЭ, Кипр, а также Сочи, Анапу, Абхазию, Байкал и другие курорты.
        </p>
            <p><img src="<?php echo e(Storage::url('photos/rabotnici.jpeg')); ?>" alt="photo" height='350px'> </p>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro16/Downloads/laba5/orkis_web/resources/views/welcome.blade.php ENDPATH**/ ?>