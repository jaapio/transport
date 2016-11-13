<?php declare(strict_types=1);

namespace ApiClients\Foundation\Transport\CommandBus\Handler;

use ApiClients\Foundation\Transport\Client;
use ApiClients\Foundation\Transport\CommandBus\Command\RequestCommandInterface;
use ApiClients\Foundation\Transport\StreamingResponse;
use Psr\Http\Message\ResponseInterface;
use React\Promise\PromiseInterface;
use function React\Promise\resolve;

final class StreamingRequestHandler
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function handle(RequestCommandInterface $command): PromiseInterface
    {
        return $this->client->request(
            $command->getRequest(),
            $command->getOptions()
        )->then(function (ResponseInterface $response) {
            return resolve(new StreamingResponse($response));
        });
    }
}
