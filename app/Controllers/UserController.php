<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        // Load the UserModel
        $userModel = new UserModel();

        // Get all user data
        $users = $userModel->findAll();

        // Prepare the data to be passed to the view
        $data = [
            'title' => 'Data-User',
            'active' => 'users',
            'users' => $users  // Pass all user data to the view
        ];

        // Load the view with the data
        return view('pages/admin/data-user/index', $data);
    }
}
