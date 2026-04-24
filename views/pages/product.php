<?php
/** @var string $title */
/** @var string $requestPath */
/** @var list<string> $categories */
/** @var array<string, mixed> $post */
/** @var array<string, mixed> $product */
$rating = (float) ($product['rating'] ?? 0);
$rounded = (int) round($rating);

view('partials/head.php', compact('title'));
view('partials/header.php', ['path' => $requestPath, 'categories' => $categories]);
?>
<div class="min-h-screen flex flex-col">
    <div class="border-b border-border bg-surface">
        <div class="container-page py-3 flex flex-wrap items-center gap-2 text-xs text-muted-foreground">
            <a href="/" class="hover:text-accent transition-colors">Home</a><span>›</span>
            <a href="/produtos" class="hover:text-accent transition-colors">Produtos</a><span>›</span>
            <a href="/blog?cat=<?= urlencode((string) $product['category']) ?>" class="hover:text-accent transition-colors"><?= h((string) $product['category']) ?></a><span>›</span>
            <span class="text-foreground/80 truncate max-w-[min(100%,20rem)]"><?= h((string) $product['name']) ?></span>
        </div>
    </div>

    <section class="relative overflow-hidden bg-primary text-primary-foreground">
        <div class="absolute inset-0 opacity-20">
            <img src="<?= h((string) $product['image']) ?>" alt="" class="h-full w-full object-cover" aria-hidden="true">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/90 to-primary/50"></div>
        <div class="container-page relative py-14 md:py-20 lg:py-24">
            <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-end max-w-6xl">
                <div class="max-w-3xl">
                    <span class="eyebrow text-highlight">Ficha do produto</span>
                    <p class="mt-2 text-xs font-semibold uppercase tracking-wider text-primary-foreground/60"><?= h((string) $product['category']) ?></p>
                    <h1 class="mt-3 font-display font-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-[1.05] tracking-tight"><?= h((string) $product['name']) ?></h1>
                    <div class="mt-6 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-primary-foreground/80 border-t border-primary-foreground/15 pt-5">
                        <div class="flex items-center gap-1.5" aria-label="Nota <?= h((string) $rating) ?>">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="text-lg <?= $i <= $rounded ? 'text-highlight' : 'text-primary-foreground/25' ?>" aria-hidden="true">★</span>
                            <?php endfor; ?>
                            <span class="ml-2 font-bold text-primary-foreground"><?= h(number_format($rating, 1, ',', '')) ?></span>
                        </div>
                        <span class="rounded-full bg-primary-foreground/10 px-3 py-1 text-xs font-bold"><?= h((string) $product['price']) ?></span>
                    </div>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="<?= h((string) $product['affiliateUrl']) ?>" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-accent px-8 py-3.5 text-sm font-bold text-accent-foreground shadow-lg-soft hover:-translate-y-0.5 transition-transform">Ver oferta</a>
                        <a href="/blog/<?= h((string) $post['slug']) ?>" class="inline-flex items-center justify-center gap-2 rounded-full border border-primary-foreground/30 px-8 py-3.5 text-sm font-semibold text-primary-foreground hover:bg-primary-foreground/10 transition-colors">Ver review completa</a>
                        <button type="button" class="share-article-btn inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 px-6 py-3.5 text-sm font-semibold hover:border-accent hover:text-accent transition-colors" data-share-title="<?= h((string) $product['name']) ?>">
                            Compartilhar
                        </button>
                    </div>
                </div>
                <div class="hidden lg:block w-full max-w-sm">
                    <div class="rounded-2xl border-2 border-primary-foreground/20 bg-primary-foreground/5 p-6 backdrop-blur-sm">
                        <p class="text-xs font-bold uppercase tracking-wider text-highlight">Resumo</p>
                        <p class="mt-2 text-sm leading-relaxed text-primary-foreground/90"><?= h((string) ($product['description'] ?? '')) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-page -mt-6 md:-mt-10 relative z-10 mb-12">
        <div class="grid gap-6 lg:grid-cols-2 max-w-6xl mx-auto items-start">
            <div class="aspect-[4/3] overflow-hidden rounded-2xl border border-border bg-muted shadow-lg-soft">
                <img src="<?= h((string) $product['image']) ?>" alt="<?= h((string) $product['name']) ?>" class="h-full w-full object-cover" width="1200" height="900">
            </div>
            <div class="lg:hidden rounded-2xl border border-border bg-card p-6 shadow-sm-soft">
                <p class="text-xs font-bold uppercase tracking-wider text-muted-foreground">Resumo</p>
                <p class="mt-2 text-sm text-foreground/90 leading-relaxed"><?= h((string) ($product['description'] ?? '')) ?></p>
            </div>
        </div>
    </section>

    <section class="container-page pb-20">
        <div class="grid lg:grid-cols-[1fr_300px] gap-12 max-w-6xl mx-auto">
            <div class="space-y-10">
                <article class="article-prose max-w-none">
                    <h2 class="not-prose font-display font-black text-2xl md:text-3xl">Nossa análise</h2>
                    <p><?= h((string) ($product['description'] ?? '')) ?> Resultado integrado ao comparativo <strong><?= h((string) $post['title']) ?></strong>.</p>
                </article>

                <div class="grid gap-6 md:grid-cols-2 not-prose">
                    <div class="rounded-2xl border border-border bg-card p-6 md:p-8 shadow-sm-soft">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-success mb-4">Pontos fortes</h3>
                        <ul class="space-y-3">
                            <?php foreach ($product['pros'] as $pro): ?>
                                <li class="flex gap-3 text-sm">
                                    <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-success/15 text-success font-bold text-xs">✓</span>
                                    <span><?= h((string) $pro) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="rounded-2xl border border-border bg-card p-6 md:p-8 shadow-sm-soft">
                        <h3 class="text-xs font-bold uppercase tracking-wider text-destructive mb-4">Pontos de atenção</h3>
                        <ul class="space-y-3">
                            <?php foreach ($product['cons'] as $con): ?>
                                <li class="flex gap-3 text-sm">
                                    <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-destructive/10 text-destructive font-bold text-xs">!</span>
                                    <span><?= h((string) $con) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="not-prose rounded-2xl border-2 border-accent/20 bg-secondary p-6 md:p-8">
                    <span class="eyebrow">Design system</span>
                    <h3 class="mt-2 font-display font-black text-xl">Tokens em uso nesta tela</h3>
                    <p class="mt-2 text-sm text-muted-foreground max-w-2xl">Cores semânticas (<code class="font-mono text-xs">primary</code>, <code class="font-mono text-xs">accent</code>, <code class="font-mono text-xs">highlight</code>, <code class="font-mono text-xs">success</code>, <code class="font-mono text-xs">destructive</code>), cards com <code class="font-mono text-xs">rounded-2xl</code> e sombras <code class="font-mono text-xs">shadow-*-soft</code> — alinhado à documentação em <a href="/design-system" class="font-bold text-accent underline-offset-4 hover:underline">/design-system</a>.</p>
                </div>
            </div>

            <aside class="space-y-6">
                <div class="rounded-2xl border border-border bg-card p-6 shadow-sm-soft lg:sticky lg:top-24">
                    <p class="text-xs uppercase tracking-wider font-bold text-muted-foreground">Preço exibido</p>
                    <p class="mt-2 font-display font-black text-3xl text-accent"><?= h((string) $product['price']) ?></p>
                    <p class="mt-2 text-xs text-muted-foreground">Valores podem mudar no varejo — confira no parceiro.</p>
                    <a href="/blog/<?= h((string) $post['slug']) ?>" class="mt-6 block text-center text-sm font-semibold text-muted-foreground hover:text-accent transition-colors">Ler review no blog →</a>
                </div>
                <div class="rounded-2xl bg-primary text-primary-foreground p-6">
                    <span class="eyebrow text-highlight">Contexto</span>
                    <p class="mt-2 text-sm leading-relaxed text-primary-foreground/85">Este produto faz parte do guia <strong class="text-primary-foreground"><?= h((string) $post['title']) ?></strong>.</p>
                </div>
            </aside>
        </div>
    </section>

    <?php view('partials/newsletter.php'); ?>
    <?php view('partials/footer.php', compact('categories')); ?>
</div>
<?php view('partials/scripts.php'); ?>
