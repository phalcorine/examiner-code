<?php


namespace App\Controller\Admin;


use App\Entity\Course;
use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CourseController
 * @package App\Controller\Admin
 * @Route ("admin/courses/", path="app.admin.courses.")
 */
class CoursesController extends AbstractController
{
    private $_courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->_courseRepository = $courseRepository;
    }

    /**
     * @Route("", path="index")
     * @return Response
     */
    public function index()
    {
        $pageTitle = "List of Courses";

        $courses = $this->_courseRepository->findAll();

        return $this->render('admin/courses/index.html.twig', [
            'pageTitle'     => $pageTitle,
            'courses'       => $courses
        ]);
    }

    /**
     * @Route ("details/{id}", path="details")
     * @param int $id
     * @return Response
     */
    public function details(int $id)
    {
        $course = $this->_courseRepository->find($id);

        if($course == null) {
            return $this->redirectToRoute('app_admin_courses_index');
        }

        $pageTitle = "Course Details: {$course->getTitle()}";

        return $this->render('admin/courses/details.html.twig', [
            'pageTitle'     => $pageTitle,
            'course'        => $course
        ]);
    }

    /**
     * @Route ("new", path="new")
     * @return Response
     */
    public function new()
    {
        $pageTitle = "Add A New Course";

        return $this->render('admin/courses/new.html.twig', [
            'pageTitle'     => $pageTitle,
        ]);
    }

    /**
     * @Route("create", path="create")
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $formData = [
            'code'              => $request->get('course_code'),
            'title'             => $request->get('course_title'),
            'description'       => $request->get('course_description')
        ];

        $course = new Course();
        $course->setCode($formData['code']);
        $course->setTitle($formData['title']);
        $course->setDescription($formData['description']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($course);
        $entityManager->flush();

        $this->addFlash(
            'success',
            'Course added successfully...'
        );

        return $this->redirectToRoute('app_admin_courses_index');
    }

    /**
     * @Route ("edit/{id}", path="edit")
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function edit(int $id)
    {
        $course = $this->_courseRepository->find($id);

        if($course == null) {
            return $this->redirectToRoute('app_admin_courses_index');
        }

        $pageTitle = "Edit Course: {$course->getTitle()}";

        return $this->render('admin/courses/edit.html.twig', [
            'course'    => $course,
            'pageTitle'     => $pageTitle
        ]);
    }

    /**
     * @Route("update/{id}", path="update")
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(int $id, Request $request)
    {
        $course = $this->_courseRepository->find($id);

        if($course == null) {
            return $this->redirectToRoute('app_admin_courses_index');
        }

        $formData = [
            'code'          => $request->get('course_code'),
            'title'         => $request->get('course_title'),
            'description'   => $request->get('course_description')
        ];

        $course->setCode($formData['code']);
        $course->setTitle($formData['title']);
        $course->setDescription($formData['description']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($course);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_courses_index');
    }

    /**
     * @Route ("delete/{id}", path="delete")
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        $course = $this->_courseRepository->find($id);

        if($course == null) {
            return $this->redirectToRoute('app_admin_courses_index');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($course);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_courses_index');
    }

}