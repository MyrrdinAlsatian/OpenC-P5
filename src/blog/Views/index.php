<?= $renderer->render('header') ?>
<h1>Hello de l'index</h1>
    <ul>
        <li> <a href="<?= $router->generateUri('blog.show', ['slug' => 'trotro-7']) ?>"> article 1</a></li>
        <li>article 2</li>
        <li>article 3</li>
        <li>article 4</li>
        <li>article 5</li>
        <li>article 6</li>
    </ul><?= $renderer->render('footer') ?>