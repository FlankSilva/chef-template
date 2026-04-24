<?php
/** @var string $title */
/** @var list<string> $categories */
/** @var array<string, mixed> $post */
/** @var list<array<string, mixed>> $related */

view('partials/head.php', compact('title'));
view('partials/header.php', ['path' => '/blog', 'categories' => $categories]);
?>
<div class="min-h-screen flex flex-col">
    <div class="border-b border-border bg-surface">
        <div class="container-page py-3 flex flex-wrap items-center gap-2 text-xs text-muted-foreground">
            <a href="/" class="hover:text-accent transition-colors">Home</a><span>›</span>
            <a href="/blog" class="hover:text-accent transition-colors">Blog</a><span>›</span>
            <a href="/blog?cat=<?= urlencode((string) $post['category']) ?>" class="hover:text-accent transition-colors"><?= h((string) $post['category']) ?></a><span>›</span>
            <span class="text-foreground/80 truncate max-w-[min(100%,28rem)]"><?= h((string) $post['title']) ?></span>
        </div>
    </div>
    <section class="relative overflow-hidden bg-primary text-primary-foreground">
        <div class="absolute inset-0 opacity-25">
            <img src="<?= h((string) $post['cover']) ?>" alt="" class="h-full w-full object-cover" aria-hidden="true">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/85 to-primary/40"></div>
        <div class="container-page relative py-16 md:py-24 lg:py-28">
            <div class="max-w-4xl">
                <a href="/blog" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-foreground/80 hover:text-accent transition-colors mb-6">← Voltar ao blog</a>
                <span class="eyebrow text-highlight"><?= h((string) $post['category']) ?></span>
                <h1 class="mt-4 font-display font-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-[1.05] tracking-tight"><?= h((string) $post['title']) ?></h1>
                <p class="mt-5 text-lg md:text-xl text-primary-foreground/85 leading-relaxed max-w-3xl"><?= h((string) $post['subtitle']) ?></p>
                <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-primary-foreground/75 border-t border-primary-foreground/15 pt-5">
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-accent shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        <?= h((string) $post['author']) ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-accent shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="4" rx="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                        <?= h((string) $post['date']) ?>
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="h-4 w-4 text-accent shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <?= h((string) $post['readingTime']) ?> de leitura
                    </span>
                    <button type="button" class="share-article-btn ml-auto inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 px-4 py-2 text-xs font-semibold hover:border-accent hover:text-accent transition-colors" data-share-title="<?= h((string) $post['title']) ?>">
                        <svg class="h-3.5 w-3.5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" x2="15.41" y1="13.51" y2="17.49"/><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"/></svg>
                        Compartilhar
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class="container-page -mt-8 md:-mt-12 relative z-10 mb-12">
        <div class="aspect-[16/8] md:aspect-[21/8] w-full overflow-hidden rounded-2xl shadow-lg-soft border border-border">
            <img src="<?= h((string) $post['cover']) ?>" alt="<?= h((string) $post['title']) ?>" class="h-full w-full object-cover">
        </div>
    </section>
    <section class="container-page pb-16">
        <div class="grid lg:grid-cols-[1fr_280px] gap-12 max-w-6xl mx-auto">
            <article class="article-prose">
                <?php foreach ($post['intro'] as $index => $paragraph): ?>
                    <p class="<?= $index === 0 ? 'text-xl leading-relaxed font-medium text-foreground' : '' ?>"><?= h((string) $paragraph) ?></p>
                <?php endforeach; ?>
                <?php foreach ($post['sections'] as $section): ?>
                    <section>
                        <h2><?= h((string) $section['heading']) ?></h2>
                        <?php foreach ($section['paragraphs'] as $paragraph): ?>
                            <p><?= h((string) $paragraph) ?></p>
                        <?php endforeach; ?>
                    </section>
                <?php endforeach; ?>
                <h2 class="mt-12">Veja os produtos avaliados</h2>
                <div class="not-prose mt-6 space-y-8">
                    <?php foreach ($post['products'] as $index => $product): ?>
                        <?php $detailHref = product_page_path((string) $post['slug'], (string) $product['slug']); ?>
                        <article class="relative rounded-2xl border border-border bg-card p-6 md:p-8 shadow-sm-soft">
                            <span class="absolute -top-4 left-6 grid h-10 w-10 place-items-center rounded-full bg-accent text-accent-foreground font-black text-base shadow-md-soft"><?= h((string) ((int) $index + 1)) ?>º</span>
                            <h3 class="font-display font-bold text-xl md:text-2xl"><a href="<?= h($detailHref) ?>" class="hover:text-accent transition-colors"><?= h((string) $product['name']) ?></a></h3>
                            <p class="text-accent font-black text-2xl mt-2"><?= h((string) $product['price']) ?></p>
                            <a href="<?= h($detailHref) ?>" class="mt-4 inline-flex w-full items-center justify-center rounded-lg bg-gradient-accent px-6 py-3 font-bold text-accent-foreground shadow-md-soft hover:-translate-y-0.5 transition-transform">Ver produto</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </article>
            <aside class="hidden lg:block">
                <div class="sticky top-24 space-y-8">
                    <div class="rounded-xl border border-border bg-card p-5">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-muted-foreground mb-3">Neste artigo</h3>
                        <ul class="space-y-2 text-sm">
                            <?php foreach ($post['sections'] as $section): ?>
                                <li><?= h((string) $section['heading']) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </section>
    <section class="container-page py-12 border-t border-border">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6"><?php foreach ($related as $p) { view('components/post-card.php', ['post' => $p, 'variant' => 'default']); } ?></div>
    </section>
    <?php view('partials/newsletter.php'); ?>
    <?php view('partials/footer.php', compact('categories')); ?>
</div>
<?php view('partials/scripts.php'); ?>
