<?php

namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientRepository implements ClientRepositoryInterface
{
    public function getAllclients()
    {
        $clients = Client::orderBy('name', 'asc')->get();

        return $clients;
    }

    public function getClientById(string $id)
    {
        return Client::findOrFail($id);
    }

    public function createClient(array $data)
    {
        DB::beginTransaction();

        try {
            $client = new Client();
            $client->name = $data['name'];
            $client->logo = $data['logo'] ? $data['logo']->store('assets/clients', 'public') : '';
            $client->url = $data['url'];
            $client->save();

            DB::commit();

            return $client;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateClient(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $client = Client::find($id);

            $client->name = $data['name'];
            if ($data['logo']) {
                $client->logo = $this->updateLogo($client->logo, $data['logo']);
            }
            $client->url = $data['url'];
            $client->save();

            DB::commit();

            return $client;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteClient(string $id)
    {
        DB::beginTransaction();

        try {
            Client::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    private function updateLogo($oldImage, $newImage): string
    {
        if ($oldImage) {
            Storage::delete($oldImage);
        }

        if ($newImage) {
            return $newImage->store('assets/clients', 'public');
        }

        return '';
    }
}
