<?php declare(strict_types=1);

namespace ApiClients\Foundation\Transport\CommandBus\Command;

use WyriHaximus\Tactician\CommandHandler\Annotations\Handler;

/**
 * @Handler("ApiClients\Foundation\Transport\CommandBus\Handler\JsonEncodeHandler")
 */
final class JsonEncodeCommand
{
    /**
     * @var array
     */
    private $json;

    /**
     * @param array $json
     */
    public function __construct(array $json)
    {
        $this->json = $json;
    }

    /**
     * @return array
     */
    public function getJson(): array
    {
        return $this->json;
    }
}
