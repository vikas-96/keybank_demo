<?php

namespace App\Services;
use App\Models\MigratingBranch;

class MigratingBranchService
{
	public function __construct(MigratingBranch $migrating_branch)
    {
        $this->migrating_branch = $migrating_branch ;
    }
    public function index($request)
    {
    	$data = $this->migrating_branch;
    	$data = $data->get();
    	return $data;
    }
}