<?php

namespace KeyVue\Application\Controller\User;

use KeyVue\Application\Request\User\ImpersonateUserRequest;
use KeyVue\Application\Response\User\ImpersonateUserResponse;
use KeyVue\Domain\Repository\UserRepositoryInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Events;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationSuccessResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface as ContractsEventDispatcherInterface;

class ImpersonateUserController
{
    /** @var UserRepositoryInterface */
    private $userRepository;

    /** @var JWTTokenManagerInterface */
    private $tokenManager;

    /** @var EventDispatcherInterface  */
    private $dispatcher;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        JWTTokenManagerInterface $tokenManager,
        EventDispatcherInterface $dispatcher
    ) {
        $this->userRepository = $userRepository;
        $this->tokenManager = $tokenManager;
        $this->dispatcher = $dispatcher;
    }

    public function __invoke(ImpersonateUserRequest $data): ImpersonateUserResponse
    {
        $user = $this->userRepository->get($data->userId);
        $token = $this->tokenManager->create($user);

        $response = new JWTAuthenticationSuccessResponse($token);
        $event    = new AuthenticationSuccessEvent(['token' => $token], $user, $response);

        //This event is launched and read so its able to generate a refresh token afterwards.
        //see AuthenticationSuccessEvent.php for documentation on AUTHENTICATION_SUCCESS
        $this->dispatcher->dispatch($event, Events::AUTHENTICATION_SUCCESS);

        $response->setData($event->getData());

        $response = new ImpersonateUserResponse();
        $response->token = $token;

        return $response;
    }
}