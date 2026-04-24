<?php
declare(strict_types=1);

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function current_year(): string
{
    return date('Y');
}

const HERO_IMAGE = '/src/assets/hero-kitchen.jpg';
const KNIVES_IMAGE = '/src/assets/post-knives.jpg';
const MIXER_IMAGE = '/src/assets/post-mixer.jpg';
const AIRFRYER_IMAGE = '/src/assets/post-airfryer.jpg';

$categories = ['Facas', 'Eletroportáteis', 'Panelas', 'Cafeteiras', 'Liquidificadores', 'Utensílios'];

$posts = [
    [
        'slug' => 'melhores-facas-de-chef-2025',
        'title' => 'As 5 melhores facas de chef de 2025: o teste definitivo',
        'subtitle' => 'Testamos lâminas premium e custo-benefício para descobrir qual merece um lugar na sua bancada.',
        'category' => 'Facas',
        'cover' => KNIVES_IMAGE,
        'author' => 'Equipe Achados do Chef',
        'date' => '18 Abr 2025',
        'readingTime' => '8 min',
        'excerpt' => 'Comparamos 12 modelos de facas de chef em corte, equilíbrio e durabilidade. Veja quais venceram.',
        'intro' => [
            'A faca de chef é o coração de qualquer cozinha. Investir bem nesse item significa cozinhar com mais prazer e segurança.',
            'Nesta review, testamos 12 modelos populares no Brasil e reunimos as opções que realmente se destacaram.',
        ],
        'sections' => [
            ['heading' => 'Como escolhemos as melhores', 'paragraphs' => ['Cada faca passou por testes padronizados de corte, equilíbrio e retenção de fio.', 'Também avaliamos conforto do cabo e manutenção em casa.']],
            ['heading' => 'O que olhar antes de comprar', 'paragraphs' => ['Material da lâmina, tamanho, tipo de cabo e peso fazem toda a diferença no uso diário.']],
        ],
        'products' => [
            ['name' => 'Tramontina Century 8"', 'price' => 'R$ 489', 'rating' => 4.8, 'pros' => ['Ótima retenção', 'Cabo ergonômico'], 'cons' => ['Mais pesada'], 'affiliateUrl' => '#'],
            ['name' => 'Mundial Premium Forged', 'price' => 'R$ 329', 'rating' => 4.6, 'pros' => ['Bom equilíbrio', 'Ótimo custo-benefício'], 'cons' => ['Fio de fábrica mediano'], 'affiliateUrl' => '#'],
        ],
        'tags' => ['facas', 'chef', 'review'],
    ],
    [
        'slug' => 'batedeira-planetaria-vale-a-pena',
        'title' => 'Batedeira planetária vale a pena? Testamos por 60 dias',
        'subtitle' => 'Da KitchenAid à Mondial: quem realmente entrega o que promete.',
        'category' => 'Eletroportáteis',
        'cover' => MIXER_IMAGE,
        'author' => 'Marina Costa',
        'date' => '12 Abr 2025',
        'readingTime' => '10 min',
        'excerpt' => 'A planetária mudou a forma como assamos pão em casa. Veja quais modelos justificam o investimento.',
        'intro' => ['Para quem gosta de panificação, uma planetária faz diferença real.', 'Testamos seis modelos em receitas reais para entender desempenho no dia a dia.'],
        'sections' => [
            ['heading' => 'O teste prático', 'paragraphs' => ['Avaliamos potência, estabilidade e acabamento em massas leves e pesadas.']],
            ['heading' => 'Quando não compensa', 'paragraphs' => ['Se o uso for raro, uma batedeira comum pode atender melhor.']],
        ],
        'products' => [
            ['name' => 'KitchenAid Artisan 4.8L', 'price' => 'R$ 4.299', 'rating' => 4.9, 'pros' => ['Construção em metal', 'Alta durabilidade'], 'cons' => ['Preço elevado'], 'affiliateUrl' => '#'],
            ['name' => 'Mondial Premium Plus', 'price' => 'R$ 699', 'rating' => 4.3, 'pros' => ['Custo-benefício', 'Boa para uso ocasional'], 'cons' => ['Vibra em massas pesadas'], 'affiliateUrl' => '#'],
        ],
        'tags' => ['batedeira', 'planetária', 'panificação'],
    ],
    [
        'slug' => 'melhores-airfryers-ate-500-reais',
        'title' => 'Melhores airfryers até R$ 500: o ranking de 2025',
        'subtitle' => 'Comparativo entre 8 modelos populares com foco em crocância e consumo.',
        'category' => 'Eletroportáteis',
        'cover' => AIRFRYER_IMAGE,
        'author' => 'Equipe Achados do Chef',
        'date' => '08 Abr 2025',
        'readingTime' => '6 min',
        'excerpt' => 'Airfryer bom não precisa custar caro. Veja modelos de 4L com ótimo desempenho.',
        'intro' => ['A airfryer virou item essencial em muitas cozinhas.', 'Testamos modelos dentro do orçamento de R$ 500.'],
        'sections' => [
            ['heading' => 'Critérios de avaliação', 'paragraphs' => ['Analisamos crocância, consumo, ruído e facilidade de limpeza.']],
            ['heading' => 'O que esperar da faixa', 'paragraphs' => ['Na faixa de entrada, o desempenho costuma surpreender para o uso diário.']],
        ],
        'products' => [
            ['name' => 'Mondial Family AF-31', 'price' => 'R$ 379', 'rating' => 4.5, 'pros' => ['4L de capacidade', 'Painel digital'], 'cons' => ['Manual simples'], 'affiliateUrl' => '#'],
            ['name' => 'Philips Walita Daily', 'price' => 'R$ 499', 'rating' => 4.7, 'pros' => ['Silenciosa', 'Boa uniformidade'], 'cons' => ['Cesta menor'], 'affiliateUrl' => '#'],
        ],
        'tags' => ['airfryer', 'fritadeira', 'barato'],
    ],
];

