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
                        <li><a href="/profile"><?php echo __('page.profile');?></a></li>
                        <li><a href="/logout"><?php echo __('page.logout');?></a></li>
                        <li><a href="/culture?lang=ru"><?php echo __('culture.ru');?></a></li>
                        <li><a href="/culture?lang=en"><?php echo __('culture.en');?></a></li>
                    </ul>
                </div>
            </header>
            <article>
                <div class="thumbnail">
                    <img src="<?php echo $thumbnail;?>">
                </div>
                <div class="formrow">
                    <label><?php echo __('label.username');?></label>
                    <div class="profilerow"><?php echo $user['username'];?></div>
                </div>
                <div class="clearboth"></div>
                <div class="formrow">
                    <label><?php echo __('label.firstname');?></label>
                    <div class="profilerow"><?php echo $user['firstname'];?></div>
                </div>
                <div class="clearboth"></div>
                <div class="formrow">
                    <label><?php echo __('label.lastname');?></label>
                    <div class="profilerow"><?php echo $user['lastname'];?></div>
                </div>
                <div class="clearboth"></div>
                <div class="formrow">
                    <label><?php echo __('label.email');?></label>
                    <div class="profilerow"><?php echo $user['email'];?></div>
                </div>
                <div class="clearboth"></div>
            </article>
            <footer>
            </footer>
        </div>
    </body>
</html>