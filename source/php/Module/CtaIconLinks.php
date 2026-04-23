<?php

declare(strict_types=1);

namespace ModularityCtaIconLinks\Module;

/**
 * CTA-style full-width icon + link text cards in a responsive grid.
 */
class CtaIconLinks extends \Modularity\Module
{
    public $slug = 'cta-icon-links';

    public $supports = [];

    public function init(): void
    {
        $this->nameSingular = __('CTA icon links', 'modularity-cta-icon-links');
        $this->namePlural   = __('CTA icon links', 'modularity-cta-icon-links');
        $this->description  = __('A grid of icon link cards with custom background colours.', 'modularity-cta-icon-links');
    }

    /**
     * @return array<string, mixed>
     */
    public function data(): array
    {
        $data = $this->getFields();

        $data['items']   = $this->prepareItems($data['items'] ?? []);
        $data['columns'] = $this->normalizeColumns($data['columns'] ?? 2);

        return $data;
    }

    /**
     * @param array<int, array<string, mixed>> $items
     * @return list<array{label: string, url: string, target: string, icon: string, backgroundColor: string, rel: string}>
     */
    private function prepareItems(array $items): array
    {
        if ($items === []) {
            return [];
        }

        $out = [];

        foreach ($items as $row) {
            $link = $row['link'] ?? [];
            if (! is_array($link)) {
                $link = [];
            }

            $url = isset($link['url']) ? (string) $link['url'] : '';
            if ($url === '') {
                continue;
            }

            $target = isset($link['target']) && $link['target'] !== ''
                ? (string) $link['target']
                : '_self';

            $label = isset($row['label']) ? (string) $row['label'] : '';
            if ($label === '') {
                continue;
            }

            $bg = isset($row['background']) ? (string) $row['background'] : '';
            if ($bg === '') {
                $bg = '#f5f0e8';
            }
            $bg = $this->ensureHash($bg);

            $out[] = [
                'label'            => $label,
                'url'              => $url,
                'target'           => $target,
                'icon'             => isset($row['icon']) ? (string) $row['icon'] : '',
                'backgroundColor'  => $bg,
                'rel'              => $target === '_blank' ? 'noopener noreferrer' : '',
            ];
        }

        return $out;
    }

    private function normalizeColumns(int|string $columns): string
    {
        $c = (string) $columns;
        if (in_array($c, ['1', '2', '3', '4'], true)) {
            return $c;
        }
        return '2';
    }

    private function ensureHash(string $color): string
    {
        $color = trim($color);
        if ($color !== '' && $color[0] !== '#') {
            return '#' . $color;
        }
        return $color;
    }

    public function template(): string
    {
        return 'cta-icon-links.blade.php';
    }
}
