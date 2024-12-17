<?php

/*
 * This file is a part of the PZConfigHelper project.
 *
 * Copyright (c) 2024-present Valithor Obsidion <valithor@valzargaming.com>
 */

namespace PZConfigHelper;

interface PZConfigHelperInterface
{
    public function __construct(string $path = __DIR__);
    public function generateModLists(?string $directory = null, bool $isRootDirectory = true): void;
    public function saveToFile(string $directory = __DIR__): void;
};