function get_post_by_slug(array $posts, string $slug): ?array
{
    foreach ($posts as $post) {
        if ($post['slug'] === $slug) {
            return $post;
        }
    }
    return null;
}

function all_products(array $posts): array
{
    $all = [];
    foreach ($posts as $post) {
        foreach ($post['products'] as $product) {
            $product['category'] = $post['category'];
            $product['postSlug'] = $post['slug'];
            $product['image'] = $post['cover'];
            $all[] = $product;
        }
    }
    return $all;
}

function render_head(string $title): void
{
    ?>
    <!doctype html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= h($title) ?></title>
        <meta name="description" content="Reviews, comparativos e guias de compra dos melhores produtos para cozinha.">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/src/tailwind.css" />
    </head>
    <body>
    <?php
}

function render_header(string $path, array $categories): void
{
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
    <?php
}

function render_newsletter(): void
{
    ?>
    <section class="container-page my-20">
        <div class="relative overflow-hidden rounded-3xl bg-primary text-primary-foreground p-8 md:p-14">
            <div class="relative grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="eyebrow text-highlight">Newsletter</span>
                    <h2 class="mt-3 font-display font-black text-3xl md:text-4xl leading-tight">Os melhores achados, direto no seu e-mail.</h2>
                    <p class="mt-3 text-primary-foreground/75 max-w-md">Reviews novos, ofertas reais e cupons exclusivos toda semana. Sem spam.</p>
                </div>
                <form class="flex flex-col sm:flex-row gap-3" onsubmit="event.preventDefault(); alert('Inscrição confirmada!'); this.reset();">
                    <input type="email" required placeholder="seu@email.com" class="flex-1 rounded-lg bg-primary-foreground/10 border border-primary-foreground/20 px-4 py-3 text-primary-foreground placeholder:text-primary-foreground/50 focus:outline-none focus:border-accent transition-colors" />
                    <button type="submit" class="rounded-lg bg-gradient-accent px-6 py-3 font-bold text-accent-foreground shadow-lg-soft hover:-translate-y-0.5 transition-transform">Inscrever</button>
                </form>
            </div>
        </div>
    </section>
    <?php
}

function render_footer(array $categories): void
{
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
    <script src="/public/app.js"></script>
    </body>
    </html>
    <?php
}

