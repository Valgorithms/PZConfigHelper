<?php

/*
 * This file is a part of the PZConfigHelper project.
 *
 * Copyright (c) 2024-present Valithor Obsidion <valithor@valzargaming.com>
 */

namespace PZConfigHelper;

trait PZConfigHelperTrait
{
    private string $mods = '';
    private string $ids = '';
    private string $both = '';

    public function __construct(private string $path = __DIR__) {
        $this->generateModLists();
    }

    public function generateModLists(?string $directory = null, bool $isRootDirectory = true): void
    {
        $directory = $directory ?? $this->path;

        foreach (scandir($directory) as $file) {
            if ($file === '.' || $file === '..') continue;
            if (!is_dir($filePath = $directory . '/' . $file)) continue;
            if ($isRootDirectory) { // Root level directory, should contain Mod IDs
                $this->ids .= $file . ';';
                $this->both .= $file . '=';
                $this->generateModLists($filePath, false);
                $this->both .= PHP_EOL;
            } else {
                // Nested directory, should contain Workshop Item names
                if (basename($filePath) === 'mods') {
                    foreach (scandir($filePath) as $modFile) {
                        if ($modFile === '.' || $modFile === '..') continue;
                        if (is_dir($filePath . '/' . $modFile)) {
                            $this->mods .= $modFile . ';';
                            $this->both .= $modFile . ';';
                        }
                    }
                } else {
                    $this->generateModLists($filePath, false);
                }
            }
        }
    }

    public function saveToFile(string $directory = __DIR__): void
    {
        file_put_contents($directory . '/Mods.txt', $this->mods);
        file_put_contents($directory . '/WorkshopItems.txt', $this->ids);
        file_put_contents($directory . '/Both.txt', $this->both);
    }

    public function __get(string $name)
    {
        return $this->$name ?? null;
    }

    public function serialize(): string
    {
        return serialize($this->__toArray());
    }

    public function unserialize($data): void
    {
        $array = unserialize($data);
        $this->mods = $array['mods'];
        $this->ids = $array['ids'];
        $this->both = $array['both'];
    }

    public function __toArray(): array
    {
        return [
            'mods' => $this->mods,
            'ids' => $this->ids,
            'both' => $this->both,
        ];
    }

    public function __toString(): string
    {
        return "$this->both";
    }

    public function __debugInfo(): array
    {
        return $this->__toArray();
    }
}