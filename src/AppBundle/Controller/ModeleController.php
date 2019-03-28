<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Modele;

class ModeleController extends FOSRestController
{
    /**
     * @Rest\Get("/modele/list")
     */
    public function getAllAction()
    {
      $restresult = $this->getDoctrine()->getRepository('AppBundle:Modele')->findAll();
        if (empty($restresult)) {
          return new View("pas de modele(s)", Response::HTTP_NOT_FOUND);
     }else
        return $restresult;
    }


        /**
         * @Rest\Get("/modele/{id}")
         */
        public function getOneAction($id)
        {
          $singleresult = $this->getDoctrine()->getRepository('AppBundle:Modele')->findOneById($id);
          if (empty($singleresult)) {
          return new View("modele non trouvé", Response::HTTP_NOT_FOUND);
          }
          else  return $singleresult;
        }




           /**
           * @Rest\Post("/modele/new")
           */

          public function newAction(Request $request)
          { 

          $em = $this->getDoctrine()->getManager();
          $data = new Modele();
          $libelle = $request->get('libelle');
          $image = $request->get('image');
          $description = $request->get('description');
          if (empty(empty($libelle) || empty($image)|| empty($description)||empty($typeModele))) {
            return new View("Valeur null non autorisée", Response::HTTP_NOT_ACCEPTABLE); 
          } else{
            $_typemodele = $this->getDoctrine()->getRepository('AppBundle:TypeModele')->findOneById($typeModele);

              if(!empty($_typemodele)){
                try {

                $data->setLibelle($libelle);
                $data->setImage($image);
                $data->setDescription($description);
                $em->persist($data);
                $em->flush();
                return new View("Enregistrement ok", Response::HTTP_OK);
              }catch (Exception $exception) {
                return new View("Echec de la requête", Response::HTTP_BAD_REQUEST);
              }
              }else{
                return new View("type modele non trouvé", Response::HTTP_NOT_FOUND);

              }
            
          }
         
          }




            /**
           * @Rest\Put("/{id}/modele")
           */

          public function updateAction(Request $request)
          { 

            $_modele = $this->getDoctrine()->getRepository('AppBundle:Paiement')->findOneById($request->getId());
            try {
            
          if (empty($_modele)) {
            return new View("paiment non trouvé", Response::HTTP_NOT_FOUND);
          } else{
            $_modele->setLibelle($request->get('libelle'));
            $_modele->setImage( $request->get('image'));
            $_modele->setDescription( $request->get('description'));
            $_modele->setTypeModele( $request->get('typeModele'));
            $this->getDoctrine()->getManager()->flush();
            return new View("Mise à jour effectuée", Response::HTTP_OK);

          }
            }catch (Exception $exception) {
              $_modele  = NULL;
            }
          
         
          }



        /**
      * @Rest\Delete("/modele/{id}")
      */
    public function deleteAction($id)
    {
       
        $em = $this->getDoctrine()->getManager();
        $modele = $this->getDoctrine()->getRepository('AppBundle:Modele')->find($id);
      if (empty($modele)) {
        return new View("modele not found", Response::HTTP_NOT_FOUND);
      }
      else {
        $em->remove($modele);
        $em->flush();
      }
        return new View("supprimé avec succès", Response::HTTP_OK);
      }
}
