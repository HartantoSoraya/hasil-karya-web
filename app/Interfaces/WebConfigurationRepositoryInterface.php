<?php

namespace App\Interfaces;

interface webConfigurationRepositoryInterface
{
    public function getWebConfigurationById(string $id);

    public function updateWebConfiguration(array $data);
}
