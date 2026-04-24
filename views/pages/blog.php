<?php
/** @var string $title */
/** @var string $requestPath */
/** @var list<string> $categories */
/** @var list<array<string, mixed>> $filtered */
/** @var array<string, mixed>|null $feature */
/** @var list<array<string, mixed>> $rest */
/** @var string $active */
/** @var array<string, mixed> $query */

view('partials/head.php', compact('title'));
view('partials/header.php', ['path' => $requestPath, 'categories' => $categories]);
?>
<div class="min-h-screen flex flex-col">
    <section class="border-b border-border bg-surface">
        <div class="container-page py-14 md:py-20">
            <span class="eyebrow">Blog</span>
            <h1 class="mt-3 font-display font-black text-4xl md:text-6xl tracking-tight">Achados do Chef <span class="text-accent">— Reviews</span></h1>
            <form method="get" class="mt-8 flex flex-col gap-3 max-w-xl">
                <input name="q" value="<?= h((string) ($query['q'] ?? '')) ?>" placeholder="Buscar reviews, marcas, produtos..." class="w-full rounded-full border border-border bg-background py-3.5 px-5 text-sm focus:outline-none focus:border-accent">
                <div class="flex flex-wrap gap-2">
                    <a href="/blog" class="rounded-full px-4 py-2 text-sm font-semibold border <?= $active === '' ? 'bg-primary text-primary-foreground border-primary' : 'border-border bg-background' ?>">Todos</a>
                    <?php foreach ($categories as $category): ?>
                        <a href="/blog?cat=<?= urlencode($category) ?>" class="rounded-full px-4 py-2 text-sm font-semibold border <?= $active === $category ? 'bg-primary text-primary-foreground border-primary' : 'border-border bg-background' ?>"><?= h($category) ?></a>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </section>
    <section class="container-page py-14">
        <?php if (count($filtered) === 0): ?>
            <p class="text-center text-muted-foreground py-20">Nenhum review encontrado para esses filtros.</p>
        <?php endif; ?>
        <?php if ($feature !== null): ?>
            <div class="mb-12"><?php view('components/post-card.php', ['post' => $feature, 'variant' => 'feature']); ?></div>
        <?php endif; ?>
        <?php if (count($rest) > 0): ?>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6"><?php foreach ($rest as $p) { view('components/post-card.php', ['post' => $p, 'variant' => 'default']); } ?></div>
        <?php endif; ?>
    </section>
    <?php view('partials/newsletter.php'); ?>
    <?php view('partials/footer.php', compact('categories')); ?>
</div>
<?php view('partials/scripts.php'); ?>
