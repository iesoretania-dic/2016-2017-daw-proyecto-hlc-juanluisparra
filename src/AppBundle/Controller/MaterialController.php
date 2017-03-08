<?php
namespace AppBundle\Controller;

use AppBundle\Form\Type\LocalType;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\local;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MaterialController extends Controller
{
    /**
     * @Route("/material/local/{id}", name="listar_materiales")
     */
    public function indexAction(local $id)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $materiales = $em->createQueryBuilder()
            ->select('m')
            ->from('AppBundle:material','m')
            ->where('m.locales = :idlocal')
            ->setParameter('idlocal',$id)
            ->orderBy('m.fechaAlta','DESC')
            ->getQuery()
            ->getResult();
        return $this->render('material/listar.html.twig', [
            'materiales' => $materiales
        ]);
    }

}