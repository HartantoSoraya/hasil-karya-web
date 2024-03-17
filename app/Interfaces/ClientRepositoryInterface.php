<?php

namespace App\Interfaces;

interface clientRepositoryInterface
{
    public function getAllClients();

    public function getclientById(string $id);

    public function createclient(array $data);

    public function updateclient(array $data, string $id);

    public function deleteclient(string $id);
}
