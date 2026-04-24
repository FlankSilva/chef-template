<?php
/** @var string $title */
/** @var string $requestPath */
/** @var list<string> $categories */
/** @var array<string, mixed> $feature */
/** @var list<array<string, mixed>> $popular */
/** @var list<array<string, mixed>> $latest */

view('partials/head.php', compact('title'));
view('partials/header.php', ['path' => $requestPath, 'categories' => $categories]);
?>
<div class="min-h-screen flex flex-col">
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-hero"></div>
        <div class="absolute inset-0 opacity-30">
            <img src="<?= h(HERO_IMAGE) ?>" alt="" class="h-full w-full object-cover">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/80 to-primary/30"></div>
        <div class="container-page relative py-20 md:py-32 text-primary-foreground">
            <div class="max-w-3xl">
                <span class="eyebrow text-highlight">Reviews honestos · Atualizados em 2026</span>
                <h1 class="mt-5 font-display font-black text-4xl sm:text-5xl md:text-7xl leading-[1.02] tracking-tight">Os melhores produtos de cozinha, testados antes de chegarem até você.</h1>
                <p class="mt-6 max-w-xl text-base md:text-lg text-primary-foreground/80 leading-relaxed">Comparativos sérios, guias de compra e os achados mais imperdíveis para transformar sua cozinha.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="/blog" class="inline-flex items-center gap-2 rounded-full bg-gradient-accent px-7 py-3.5 font-bold text-accent-foreground shadow-lg-soft">Explorar reviews</a>
                    <a href="/blog/<?= h((string) $feature['slug']) ?>" class="inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 px-7 py-3.5 font-semibold text-primary-foreground">Ver review em destaque</a>
                </div>
            </div>
        </div>
    </section>
    <section class="border-y border-border bg-surface">
        <div class="container-page py-6 flex flex-wrap items-center gap-3 justify-center md:justify-between">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-muted-foreground">Navegue por categoria</span>
            <div class="flex flex-wrap gap-2">
                <?php foreach ($categories as $category): ?>
                    <a href="/blog?cat=<?= urlencode($category) ?>" class="rounded-full border border-border bg-background px-4 py-2 text-sm font-semibold hover:border-accent hover:text-accent transition-colors"><?= h($category) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="container-page py-16 md:py-20">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2"><?php view('components/post-card.php', ['post' => $feature, 'variant' => 'feature']); ?></div>
            <aside><div class="space-y-5"><?php foreach ($popular as $p) { view('components/post-card.php', ['post' => $p, 'variant' => 'compact']); } ?></div></aside>
        </div>
    </section>
    <section class="container-page py-10">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6"><?php foreach ($latest as $p) { view('components/post-card.php', ['post' => $p, 'variant' => 'default']); } ?></div>
    </section>
    <?php view('partials/newsletter.php'); ?>
    <?php view('partials/footer.php', compact('categories')); ?>
</div>
<?php view('partials/scripts.php'); ?>
