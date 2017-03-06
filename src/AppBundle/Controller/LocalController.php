<?php
namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LocalController extends Controller
{
    /**
     * @Route("/locales", name="listar_locales")
     */
    public function indexAction()
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $locales = $em->createQueryBuilder()
            ->select('l')
            ->from('AppBundle:local','l')
            ->getQuery()
            ->getResult();
        return $this->render('local/listar.html.twig', [
            'locales' => $locales
        ]);
    }
}