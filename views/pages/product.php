<?php
/** @var string $title */
/** @var string $requestPath */
/** @var list<string> $categories */
/** @var array<string, mixed> $post */
/** @var array<string, mixed> $product */
/** @var list<array<string, mixed>> $relatedPosts */
$relatedPosts = $relatedPosts ?? [];
$rating = (float) ($product['rating'] ?? 0);
$rounded = (int) round($rating);
$affiliateHref = (string) ($product['affiliateUrl'] ?? '#');
$affiliateIsExternal = str_starts_with($affiliateHref, 'http://') || str_starts_with($affiliateHref, 'https://');

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
                        <a href="<?= h($affiliateHref) ?>" class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-accent px-8 py-3.5 text-sm font-bold !text-white text-white shadow-lg-soft ring-1 ring-black/10 hover:-translate-y-0.5 hover:!text-white hover:no-underline transition-transform"<?= $affiliateIsExternal ? ' target="_blank" rel="noopener noreferrer sponsored"' : '' ?>>Ver oferta</a>
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
        <div class="mx-auto grid max-w-6xl gap-6 lg:grid-cols-[minmax(0,1fr)_minmax(280px,22rem)] lg:items-stretch">
            <div class="aspect-[4/3] min-h-[220px] overflow-hidden rounded-2xl border border-border bg-muted shadow-lg-soft lg:aspect-auto lg:min-h-[360px]">
                <img src="<?= h((string) $product['image']) ?>" alt="<?= h((string) $product['name']) ?>" class="h-full w-full object-cover object-center" width="1200" height="900">
            </div>
            <a id="product-affiliate-card" href="<?= h($affiliateHref) ?>" class="product-affiliate-card group flex flex-col rounded-2xl border-2 border-border bg-card p-6 shadow-md-soft transition-all hover:-translate-y-0.5 hover:border-accent/35 hover:shadow-lg-soft md:p-8 no-underline"<?= $affiliateIsExternal ? ' target="_blank" rel="noopener noreferrer sponsored"' : '' ?> aria-label="Ver oferta: <?= h((string) $product['name']) ?> — abre o parceiro">
                <p class="text-xs font-bold uppercase tracking-wider text-muted-foreground">Preço referência</p>
                <p class="mt-2 font-display text-3xl font-black tracking-tight text-accent md:text-4xl"><?= h((string) $product['price']) ?></p>
                <p class="mt-2 text-xs leading-relaxed text-muted-foreground">Valores podem mudar no varejo — confira no parceiro.</p>
                <?php if (($product['description'] ?? '') !== ''): ?>
                    <p class="mt-5 border-t border-border pt-5 text-sm leading-relaxed text-foreground/85"><?= h((string) $product['description']) ?></p>
                <?php endif; ?>
                <div class="mt-6 flex-1 border-t border-border pt-6">
                    <p class="text-xs font-bold uppercase tracking-wider text-muted-foreground">Características</p>
                    <ul class="mt-3 space-y-2.5">
                        <?php foreach ($product['pros'] as $pro): ?>
                            <li class="flex gap-2.5 text-sm text-foreground/90">
                                <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-success/15 text-xs font-bold text-success" aria-hidden="true">✓</span>
                                <span><?= h((string) $pro) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <p class="mt-8 flex items-center gap-2 text-sm font-bold text-accent group-hover:underline">
                    Ir para a loja parceira
                    <svg class="h-4 w-4 shrink-0 transition-transform group-hover:translate-x-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </p>
            </a>
        </div>
    </section>

    <section class="container-page pb-20">
        <div class="grid max-w-6xl grid-cols-1 items-start gap-12 lg:grid-cols-[1fr_300px] mx-auto">
            <div class="relative z-10 min-w-0 space-y-10">
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

            <aside class="relative z-0 min-w-0 w-full lg:w-auto">
                <div class="lg:sticky lg:top-24">
                    <div class="rounded-2xl bg-primary text-primary-foreground p-6">
                        <span class="eyebrow text-highlight">Contexto</span>
                        <p class="mt-2 text-sm leading-relaxed text-primary-foreground/85">Este produto faz parte do guia <strong class="text-primary-foreground"><?= h((string) $post['title']) ?></strong>.</p>
                    </div>
                </div>
            </aside>
        </div>
    </section>

    <div id="affiliate-float-bar" role="region" aria-label="Atalho para loja parceira" aria-hidden="true">
        <a id="affiliate-float-link" href="<?= h($affiliateHref) ?>" class="inline-flex max-w-[calc(100vw-2rem)] items-center gap-1.5 rounded-full bg-gradient-accent py-1.5 pl-1.5 pr-2.5 text-[11px] font-bold leading-tight text-white shadow-lg-soft ring-1 ring-black/15 no-underline transition-[filter,transform,box-shadow] hover:brightness-105 hover:shadow-md active:scale-[0.97] sm:gap-2 sm:pr-3 sm:text-xs" aria-label="Ir para a loja parceira" title="Ir para a loja parceira"<?= $affiliateIsExternal ? ' target="_blank" rel="noopener noreferrer sponsored"' : '' ?>>
            <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-black/12 text-white sm:h-7 sm:w-7" aria-hidden="true">
                <svg class="h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            </span>
            <span class="whitespace-nowrap pr-0.5 font-semibold tracking-tight">Loja parceira</span>
        </a>
    </div>

    <?php if ($relatedPosts !== []): ?>
        <section class="container-page border-t border-border py-14 md:py-16">
            <h2 class="font-display text-2xl font-black tracking-tight text-foreground md:text-3xl">Artigos relacionados</h2>
            <p class="mt-2 max-w-2xl text-sm text-muted-foreground">Outros reviews e guias que podem interessar quem pesquisa este tipo de equipamento.</p>
            <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3"><?php foreach ($relatedPosts as $rp) {
                view('components/post-card.php', ['post' => $rp, 'variant' => 'default']);
            } ?></div>
        </section>
    <?php endif; ?>

    <?php view('partials/newsletter.php'); ?>
    <?php view('partials/footer.php', compact('categories')); ?>
</div>
<?php view('partials/scripts.php'); ?>
