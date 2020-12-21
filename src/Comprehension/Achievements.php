<?php

namespace Comprehension;

class Achievements implements Comprehension
{
    use Insight;

    private array $base;

    /**
     * Achievements constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->base = $this->readJson($path);
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->base;
    }

    /**
     * @param int $gid
     * @return array
     */
    public function getByGid(int $gid): array
    {
        $current = [];

        foreach ($this->base as $key => $value)
        {
            if ($value['gid'] === $gid) {
                $current = $value;
                break;
            }
        }

        return $current;
    }
}