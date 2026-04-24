<?php

declare(strict_types=1);

require __DIR__ . '/app/bootstrap.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$query = $_GET;

if ($requestPath === '/') {
    $feature = $posts[0];
    $popular = array_slice($posts, 1, 3);
    $latest = array_slice($posts, 0, 6);
    $title = 'Achados do Chef — Reviews honestos';
    view('pages/home.php', compact('title', 'requestPath', 'categories', 'feature', 'popular', 'latest'));
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
    view('pages/blog.php', compact('title', 'requestPath', 'categories', 'filtered', 'feature', 'rest', 'active', 'query'));
    exit;
}

if (preg_match('#^/produto/([^/]+)/([^/]+)$#', $requestPath, $prodMatch) === 1) {
    $resolved = get_product_by_slugs($posts, $prodMatch[1], $prodMatch[2]);
    if ($resolved !== null) {
        $post = $resolved['post'];
        $product = $resolved['product'];
        $title = $product['name'] . ' — Achados do Chef';
        $relatedPosts = related_posts_for_product($posts, (string) $post['slug'], (string) $product['category']);
        view('pages/product.php', compact('title', 'requestPath', 'categories', 'post', 'product', 'relatedPosts'));
        exit;
    }
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
        if ($sort === 'price-asc') {
            return $priceA <=> $priceB;
        }
        if ($sort === 'price-desc') {
            return $priceB <=> $priceA;
        }
        return $b['rating'] <=> $a['rating'];
    });
    view('pages/products.php', compact('title', 'requestPath', 'categories', 'list', 'query', 'activeCategory', 'sort'));
    exit;
}

if ($requestPath === '/design-system') {
    $title = 'Design System — Achados do Chef';
    view('pages/design-system.php', compact('title', 'requestPath', 'categories'));
    exit;
}

if (preg_match('#^/blog/([^/]+)$#', $requestPath, $matches) === 1) {
    $slug = $matches[1];
    $post = get_post_by_slug($posts, $slug);
    if ($post !== null) {
        $related = array_values(array_filter($posts, static fn(array $item): bool => $item['slug'] !== $post['slug']));
        $related = array_slice($related, 0, 3);
        $title = $post['title'] . ' — Achados do Chef';
        view('pages/article.php', compact('title', 'categories', 'post', 'related'));
        exit;
    }
}

http_response_code(404);
view('pages/not-found.php', ['title' => '404 — Página não encontrada']);
