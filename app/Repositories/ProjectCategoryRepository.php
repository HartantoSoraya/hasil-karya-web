<?php

namespace App\Repositories;

use App\Interfaces\ProjectCategoryRepositoryInterface;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;

class ProjectCategoryRepository implements ProjectCategoryRepositoryInterface
{
    public function getAllProjectCategory()
    {
        return ProjectCategory::orderBy('name', 'asc')->get();
    }

    public function getProjectCategoryById(string $id)
    {
        return ProjectCategory::findOrFail($id);
    }

    public function createProjectCategory(array $data)
    {
        DB::beginTransaction();

        try {
            $projectCategory = ProjectCategory::create($data);

            DB::commit();

            return $projectCategory;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateProjectCategory(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $projectCategory = ProjectCategory::findOrFail($id);

            $projectCategory->update($data);

            DB::commit();

            return $projectCategory;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteProjectCategory(string $id)
    {
        DB::beginTransaction();

        try {
            ProjectCategory::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
