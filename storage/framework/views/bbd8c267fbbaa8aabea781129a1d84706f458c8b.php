

<?php $__env->startSection('content'); ?>

    <form method="POST" action="<?php echo e(route('login.adminsubmit')); ?>" class="login-form">
        <?php echo csrf_field(); ?>

        <h3 class="form-title">
            <strong>Login to your domain</strong>
        </h3>
        <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i data-feather="alert-circle" class="mg-r-10"></i> <?php echo e($message); ?>

            </div>
            <?php endif; ?>

            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i data-feather="alert-circle" class="mg-r-10"></i> <?php echo e($message); ?>

            </div>
            <?php endif; ?>
            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
        <div class="form-group <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" 
                    autocomplete="off" placeholder="Username" name="username" required
                    value="<?php echo e(old('username')); ?>" autofocus />
            </div>
            
            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="username" class="help-block"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>

        <div class="form-group">

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required="required" />
            </div>

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span for="password" class="help-block"><?php echo e($message); ?></span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>

        <div class="form-actions">

            <div class="form-actions">

                <button type="submit" class="btn green pull-right">
                    Login <i class="m-icon-swapright m-icon-white"></i>
                </button>
                
            </div>

        </div>
        <div class="form-actions">
            <p class="text-center" style="color:#d32424;margin-top:50px;font-size:17px;font-weight:bold;">The System is in Maintenance Mode!</a></p>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERSONAL\SC\PMC PROJECT\omws\resources\views/auth/adminLogin.blade.php ENDPATH**/ ?>