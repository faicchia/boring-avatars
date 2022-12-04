<?php

declare(strict_types=1);

namespace Faicchia\BoringAvatars;

class BoringAvatar
{
    private function __construct(
        protected int $size,
        protected string $name,
        protected string $variant,
        protected string $colors,
        protected string $baseUrl
    ) {
    }

    /**
     * Get a new avatar instance.
     *
     * @return BorginAvatar
     */
    public static function make(): BoringAvatar
    {
        return new BoringAvatar(
            size: 40,
            name: '',
            variant: 'marble',
            colors: '',
            baseUrl: 'https://source.boringavatars.com'
        );
    }

    /**
     * The size in pixel of the avatar.
     *
     * @param int $size
     * @return BoringAvatar
     */
    public function size(int $size): BoringAvatar
    {
        $this->size = $size;

        return $this;
    }

    /**
     * The name of the user.
     *
     * @param string $name
     * @return BoringAvatar
     */
    public function name(string $name): BoringAvatar
    {
        $name = implode('+', explode(' ', trim($name)));

        $this->name = $name;

        return $this;
    }

    /**
     * The variant of the avatar.
     * Available options: 'marble', 'beam', 'pixel', 'sunset', 'ring', 'bauhaus'
     *
     * @param string $variant
     * @return BoringAvatar
     */
    public function variant(string $variant): BoringAvatar
    {
        if (! in_array($variant, ['marble', 'beam', 'pixel', 'sunset', 'ring', 'bauhaus'])) {
            $variant = 'marble';
        }

        $this->variant = $variant;

        return $this;
    }

    /**
     * The colors of the avatar.
     *
     * @param string[] $colors
     * @return BoringAvatar
     */
    public function colors(array $colors): BoringAvatar
    {
        $colors = array_map(function (string $color): string {
            $color = strtolower($color);
            if (str_starts_with($color, '#')) {
                return str_replace('#', '', $color);
            }

            return $color;
        }, $colors);

        $this->colors = implode(',', $colors);

        return $this;
    }

    /**
     * The url of the avatar.
     *
     * @return string
     */
    public function url(): string
    {
        $url = "{$this->baseUrl}/{$this->variant}/{$this->size}/{$this->name}";

        if (! empty($this->colors)) {
            $url .= "?colors={$this->colors}";
        }

        return $url;
    }
}
