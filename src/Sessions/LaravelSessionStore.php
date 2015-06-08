<?php

namespace DraperStudio\Flash\Sessions;

use DraperStudio\Flash\Contracts\SessionStore;
use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore
{
    /**
     * @var Store
     */
    private $session;

    /**
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data)
    {
        $this->session->push($name, $data);
    }
}
