<?php

namespace Marcionunes\Conship;

use JsonSerializable;

class Conship implements JsonSerializable
{
    protected $folder;

    public function __construct($folder = null)
    {
        $this->folder = $this->configurations($folder);
    }

    private function configurations($folder)
    {
        if ($folder)
            return $this->folder;

        if (config()->has('conship.folder'))
            return config('conship.folder');
    }

    /**
     * Convert this Ziggy instance to an array.
     */
    public function toArray(): array
    {
        return [
            'file' => $this->folder,
        ];
    }

    /**
     * Convert this instance into something JSON serializable.
     */
    public function jsonSerialize(): array
    {
        return array_merge($consts = $this->toArray(), [
            'defaults' => (object) $consts['defaults'],
        ]);
    }
}
