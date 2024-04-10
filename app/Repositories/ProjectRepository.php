<?php

namespace App\Repositories;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getAllProjects($categoryId = null)
    {
        $projects = Project::with('categories', 'images');

        if ($categoryId) {
            $projects = $projects->where('category_id', $categoryId);
        }

        return $projects->latest()->get();
    }

    public function getProjectById(string $id)
    {
        return Project::with('categories', 'images')->findOrFail($id);
    }

    public function getProjectBySlug(string $slug)
    {
        return Project::with('categories', 'images')->where('slug', $slug)->first();
    }

    public function getProjectImages(string $projectId = null) {
        $projectImages = ProjectImage::query();

        if ($projectId) {
            $projectImages = $projectImages->where('project_id', $projectId);
        }

        return $projectImages->orderBy('created_at', 'desc')->get();
    }

    public function createProject(array $data)
    {
        DB::beginTransaction();

        try {
            $project = new Project();
            $project->thumbnail = $data['thumbnail']->store('assets/projects/thumbnails', 'public');
            $project->name = $data['name'];
            $project->slug = $data['slug'];
            $project->description = $data['description'];
            $project->client = $data['client'];
            $project->start_date = $data['start_date'];
            $project->end_date = $data['end_date'];
            $project->save();

            if (isset($data['images'])) {
                foreach ($data['images'] as $image) {
                    $projectImage = new ProjectImage();
                    $projectImage->project_id = $project->id;
                    $projectImage->image = $image->store('assets/projects/images', 'public');
                    $projectImage->save();
                }
            }

            $project->categories()->attach($data['categories']);

            DB::commit();

            return $project;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateProject(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $project = Project::findOrFail($id);
            if (isset($data['thumbnail'])) {
                $project->thumbnail = $this->updateThumbnail($project->thumbnail, $data['thumbnail']);
            }
            $project->name = $data['name'];
            $project->slug = $data['slug'];
            $project->description = $data['description'];
            $project->client = $data['client'];
            $project->start_date = $data['start_date'];
            $project->end_date = $data['end_date'];
            $project->save();

            if (isset($data['images'])) {
                $this->deleteImages($project->id);

                foreach ($data['images'] as $image) {
                    $projectImage = new ProjectImage();
                    $projectImage->project_id = $project->id;
                    $projectImage->image = $image->store('assets/projects/images', 'public');
                    $projectImage->save();
                }
            }

            $project->categories()->sync($data['categories']);

            DB::commit();

            return $project;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteProject(string $id)
    {
        DB::beginTransaction();

        try {
            Project::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateThumbnail(string $oldThumbnail, $newThumbnail)
    {
        if ($oldThumbnail) {
            Storage::disk('public')->delete($oldThumbnail);
        }

        return $newThumbnail->store('assets/projects/thumbnails', 'public');
    }

    public function deleteImages(string $projectId)
    {
        $projectImages = ProjectImage::where('project_id', $projectId)->get();

        foreach ($projectImages as $image) {
            Storage::disk('public')->delete($image->image);
            ProjectImage::find($image->id)->delete();
        }
    }
}
