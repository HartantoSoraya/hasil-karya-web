<?php

namespace App\Interfaces;

interface customerServiceRepositoryInterface
{
    public function getAllCustomerServices();

    public function getcustomerServiceById(string $id);

    public function createcustomerService(array $data);

    public function updatecustomerService(array $data, string $id);

    public function deletecustomerService(string $id);
}
