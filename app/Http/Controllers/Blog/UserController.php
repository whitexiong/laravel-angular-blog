<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(\UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = $this->userRepository->all();
        return $user;
    }
}