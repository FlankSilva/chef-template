<?php

declare(strict_types=1);

const HERO_IMAGE = '/src/assets/hero-kitchen.jpg';
const KNIVES_IMAGE = '/src/assets/post-knives.jpg';
const MIXER_IMAGE = '/src/assets/post-mixer.jpg';
const AIRFRYER_IMAGE = '/src/assets/post-airfryer.jpg';

/** @var list<string> */
$categories = ['Facas', 'Eletroportáteis', 'Panelas', 'Cafeteiras', 'Liquidificadores', 'Utensílios'];

/** @var list<array<string, mixed>> */
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
            [
                'slug' => 'tramontina-century-8',
                'name' => 'Tramontina Century 8"',
                'price' => 'R$ 489',
                'rating' => 4.8,
                'pros' => ['Ótima retenção', 'Cabo ergonômico'],
                'cons' => ['Mais pesada'],
                'affiliateUrl' => '#',
                'description' => 'Faca de chef com aço de alto carbono e cabo ergonômico. Equilíbrio sólido para quem cozinha todos os dias e quer um fio que dura entre afiações.',
            ],
            [
                'slug' => 'mundial-premium-forged',
                'name' => 'Mundial Premium Forged',
                'price' => 'R$ 329',
                'rating' => 4.6,
                'pros' => ['Bom equilíbrio', 'Ótimo custo-benefício'],
                'cons' => ['Fio de fábrica mediano'],
                'affiliateUrl' => '#',
                'description' => 'Entrada excelente para quem está montando a bancada. Leve na mão e com bom custo-benefício para o dia a dia.',
            ],
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
            [
                'slug' => 'kitchenaid-artisan-48l',
                'name' => 'KitchenAid Artisan 4.8L',
                'price' => 'R$ 4.299',
                'rating' => 4.9,
                'pros' => ['Construção em metal', 'Alta durabilidade'],
                'cons' => ['Preço elevado'],
                'affiliateUrl' => '#',
                'description' => 'Referência em planetárias domésticas: motor robusto, acabamento premium e compatibilidade com acessórios. Ideal para quem assa com frequência.',
            ],
            [
                'slug' => 'mondial-premium-plus',
                'name' => 'Mondial Premium Plus',
                'price' => 'R$ 699',
                'rating' => 4.3,
                'pros' => ['Custo-benefício', 'Boa para uso ocasional'],
                'cons' => ['Vibra em massas pesadas'],
                'affiliateUrl' => '#',
                'description' => 'Opção acessível para receitas leves e uso moderado. Para massas muito pesadas, espere mais vibração na bancada.',
            ],
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
            [
                'slug' => 'mondial-family-af-31',
                'name' => 'Mondial Family AF-31',
                'price' => 'R$ 379',
                'rating' => 4.5,
                'pros' => ['4L de capacidade', 'Painel digital'],
                'cons' => ['Manual simples'],
                'affiliateUrl' => '#',
                'description' => 'Airfryer com boa capacidade para família e painel digital intuitivo. Performance sólida na faixa de até R$ 500.',
            ],
            [
                'slug' => 'philips-walita-daily',
                'name' => 'Philips Walita Daily',
                'price' => 'R$ 499',
                'rating' => 4.7,
                'pros' => ['Silenciosa', 'Boa uniformidade'],
                'cons' => ['Cesta menor'],
                'affiliateUrl' => '#',
                'description' => 'Tecnologia Rapid Air com operação silenciosa e resultado uniforme em porções menores.',
            ],
        ],
        'tags' => ['airfryer', 'fritadeira', 'barato'],
    ],
];

/**
 * @param list<array<string, mixed>> $posts
 * @return array<string, mixed>|null
 */
function get_post_by_slug(array $posts, string $slug): ?array
{
    foreach ($posts as $post) {
        if (($post['slug'] ?? '') === $slug) {
            return $post;
        }
    }
    return null;
}

/**
 * @param list<array<string, mixed>> $posts
 * @return list<array<string, mixed>>
 */
function all_products(array $posts): array
{
    $all = [];
    foreach ($posts as $postRow) {
        foreach ($postRow['products'] as $product) {
            $product['category'] = $postRow['category'];
            $product['postSlug'] = $postRow['slug'];
            $product['image'] = $product['image'] ?? $postRow['cover'];
            $all[] = $product;
        }
    }
    return $all;
}

/**
 * @param list<array<string, mixed>> $posts
 * @return array{post: array<string, mixed>, product: array<string, mixed>}|null
 */
function get_product_by_slugs(array $posts, string $postSlug, string $productSlug): ?array
{
    $post = get_post_by_slug($posts, $postSlug);
    if ($post === null) {
        return null;
    }
    foreach ($post['products'] as $product) {
        if (($product['slug'] ?? '') === $productSlug) {
            $product['category'] = $post['category'];
            $product['postSlug'] = $post['slug'];
            $product['image'] = $product['image'] ?? $post['cover'];
            return ['post' => $post, 'product' => $product];
        }
    }
    return null;
}

function product_page_path(string $postSlug, string $productSlug): string
{
    return '/produto/' . rawurlencode($postSlug) . '/' . rawurlencode($productSlug);
}
