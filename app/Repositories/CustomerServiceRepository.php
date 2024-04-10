<?php

namespace App\Repositories;

use App\Interfaces\CustomerServiceRepositoryInterface;
use App\Models\CustomerService;
use Illuminate\Support\Facades\DB;

class CustomerServiceRepository implements CustomerServiceRepositoryInterface
{
    public function getAllcustomerServices()
    {
        return CustomerService::all();
    }

    public function getCustomerServiceById(string $id)
    {
        return CustomerService::findOrFail($id);
    }

    public function createCustomerService(array $data)
    {
        DB::beginTransaction();

        try {
            $customerService = CustomerService::create($data);

            DB::commit();

            return $customerService;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function updateCustomerService(array $data, string $id)
    {
        DB::beginTransaction();

        try {
            $customerService = CustomerService::findOrFail($id);

            $customerService->update($data);

            DB::commit();

            return $customerService;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

    public function deleteCustomerService(string $id)
    {
        DB::beginTransaction();

        try {
            CustomerService::findOrFail($id)->delete();

            DB::commit();

            return true;
        } catch (\Exception $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }
}
