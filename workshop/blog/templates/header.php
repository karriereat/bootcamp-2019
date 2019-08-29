<header class="header">
    <a class="header-link header-title" href="/articles.php">My Blog</a>

    <?php if(isset($_SESSION['user'])): ?>
        <a class="header-link" href="logout.php"><?php echo $_SESSION['user']['email'] ?> ausloggen</a> 
    <?php else: ?>
        <a class="header-link" href="login.php">Login</a> 
    <?php endif; ?>
</header>