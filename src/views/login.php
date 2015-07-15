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
                        <li><a href="/register"><?php echo __('page.register');?></a></li>
                        <li><span><?php echo __('page.login');?></span></li>
                        <li><a href="/culture?lang=ru"><?php echo __('culture.ru');?></a></li>
                        <li><a href="/culture?lang=en"><?php echo __('culture.en');?></a></li>
                    </ul>
                </div>
            </header>
            <article>
                <div class="form">
                    <form method="post">
                        <div class="formrow">
                            <?php if (isset($errors['username']) && $error = $errors['username']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.username');?></label>
                            <input type="text" name="username" value="<?php echo $form['username'];?>">
                        </div>
                        <div class="formrow">
                            <?php if (isset($errors['password']) && $error = $errors['password']):?>
                                <div class="error"><?php echo $error;?></div>
                            <?php endif;?>
                            <label><?php echo __('label.password');?></label>
                            <input type="password" name="password" value="<?php echo $form['password'];?>">
                        </div>
                        <div class="formrow">
                            <input type="submit" name="submit" value="<?php echo __('action.login');?>">
                        </div>
                    </form>
                </div>
            </article>
            <footer>
            </footer>
        </div>
    </body>
</html>