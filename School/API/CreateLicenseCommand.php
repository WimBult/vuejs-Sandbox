<?php

namespace KeyVue\Application\Command\License;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateLicenseCommand
{
    /** @var string */
    public $emailDomain;

    /** @var string */
    public $companyId;

    /** @var string */
    public $companyName;

    /** @var string|null */
    public $note;

    /** @var bool */
    public $license;

    /** @var string */
    public  $userId;

    /** @var string */
    public $firstname;

    /** @var string|null */
    public $middlename;

    /** @var string */
    public $lastname;

    /** @var string */
    public $role;

    /** @var string */
    public $gender;

    /** @var string */
    public $email;

    /** @var bool */
    public $active;

    /** @var bool */
    public $superAdmin;
}