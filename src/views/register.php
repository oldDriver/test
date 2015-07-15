<html>
    <head>
        <link rel="stylesheet" href="/css/main.css">
        <title></title>
    </head>
    <body>
        <div class="page">
            <header>
                <div class="top-menu">
                    <ul>
                        <li><a href="/"><?php echo __('page.home');?></a></li>
                        <li><span><?php echo __('page.register');?></span></li>
                        <li><a href="/login"><?php echo __('page.login');?></a></li>
                        <li><a href="/culture?lang=ru"><?php echo __('culture.ru');?></a></li>
                        <li><a href="/culture?lang=en"><?php echo __('culture.en');?></a></li>
                    </ul>
                </div>
            </header>
            <article>
                <form method="post" enctype="multipart/form-data">
                        <div class="formrow">
                            <?php if (isset($errors['username']) && $error = $errors['username']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.username');?></label>
                            <input type="text" maxlength="255" name="username" value="<?php echo $form['username'];?>">
                        </div>
                        <div class="formrow">
                            <?php if (isset($errors['firstname']) && $error = $errors['firstname']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.firstname');?></label>
                            <input type="text" maxlength="255" name="firstname" value="<?php echo $form['firstname'];?>">
                        </div>
                        <div class="formrow">
                            <?php if (isset($errors['lastname']) && $error = $errors['lastname']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.lastname');?></label>
                            <input type="text" maxlength="255" name="lastname" value="<?php echo $form['lastname'];?>">
                        </div>
                        <div class="formrow">
                            <?php if (isset($errors['email']) && $error = $errors['email']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.email');?></label>
                            <input type="text" maxlength="255" name="email" value="<?php echo $form['email'];?>">
                        </div>
                        <div class="formrow">
                            <?php if (isset($errors['password']) && $error = $errors['password']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.password');?></label>
                            <input type="password" maxlength="255" name="password" value="<?php echo $form['password'];?>">
                        </div>
                        <div class="formrow">
                            <?php if (isset($errors['retype']) && $error = $errors['retype']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.retype');?></label>
                            <input type="password" maxlength="255" name="retype" value="<?php echo $form['retype'];?>">
                        </div>
                       <div class="formrow">
                            <label><?php echo __('label.file');?></label>
                            <input type="file" name="file">
                        </div>
                        <div class="formrow">
                            <input type="submit" name="submit" value="<?php echo __('action.registry');?>">
                        </div>
                </form>
            </article>
            <footer>
            </footer>
        </div>
    </body>
</html>
