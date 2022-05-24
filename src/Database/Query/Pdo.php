<?php

declare(strict_types=1);

namespace Kay4yk\LaravelClickHouse\Database\Query;

class Pdo
{
    /**
     * @param mixed $binding
     *
     * @return mixed
     */
    public function quote($binding)
    {
        return $binding;
    }
}
