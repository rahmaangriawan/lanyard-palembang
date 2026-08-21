@props(['name'])

<svg
  {{ $attributes->merge(['class' => 'home-portfolio__tile-icon']) }}
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="1.8"
  stroke-linecap="round"
  stroke-linejoin="round"
  aria-hidden="true"
  focusable="false"
>
  @switch($name)
    @case('business')
      <path d="M4 21V5.5A1.5 1.5 0 0 1 5.5 4h8A1.5 1.5 0 0 1 15 5.5V21" />
      <path d="M15 9h3.5A1.5 1.5 0 0 1 20 10.5V21" />
      <path d="M8 8h3M8 12h3M8 16h3M17 13h.01M17 17h.01M3 21h18" />
      @break

    @case('school')
      <path d="m3 10 9-5 9 5-9 5-9-5Z" />
      <path d="M7 12.2V16c2.7 2 7.3 2 10 0v-3.8M21 10v5" />
      @break

    @case('location_city')
      <path d="M3 21V9l6-4v16M9 21V3l6 3v15M15 21v-9l6 2v7M2 21h20" />
      <path d="M6 12h.01M6 16h.01M12 9h.01M12 13h.01M18 16h.01" />
      @break

    @case('event')
      <rect x="3" y="5" width="18" height="16" rx="2" />
      <path d="M7 3v4M17 3v4M3 10h18M8 14h3M8 17h3M14 14h3M14 17h3" />
      @break

    @default
      <path d="M12 3a9 9 0 1 0 9 9c0-1-.8-1.8-1.8-1.8h-1.1a1.8 1.8 0 0 1-1.8-1.8c0-1 .8-1.8 1.8-1.8H19A9 9 0 0 0 12 3Z" />
      <path d="M7.5 11.5h.01M9.5 7.5h.01M13.5 6.5h.01M7.5 15.5h.01" />
  @endswitch
</svg>
