<?php
/** @var string $title */
/** @var string $requestPath */
/** @var list<string> $categories */
/** @var list<array<string, mixed>> $list */
/** @var array<string, mixed> $query */
/** @var string $activeCategory */
/** @var string $sort */

view('partials/head.php', compact('title'));
view('partials/header.php', ['path' => $requestPath, 'categories' => $categories]);
?>
<div class="min-h-screen flex flex-col">
    <section class="relative bg-primary text-primary-foreground overflow-hidden">
        <div class="absolute inset-0 bg-gradient-hero opacity-90"></div>
        <div class="container-page relative py-16 md:py-24">
            <span class="eyebrow text-highlight">Catálogo</span>
            <h1 class="mt-3 font-display font-black text-4xl md:text-6xl tracking-tight max-w-3xl">Todos os produtos que já testamos</h1>
        </div>
    </section>
    <section class="border-b border-border bg-surface">
        <div class="container-page py-4">
            <form method="get" class="grid md:grid-cols-3 gap-3">
                <input type="search" name="q" value="<?= h((string) ($query['q'] ?? '')) ?>" placeholder="Buscar produto..." class="rounded-full border border-border bg-background px-4 py-2.5 text-sm">
                <select name="cat" class="rounded-full border border-border bg-background px-4 py-2 text-sm font-semibold">
                    <option <?= $activeCategory === 'Todos' ? 'selected' : '' ?>>Todos</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= h($category) ?>" <?= $activeCategory === $category ? 'selected' : '' ?>><?= h($category) ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="sort" class="rounded-full border border-border bg-background px-4 py-2 text-sm font-semibold">
                    <option value="rating" <?= $sort === 'rating' ? 'selected' : '' ?>>Melhor avaliados</option>
                    <option value="price-asc" <?= $sort === 'price-asc' ? 'selected' : '' ?>>Menor preço</option>
                    <option value="price-desc" <?= $sort === 'price-desc' ? 'selected' : '' ?>>Maior preço</option>
                </select>
                <button class="md:col-span-3 rounded-full bg-primary text-primary-foreground py-2.5 font-semibold">Aplicar filtros</button>
            </form>
        </div>
    </section>
    <section class="container-page py-12">
        <p class="text-sm text-muted-foreground mb-6"><?= h((string) count($list)) ?> produtos encontrados</p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($list as $product): ?>
                <?php $detailHref = product_page_path((string) $product['postSlug'], (string) $product['slug']); ?>
                <article class="group flex flex-col rounded-2xl border border-border bg-card overflow-hidden shadow-sm-soft hover:shadow-lg-soft hover:-translate-y-1 transition-all">
                    <a href="<?= h($detailHref) ?>" class="block aspect-[4/3] overflow-hidden bg-muted"><img src="<?= h((string) $product['image']) ?>" alt="<?= h((string) $product['name']) ?>" class="h-full w-full object-cover group-hover:scale-105 transition-transform duration-500"></a>
                    <div class="p-5 flex flex-col flex-1">
                        <span class="eyebrow text-xs"><?= h((string) $product['category']) ?></span>
                        <h3 class="mt-2 font-display font-bold text-lg leading-tight"><a href="<?= h($detailHref) ?>" class="hover:text-accent transition-colors"><?= h((string) $product['name']) ?></a></h3>
                        <p class="mt-3 text-accent font-black text-xl"><?= h((string) $product['price']) ?></p>
                        <a href="<?= h($detailHref) ?>" class="mt-auto rounded-full bg-gradient-accent px-4 py-3 text-center text-sm font-bold text-accent-foreground shadow-md-soft hover:-translate-y-0.5 transition-transform">Ver produto</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php view('partials/newsletter.php'); ?>
    <?php view('partials/footer.php', compact('categories')); ?>
</div>
<?php view('partials/scripts.php'); ?>