function post_card(array $post, string $variant = 'default'): void
{
    if ($variant === 'compact') {
        ?>
        <a href="/blog/<?= h($post['slug']) ?>" class="group flex gap-4 items-start">
            <div class="h-20 w-28 flex-shrink-0 overflow-hidden rounded-lg bg-muted"><img src="<?= h($post['cover']) ?>" alt="<?= h($post['title']) ?>" class="h-full w-full object-cover"></div>
            <div class="flex-1 min-w-0">
                <span class="text-[10px] uppercase tracking-wider font-bold text-accent"><?= h($post['category']) ?></span>
                <h3 class="mt-1 font-display font-bold text-sm leading-snug line-clamp-3 group-hover:text-accent transition-colors"><?= h($post['title']) ?></h3>
            </div>
        </a>
        <?php
        return;
    }
    if ($variant === 'feature') {
        ?>
        <a href="/blog/<?= h($post['slug']) ?>" class="group relative block overflow-hidden rounded-2xl bg-primary text-primary-foreground shadow-lg-soft">
            <div class="aspect-[16/10] md:aspect-[16/9] overflow-hidden"><img src="<?= h($post['cover']) ?>" alt="<?= h($post['title']) ?>" class="h-full w-full object-cover"></div>
            <div class="absolute inset-0 bg-gradient-fade"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10">
                <span class="eyebrow text-accent-foreground/90 mb-3 bg-accent px-3 py-1 rounded-full"><?= h($post['category']) ?></span>
                <h2 class="mt-3 font-display font-black text-2xl md:text-4xl leading-[1.1] max-w-3xl"><?= h($post['title']) ?></h2>
                <p class="mt-3 max-w-2xl text-sm md:text-base text-primary-foreground/85"><?= h($post['subtitle']) ?></p>
            </div>
        </a>
        <?php
        return;
    }
    ?>
    <a href="/blog/<?= h($post['slug']) ?>" class="group flex flex-col overflow-hidden rounded-xl bg-card shadow-sm-soft hover:shadow-md-soft transition-all duration-300 hover:-translate-y-1">
        <div class="aspect-[4/3] overflow-hidden bg-muted"><img src="<?= h($post['cover']) ?>" alt="<?= h($post['title']) ?>" class="h-full w-full object-cover"></div>
        <div class="flex flex-1 flex-col p-5">
            <span class="eyebrow"><?= h($post['category']) ?></span>
            <h3 class="mt-3 font-display font-bold text-lg leading-tight line-clamp-3 group-hover:text-accent transition-colors"><?= h($post['title']) ?></h3>
            <p class="mt-2 text-sm text-muted-foreground line-clamp-2"><?= h($post['excerpt']) ?></p>
        </div>
    </a>
    <?php
}

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$query = $_GET;
$title = 'Achados do Chef';
$statusCode = 200;

if ($requestPath === '/') {
    $feature = $posts[0];
    $popular = array_slice($posts, 1, 3);
    $latest = array_slice($posts, 0, 6);
    $title = 'Achados do Chef — Reviews honestos';
    render_head($title);
    render_header($requestPath, $categories);
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
                        <a href="/blog/<?= h($feature['slug']) ?>" class="inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 px-7 py-3.5 font-semibold text-primary-foreground">Ver review em destaque</a>
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
                <div class="lg:col-span-2"><?php post_card($feature, 'feature'); ?></div>
                <aside><div class="space-y-5"><?php foreach ($popular as $p) { post_card($p, 'compact'); } ?></div></aside>
            </div>
        </section>
        <section class="container-page py-10">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6"><?php foreach ($latest as $p) { post_card($p); } ?></div>
        </section>
        <?php render_newsletter(); ?>
        <?php render_footer($categories); ?>
    </div>
    <?php
    exit;
}

if ($requestPath === '/blog') {
    $title = 'Blog — Achados do Chef';
    $active = isset($query['cat']) ? (string) $query['cat'] : '';
    $text = isset($query['q']) ? mb_strtolower(trim((string) $query['q'])) : '';
    $filtered = array_values(array_filter($posts, static function (array $post) use ($active, $text): bool {
        $okCategory = $active === '' || $post['category'] === $active;
        if ($text === '') {
            return $okCategory;
        }
        $hay = mb_strtolower($post['title'] . ' ' . $post['excerpt'] . ' ' . implode(' ', $post['tags']));
        return $okCategory && str_contains($hay, $text);
    }));
    $feature = $filtered[0] ?? null;
    $rest = array_slice($filtered, 1);
    render_head($title);
    render_header($requestPath, $categories);
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
                <div class="mb-12"><?php post_card($feature, 'feature'); ?></div>
            <?php endif; ?>
            <?php if (count($rest) > 0): ?>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6"><?php foreach ($rest as $p) { post_card($p); } ?></div>
            <?php endif; ?>
        </section>
        <?php render_newsletter(); ?>
        <?php render_footer($categories); ?>
    </div>
    <?php
    exit;
}

