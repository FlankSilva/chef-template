<?php

declare(strict_types=1);

/**
 * @param array<string, mixed> $data
 */
function view(string $path, array $data = []): void
{
    extract($data, EXTR_SKIP);
    $full = BASE_PATH . '/views/' . ltrim($path, '/');
    if (!is_file($full)) {
        throw new RuntimeException('View não encontrada: ' . $path);
    }
    include $full;
}
