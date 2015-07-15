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
                    <li><span><?php echo __('page.home');?></span></li>
                    <?php if ($user):?>
                    <li><a href="/profile"><?php echo __('page.profile');?></a></li>
                    <li><a href="/logout"><?php echo __('page.logout');?></a></li>
                    <?php else: ?>
                    <li><a href="/register"><?php echo __('page.register');?></a></li>
                    <li><a href="/login"><?php echo __('page.login');?></a></li>
                    <?php endif;?>
                    <li><a href="/culture?lang=ru"><?php echo __('culture.ru');?></a></li>
                    <li><a href="/culture?lang=en"><?php echo __('culture.en');?></a></li>
                </ul>
            </div>
            </header>
            <article>
            
            
            
            </article>
            <footer>
            </footer>
        </div>
    </body>
</html>
