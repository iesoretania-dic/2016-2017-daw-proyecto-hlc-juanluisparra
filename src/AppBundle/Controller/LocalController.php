<?php
namespace AppBundle\Controller;

use AppBundle\Entity\local;
use AppBundle\Form\Type\LocalType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    /**
     *  @Route("/locales/nuevo", name="nuevo_local")
     * @Route("/locales/modificar/{id}", name="modificar_local")
     */
    public function modificarAction(Request $request,local $local= null)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null==$local){
            $local = new local();
            $em->persist($local);
        }
        $form =$this->createForm(LocalType::class, $local);

        $form ->handleRequest($request);
        if($form -> isSubmitted() && $form->isValid()){
            try{
                $em->flush();
                $this->addFlash('estado','Cambios guardados');
                return $this->redirectToRoute('listar_locales');
            }
            catch (Exception $e){
                $this->addFlash('error','mal');
            }

        }
        return $this->render('local/form.html.twig', [
            'local' => $local,
            'formulario'=>$form->createView()
        ]);
    }
    /**
     * @Route("/local/confirmar/{id}", name="borrar_local",methods={"GET"})
     */
    public function borrarAction(local $local)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        return $this->render('local/borrar.html.twig', [
            'local' => $local
        ]);
    }
    /**
     * @Route("/local/eliminar/{id}", name="confirmar_borrar_local",methods={"POST"})
     */
    public function borrardeverdadAction(local $local)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        try {
            foreach ($local->getResusuario() as $usuarios){
                $em->remove($usuarios);
            }
            foreach ($local->getMateriales() as $materiales){
                $em->remove($materiales);
            }
            $em->remove($local);
            $em->flush();
            $this->addFlash('estado', 'eliminado con exito');
        }

        catch (Exception $e){
            $this->addFlash('error','no se ha podido eliminar');
        }

        return $this->redirectToRoute('listar_locales');
    }
}