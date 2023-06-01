<?php

namespace KeyVue\Application\Command\License;


class UpdateLicenseCommand
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string|null */
    public $note;

    /** @var bool */
    public $license;

}