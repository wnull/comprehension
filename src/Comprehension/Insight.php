<?php

namespace Comprehension;

trait Insight
{
    /**
     * @param string $file
     * @param bool $assoc
     * @return array
     */
    protected function readJson(string $file, bool $assoc = true): array
    {
        return json_decode(file_get_contents($file), $assoc);
    }
}