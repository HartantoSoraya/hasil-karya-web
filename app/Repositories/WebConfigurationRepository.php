<?php

namespace App\Repositories;

use App\Interfaces\WebConfigurationRepositoryInterface;
use App\Models\WebConfiguration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WebConfigurationRepository implements WebConfigurationRepositoryInterface
{
    public function getWebConfigurationById(string $id)
    {
        return WebConfiguration::findOrFail($id);
    }

    public function updateWebConfiguration(array $data)
    {
        DB::beginTransaction();

        try {
            $webConfiguration = WebConfiguration::first();
            $webConfiguration->title = $data['title'];
            $webConfiguration->description = $data['description'];
            $webConfiguration->logo = $this->updateLogo($webConfiguration->logo, $data['logo']);
            $webConfiguration->save();

            return $webConfiguration;

            DB::commit();

            return $webConfiguration;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    private function updateLogo($oldLogo, $newLogo)
    {
        if ($oldLogo) {
            Storage::disk('public')->delete($oldLogo);
        }

        return $newLogo->store('assets/web-configurations', 'public');
    }
}
