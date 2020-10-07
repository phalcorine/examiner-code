<?php


namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SessionController
 * @package App\Controller\Admin
 * @Route("admin/session/", path="app.admin.")
 */
class SessionController extends AbstractController
{
    /**
     * @Route ("", path="index")
     */
    public function index()
    {
        return $this->redirectToRoute('app_admin_session_login');
    }

    /**
     * @Route ("login", path="login")
     */
    public function login()
    {
        $pageTitle = "Login to the Admin Area";

        return $this->render('admin/session/login.html.twig', [
            'pageTitle'     => $pageTitle
        ]);
    }
}