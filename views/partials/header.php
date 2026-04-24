<?php
/** @var string $path */
/** @var list<string> $categories */
?>
<header class="sticky top-0 z-50 border-b border-border bg-background/85 backdrop-blur-md">
    <div class="container-page flex h-16 items-center justify-between gap-6">
        <a href="/" class="flex items-center gap-2 group">
            <span class="grid h-9 w-9 place-items-center rounded-md bg-gradient-accent text-accent-foreground font-black text-lg shadow-md-soft">A</span>
            <span class="hidden sm:flex flex-col leading-none">
                <span class="font-display font-black text-lg tracking-tight">Achados do Chef</span>
                <span class="text-[10px] uppercase tracking-[0.2em] text-muted-foreground mt-0.5">Reviews & guias</span>
            </span>
        </a>
        <nav class="hidden lg:flex items-center gap-7 text-sm font-semibold">
            <a href="/" class="link-underline <?= $path === '/' ? 'text-accent' : '' ?>">Home</a>
            <a href="/blog" class="link-underline <?= str_starts_with($path, '/blog') ? 'text-accent' : '' ?>">Blog</a>
            <a href="/produtos" class="link-underline <?= $path === '/produtos' ? 'text-accent' : '' ?>">Produtos</a>
            <?php foreach (array_slice($categories, 0, 3) as $category): ?>
                <a href="/blog?cat=<?= urlencode($category) ?>" class="link-underline text-foreground/80 hover:text-foreground"><?= h($category) ?></a>
            <?php endforeach; ?>
        </nav>
        <button id="menuToggle" class="lg:hidden grid h-10 w-10 place-items-center rounded-full hover:bg-muted transition-colors" aria-label="Abrir menu">Menu</button>
    </div>
    <div id="mobileMenu" class="lg:hidden border-t border-border bg-background hidden">
        <nav class="container-page py-4 flex flex-col gap-3 text-sm font-semibold">
            <a href="/">Home</a>
            <a href="/blog">Blog</a>
            <a href="/produtos">Produtos</a>
            <?php foreach ($categories as $category): ?>
                <a href="/blog?cat=<?= urlencode($category) ?>" class="text-foreground/80"><?= h($category) ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>
