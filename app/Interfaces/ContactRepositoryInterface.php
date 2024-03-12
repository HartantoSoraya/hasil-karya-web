<?php

namespace App\Interfaces;

interface ContactRepositoryInterface
{
    public function getAllContact();

    public function getContactById(string $id);

    public function createContact(array $data);

    public function updateContact(array $data, string $id);

    public function deleteContact(string $id);
}
