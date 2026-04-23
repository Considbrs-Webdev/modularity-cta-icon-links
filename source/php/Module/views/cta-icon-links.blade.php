@if (!$hideTitle && $postTitle)
    @typography([
        'element' => 'h4',
        'variant' => 'h2',
        'classList' => ['module-title'],
    ])
        {{ $postTitle }}
    @endtypography
@endif

@if (!empty($items))
    <div class="mod-cta-icon-links">
        <div
            class="mod-cta-icon-links__grid mod-cta-icon-links__grid--{{ $columns }}"
            role="list"
            @if (!empty($postTitle)) aria-label="{{ esc_attr($postTitle) }}" @endif
        >
            @foreach ($items as $item)
                <div class="mod-cta-icon-links__item" role="listitem">
                    <a
                        class="mod-cta-icon-links__card"
                        href="{{ esc_url($item['url']) }}"
                        @if ($item['target'] && $item['target'] !== '_self') target="{{ esc_attr($item['target']) }}"
                        @endif
                        @if (!empty($item['rel'])) rel="{{ esc_attr($item['rel']) }}"
                        @endif
                        style="--cta-card-bg: {{ esc_attr($item['backgroundColor']) }}; --cta-card-color: {{ esc_attr($item['textColor']) }};"
                    >
                        @if (!empty($item['icon']))
                            <span
                                class="mod-cta-icon-links__icon-wrap"
                                aria-hidden="true"
                            >
                                @icon([
                                    'icon' => $item['icon'],
                                    'size' => 'lg',
                                    'classList' => ['mod-cta-icon-links__icon'],
                                ])
                                @endicon
                            </span>
                        @endif
                        <span
                            class="mod-cta-icon-links__text"
                        >{{ $item['label'] }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif
