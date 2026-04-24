<?php
/** @var list<string> $categories */
?>
<footer class="mt-24 border-t border-border bg-primary text-primary-foreground">
    <div class="container-page py-14 grid gap-10 md:grid-cols-4">
        <div class="md:col-span-2">
            <div class="flex items-center gap-2 mb-4">
                <span class="grid h-9 w-9 place-items-center rounded-md bg-gradient-accent text-accent-foreground font-black text-lg">A</span>
                <span class="font-display font-black text-xl">Achados do Chef</span>
            </div>
            <p class="text-sm text-primary-foreground/70 max-w-md leading-relaxed">Reviews honestos, comparativos sérios e guias de compra dos melhores produtos para a sua cozinha.</p>
        </div>
        <div>
            <h4 class="font-bold text-sm uppercase tracking-wider mb-4">Categorias</h4>
            <ul class="space-y-2 text-sm text-primary-foreground/80">
                <?php foreach ($categories as $category): ?>
                    <li><a href="/blog?cat=<?= urlencode($category) ?>" class="hover:text-accent transition-colors"><?= h($category) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div>
            <h4 class="font-bold text-sm uppercase tracking-wider mb-4">Sobre</h4>
            <ul class="space-y-2 text-sm text-primary-foreground/80">
                <li><a href="/blog" class="hover:text-accent transition-colors">Todos os reviews</a></li>
                <li><a href="/produtos" class="hover:text-accent transition-colors">Catálogo de produtos</a></li>
                <li><a href="/design-system" class="hover:text-accent transition-colors">Design system</a></li>
            </ul>
        </div>
    </div>
    <div class="border-t border-primary-foreground/10">
        <div class="container-page py-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-primary-foreground/60">
            <p>&copy; <?= h(current_year()) ?> Achados do Chef. Todos os direitos reservados.</p>
            <p>Alguns links são afiliados.</p>
        </div>
    </div>
</footer>
