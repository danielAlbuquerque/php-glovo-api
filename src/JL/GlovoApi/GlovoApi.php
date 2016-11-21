<?php

namespace JL\GlovoApi;

use JL\GlovoApi\Managers\SessionManager;
use JL\GlovoApi\Managers\CustomersManager;
use JL\GlovoApi\Managers\OrdersManager;

class GlovoApi
{
    const ENVIRONMENT_STAGE  = 1;
    const ENVIRONMENT_PRODUCTION = 2;

    private $environment;
    private $clientId;
    private $clientSecret;
    private $authToken;

    private $sessionManager;
    private $customersManager;
    private $ordersManager;

    public function __construct($clientId,
                                $clientSecret,
                                $environment = self::ENVIRONMENT_STAGE,
                                $sessionManager = null,
                                $customersManager = null,
                                $ordersManager = null)
    {
        $this->environment = $environment;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->authToken = null;

        $this->sessionManager = (is_null($sessionManager)) ? new SessionManager() : $sessionManager;
        $this->customersManager = (is_null($customersManager)) ? new CustomersManager() : $customersManager;
        $this->ordersManager = (is_null($ordersManager)) ? new OrdersManager() : $ordersManager;
    }

    public function environment()
    {
        return $this->environment;
    }

    public function clientId()
    {
        return $this->clientId;
    }

    public function clientSecret()
    {
        return $this->clientSecret;
    }

    public function authToken()
    {
        return $this->authToken;
    }
}