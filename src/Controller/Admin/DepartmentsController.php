<?php


namespace App\Controller\Admin;

use App\Entity\Department;
use App\Entity\DepartmentCourses;
use App\Form\AddDepartmentFormType;
use App\Repository\CourseRepository;
use App\Repository\DepartmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DepartmentsController
 * @package App\Controller\Admin
 * @Route("admin/departments/", path="app.admin.departments.")
 */
class DepartmentsController extends AbstractController
{
    private $_courseRepository;
    private $_departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository, CourseRepository $courseRepository)
    {
        $this->_departmentRepository = $departmentRepository;
        $this->_courseRepository = $courseRepository;
    }

    /**
     * @Route ("", path="index")
     * @return Response
     */
    public function index()
    {
        $pageTitle = "List of Departments";

        $departments = $this->_departmentRepository->findAll();

        return $this->render('admin/departments/index.html.twig', [
            'pageTitle'     => $pageTitle,
            'departments'   => $departments
        ]);
    }

    /**
     * @Route ("new", path="new")
     * @return Response
     */
    public function new()
    {
        /*$form = $this->createForm(AddDepartmentFormType::class);
        $department = new Department();

        $form->setData($department);*/

        $pageTitle = "Add A New Department";

        return $this->render('admin/departments/new.html.twig', [
            //'form'      => $form,
            'pageTitle' => $pageTitle
        ]);
    }

    /**
     * @Route("create", path="create", methods={"POST"})
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $formData = [
            'code'          => $request->get('department_code'),
            'name'          => $request->get('department_name'),
            'description'   => $request->get('department_description')
        ];

        $department = new Department();
        $department->setCode($formData['code']);
        $department->setName($formData['name']);
        $department->setDescription($formData['description']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($department);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_departments_index');
    }

    /**
     * @Route ("edit/{id}", path="edit")
     * @param int $id
     * @return RedirectResponse|Response
     */
    public function edit(int $id)
    {
        $department = $this->_departmentRepository->find($id);

        if($department == null) {
            return $this->redirectToRoute('app_admin_departments_index');
        }

        $pageTitle = "Edit Department: {$department->getName()}";

        return $this->render('admin/departments/edit.html.twig', [
            'department'    => $department,
            'pageTitle'     => $pageTitle
        ]);
    }

    /**
     * @Route("update/{id}", path="update", methods={"POST"})
     * @param int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(int $id, Request $request)
    {
        $department = $this->_departmentRepository->find($id);

        if($department == null) {
            return $this->redirectToRoute('app_admin_departments_index');
        }

        $formData = [
            'code'          => $request->get('department_code'),
            'name'          => $request->get('department_name'),
            'description'   => $request->get('department_description')
        ];

        $department->setCode($formData['code']);
        $department->setName($formData['name']);
        $department->setDescription($formData['description']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($department);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_departments_index');
    }

    /**
     * @Route ("delete/{id}", path="delete")
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id)
    {
        $department = $this->_departmentRepository->find($id);

        if($department == null) {
            return $this->redirectToRoute('app_admin_departments_index');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($department);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_departments_index');
    }

    /**
     * @Route ("add-course/{departmentId}", path="add-course", methods={"GET"})
     * @param int $departmentId
     * @return RedirectResponse|Response
     */
    public function addCourse(int $departmentId)
    {
        $department = $this->_departmentRepository->find($departmentId);

        if($department == null) {
            return $this->redirectToRoute('app_admin_departments_index');
        }

        $courses = $this->_courseRepository->findAll();

        $pageTitle = "Add Course to Department: {$department->getName()}";

        return $this->render('admin/departments/addCourse.html.twig', [
            'pageTitle'     => $pageTitle,
            'courses'       => $courses,
            'department'    => $department
        ]);
    }

    /**
     * @Route ("do-add-course/{departmentId}", path="do-add-course", methods={"POST"})
     * @param int $departmentId
     * @param Request $request
     * @return RedirectResponse
     */
    public function doAddCourseAction(int $departmentId, Request $request)
    {
        $department = $this->_departmentRepository->find($departmentId);

        if($department == null) {
            return $this->redirectToRoute('app_admin_departments_index');
        }

        $courseId = $request->get('select_course');

        $course = $this->_courseRepository->find($courseId);

        if($course == null) {
            return $this->redirectToRoute('app_admin_departments_index');
        }

        $departmentCourses = new DepartmentCourses();
        $departmentCourses->setDepartment($department)
            ->setCourse($course);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($departmentCourses);
        $entityManager->flush();

        $this->addFlash(
            'success',
            "Course added to {$department->getName()} department successfully..."
        );

        return $this->redirectToRoute('app_admin_departments_index');
    }
}