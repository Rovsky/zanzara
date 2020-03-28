<?php

declare(strict_types=1);

namespace Zanzara;

use JsonMapper;

/**
 * @see JsonMapper is used for deserialization.
 *
 */
class ZanzaraMapper
{

    /**
     * @var JsonMapper
     */
    private $jsonMapper;

    /**
     *
     */
    public function __construct()
    {
        $this->jsonMapper = new JsonMapper();
    }

    /**
     * @ T
     * @param string $json
     * @param $class
     * @return mixed
     * @throws \JsonMapper_Exception
     */
    public function map(string $json, $class)
    {
        $decoded = json_decode($json);
        return $this->jsonMapper->map($decoded, new $class);
    }

    /**
     * @param string $json
     * @param $class
     * @return array
     * @throws \JsonMapper_Exception
     */
    public function mapAll(string $json, $class): array
    {
        $decoded = json_decode($json);
        return $this->jsonMapper->mapArray($decoded, [], $class);
    }

}
