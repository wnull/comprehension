<?php

namespace Comprehension;

interface Comprehension
{
    public function getAll(): array;

    /**
     * @param int $gid
     * @return array
     */
    public function getByGid(int $gid): array;
}