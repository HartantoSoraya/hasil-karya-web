<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactRepository implements ContactRepositoryInterface
{
    public function getAllContact()
    {
        return Contact::all();
    }

    public function getContactById(string $id)
    {
        return Contact::findOrFail($id);
    }

    public function createContact(array $data)
    {
        DB::beginTransaction();

        try {
            $contact = Contact::create($data);

            DB::commit();

            return $contact;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateContact(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $contact = Contact::findOrFail($id);

            $contact->update($data);

            DB::commit();

            return $contact;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteContact(string $id)
    {
        DB::beginTransaction();

        try {
            Contact::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