if ($requestPath === '/produtos') {
    $title = 'Produtos — Achados do Chef';
    $list = all_products($posts);
    $search = mb_strtolower(trim((string) ($query['q'] ?? '')));
    $activeCategory = (string) ($query['cat'] ?? 'Todos');
    $sort = (string) ($query['sort'] ?? 'rating');
    $list = array_values(array_filter($list, static function (array $product) use ($search, $activeCategory): bool {
        $matchesName = $search === '' || str_contains(mb_strtolower($product['name']), $search);
        $matchesCat = $activeCategory === 'Todos' || $product['category'] === $activeCategory;
        return $matchesName && $matchesCat;
    }));
    usort($list, static function (array $a, array $b) use ($sort): int {
        $priceA = (float) preg_replace('/[^\d,]/', '', str_replace('.', '', $a['price']));
        $priceB = (float) preg_replace('/[^\d,]/', '', str_replace('.', '', $b['price']));
        if ($sort === 'price-asc') return $priceA <=> $priceB;
        if ($sort === 'price-desc') return $priceB <=> $priceA;
        return $b['rating'] <=> $a['rating'];
    });
    render_head($title);
    render_header($requestPath, $categories);
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
                    <article class="group flex flex-col rounded-2xl border border-border bg-card overflow-hidden shadow-sm-soft hover:shadow-lg-soft hover:-translate-y-1 transition-all">
                        <a href="/blog/<?= h($product['postSlug']) ?>" class="block aspect-[4/3] overflow-hidden bg-muted"><img src="<?= h($product['image']) ?>" alt="<?= h($product['name']) ?>" class="h-full w-full object-cover"></a>
                        <div class="p-5 flex flex-col flex-1">
                            <span class="eyebrow text-xs"><?= h($product['category']) ?></span>
                            <h3 class="mt-2 font-display font-bold text-lg leading-tight"><?= h($product['name']) ?></h3>
                            <p class="mt-3 text-accent font-black text-xl"><?= h($product['price']) ?></p>
                            <a href="<?= h($product['affiliateUrl']) ?>" class="mt-auto rounded-full bg-gradient-accent px-4 py-2 text-xs text-center font-bold text-accent-foreground">Ver oferta</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
        <?php render_newsletter(); ?>
        <?php render_footer($categories); ?>
    </div>
    <?php
    exit;
}

if ($requestPath === '/design-system') {
    $title = 'Design System — Achados do Chef';
    render_head($title);
    render_header($requestPath, $categories);
    ?>
    <div class="min-h-screen flex flex-col">
        <section class="relative bg-primary text-primary-foreground overflow-hidden">
            <div class="container-page py-16 md:py-20">
                <span class="eyebrow text-highlight">Documentação</span>
                <h1 class="mt-3 font-display font-black text-4xl md:text-5xl tracking-tight">Design System — Achados do Chef</h1>
            </div>
        </section>
        <div class="container-page py-12 space-y-10">
            <section>
                <span class="eyebrow">Cores</span>
                <h2 class="mt-2 font-display font-black text-3xl mb-2">Paleta semântica</h2>
                <p class="text-muted-foreground">Tokens em HSL no `index.css` + Tailwind.</p>
            </section>
            <section class="rounded-2xl border border-border bg-card p-8">
                <h3 class="font-display font-black text-2xl">Tipografia Montserrat</h3>
                <p class="mt-3 text-muted-foreground">Mantida exatamente como no projeto original.</p>
            </section>
        </div>
        <?php render_footer($categories); ?>
    </div>
    <?php
    exit;
}

