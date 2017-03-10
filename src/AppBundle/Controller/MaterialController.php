<?php
namespace AppBundle\Controller;

use AppBundle\Entity\material;
use AppBundle\Form\Type\MaterialType;
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

    /**
     * @Route("/materiales/nuevo", name="nuevo_material")
     * @Route("/materiales/modificar/{id}", name="modificar_material")
     */
    public function modificarAction(Request $request,material $material= null)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        if(null==$material){
            $material = new material();
            $em->persist($material);
        }
        $form =$this->createForm(MaterialType::class, $material);

        $form ->handleRequest($request);
        if($form -> isSubmitted() && $form->isValid()){
            try{
                $em->flush();
                $this->addFlash('estado','Cambios guardados');
                return $this->redirectToRoute('listar_materiales',['id'=>$material->getLocales()->getId()]);
            }
            catch (Exception $e){
                $this->addFlash('error','mal');
            }

        }
        return $this->render('material/form.html.twig', [
            'material' => $material,
            'formulario'=>$form->createView()
        ]);
    }
    /**
     * @Route("/material/confirmar/{id}", name="borrar_material",methods={"GET"})
     */
    public function borrarAction(material $material)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        return $this->render('material/borrar.html.twig', [
            'material' => $material
        ]);
    }
    /**
     * @Route("/material/eliminar/{id}", name="confirmar_borrar_material",methods={"POST"})
     */
    public function borrardeverdadAction(material $material)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        try {

            $em->remove($material);
            $em->flush();
            $this->addFlash('estado', 'eliminado con exito');
        }

        catch (Exception $e){
            $this->addFlash('error','no se ha podido eliminar');
        }

        return $this->redirectToRoute('listar_materiales',['id'=>$material->getLocales()->getId()]);
    }
}