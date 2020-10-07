<?php


namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IndexController
 * @package App\Controller\Admin
 * @Route ("admin/home/", path="app.admin.home.")
 */
class HomeController extends AbstractController
{
    /**
     * @Route ("", path="index")
     */
    public function index()
    {

    }
}