if (preg_match('#^/blog/([^/]+)$#', $requestPath, $matches) === 1) {
    $slug = $matches[1];
    $post = get_post_by_slug($posts, $slug);
    if ($post !== null) {
        $related = array_values(array_filter($posts, static fn(array $item): bool => $item['slug'] !== $post['slug']));
        $related = array_slice($related, 0, 3);
        $title = $post['title'] . ' — Achados do Chef';
        render_head($title);
        render_header('/blog', $categories);
        ?>
        <div class="min-h-screen flex flex-col">
            <div class="border-b border-border bg-surface">
                <div class="container-page py-3 flex flex-wrap items-center gap-2 text-xs text-muted-foreground">
                    <a href="/" class="hover:text-accent transition-colors">Home</a><span>›</span>
                    <a href="/blog" class="hover:text-accent transition-colors">Blog</a><span>›</span>
                    <a href="/blog?cat=<?= urlencode($post['category']) ?>" class="hover:text-accent transition-colors"><?= h($post['category']) ?></a><span>›</span>
                    <span class="text-foreground/80 truncate max-w-[min(100%,28rem)]"><?= h($post['title']) ?></span>
                </div>
            </div>
            <section class="relative overflow-hidden bg-primary text-primary-foreground">
                <div class="absolute inset-0 opacity-25">
                    <img src="<?= h($post['cover']) ?>" alt="" class="h-full w-full object-cover" aria-hidden="true">
                </div>
                <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/85 to-primary/40"></div>
                <div class="container-page relative py-16 md:py-24 lg:py-28">
                    <div class="max-w-4xl">
                        <a href="/blog" class="inline-flex items-center gap-2 text-sm font-semibold text-primary-foreground/80 hover:text-accent transition-colors mb-6">← Voltar ao blog</a>
                        <span class="eyebrow text-highlight"><?= h($post['category']) ?></span>
                        <h1 class="mt-4 font-display font-black text-3xl sm:text-4xl md:text-5xl lg:text-6xl leading-[1.05] tracking-tight"><?= h($post['title']) ?></h1>
                        <p class="mt-5 text-lg md:text-xl text-primary-foreground/85 leading-relaxed max-w-3xl"><?= h($post['subtitle']) ?></p>
                        <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-primary-foreground/75 border-t border-primary-foreground/15 pt-5">
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-accent shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                <?= h($post['author']) ?>
                            </span>
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-accent shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="18" x="3" y="4" rx="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                <?= h($post['date']) ?>
                            </span>
                            <span class="flex items-center gap-2">
                                <svg class="h-4 w-4 text-accent shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <?= h($post['readingTime']) ?> de leitura
                            </span>
                            <button type="button" class="share-article-btn ml-auto inline-flex items-center gap-2 rounded-full border border-primary-foreground/30 px-4 py-2 text-xs font-semibold hover:border-accent hover:text-accent transition-colors" data-share-title="<?= h($post['title']) ?>">
                                <svg class="h-3.5 w-3.5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" x2="15.41" y1="13.51" y2="17.49"/><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"/></svg>
                                Compartilhar
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container-page -mt-8 md:-mt-12 relative z-10 mb-12">
                <div class="aspect-[16/8] md:aspect-[21/8] w-full overflow-hidden rounded-2xl shadow-lg-soft border border-border">
                    <img src="<?= h($post['cover']) ?>" alt="<?= h($post['title']) ?>" class="h-full w-full object-cover">
                </div>
            </section>
            <section class="container-page pb-16">
                <div class="grid lg:grid-cols-[1fr_280px] gap-12 max-w-6xl mx-auto">
                    <article class="article-prose">
                        <?php foreach ($post['intro'] as $index => $paragraph): ?>
                            <p class="<?= $index === 0 ? 'text-xl leading-relaxed font-medium text-foreground' : '' ?>"><?= h($paragraph) ?></p>
                        <?php endforeach; ?>
                        <?php foreach ($post['sections'] as $section): ?>
                            <section>
                                <h2><?= h($section['heading']) ?></h2>
                                <?php foreach ($section['paragraphs'] as $paragraph): ?>
                                    <p><?= h($paragraph) ?></p>
                                <?php endforeach; ?>
                            </section>
                        <?php endforeach; ?>
                        <h2 class="mt-12">Veja os produtos avaliados</h2>
                        <div class="not-prose mt-6 space-y-8">
                            <?php foreach ($post['products'] as $index => $product): ?>
                                <article class="relative rounded-2xl border border-border bg-card p-6 md:p-8 shadow-sm-soft">
                                    <span class="absolute -top-4 left-6 grid h-10 w-10 place-items-center rounded-full bg-accent text-accent-foreground font-black text-base shadow-md-soft"><?= h((string) ($index + 1)) ?>º</span>
                                    <h3 class="font-display font-bold text-xl md:text-2xl"><?= h($product['name']) ?></h3>
                                    <p class="text-accent font-black text-2xl mt-2"><?= h($product['price']) ?></p>
                                    <a href="<?= h($product['affiliateUrl']) ?>" class="inline-flex mt-4 w-full items-center justify-center rounded-lg bg-gradient-accent px-6 py-3 font-bold text-accent-foreground">Ver oferta</a>
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
                                        <li><?= h($section['heading']) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
            <section class="container-page py-12 border-t border-border">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6"><?php foreach ($related as $p) { post_card($p); } ?></div>
            </section>
            <?php render_newsletter(); ?>
            <?php render_footer($categories); ?>
        </div>
        <?php
        exit;
    }
}

$statusCode = 404;
http_response_code($statusCode);
render_head('404 — Página não encontrada');
?>
<div class="flex min-h-screen items-center justify-center bg-muted">
    <div class="text-center">
        <h1 class="mb-4 text-4xl font-bold">404</h1>
        <p class="mb-4 text-xl text-muted-foreground">Ops! Página não encontrada.</p>
        <a href="/" class="text-primary underline hover:text-primary/90">Voltar para Home</a>
    </div>
</div>
</body>
</html>
