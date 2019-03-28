<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Paiement;

class PaiementController extends FOSRestController
{
    /**
     * @Rest\Get("/paiement/list")
     */
    public function getAllAction()
    {
      $restresult = $this->getDoctrine()->getRepository('AppBundle:Paiement')->findAll();
        if (empty($restresult)) {
          return new View("pas de paiement(s)", Response::HTTP_NOT_FOUND);
     }else
        return $restresult;
    }


        /**
         * @Rest\Get("/paiement/{id}")
         */
        public function getOneAction($id)
        {
          $singleresult = $this->getDoctrine()->getRepository('AppBundle:Paiement')->findOneById($id);
          if (empty($singleresult)) {
          return new View("paiement non trouvé", Response::HTTP_NOT_FOUND);
          }
          else  return $singleresult;
        }




           /**
           * @Rest\Post("/paiement/new")
           */

          public function newAction(Request $request)
          { 

          $em = $this->getDoctrine()->getManager();
          $data = new Paiement();
          $montant = $request->get('montant');
          $commande = $request->get('commande');
          if (empty(empty($montant) || empty($commande))) {
            return new View("Valeur null non autorisée", Response::HTTP_NOT_ACCEPTABLE); 
          } else{
            $_commande = $this->getDoctrine()->getRepository('AppBundle:Commande')->findOneById($commande);

              if(!empty($_commande)){
                try {

                $data->setMontant($montant);
                $data->setCommande($commande);
                $em->persist($data);
                $em->flush();
                return new View("Enregistrement ok", Response::HTTP_OK);
              }catch (Exception $exception) {
                return new View("Echec de la requête", Response::HTTP_BAD_REQUEST);
              }
              }else{
                return new View("Commande non trouvé", Response::HTTP_NOT_FOUND);

              }
            
          }
         
          }




            /**
           * @Rest\Put("/{id}/paiement")
           */

          public function updateAction(Request $request)
          { 

            $_paiement = $this->getDoctrine()->getRepository('AppBundle:Paiement')->findOneById($request->getId());
            try {
            
          if (empty($_paiement)) {
            return new View("paiment non trouvé", Response::HTTP_NOT_FOUND);
          } else{
            $_paiement->setMontant($request->get('montant'));
            $_paiement->setCommande( $request->get('commande'));
            $this->getDoctrine()->getManager()->flush();
            return new View("Mise à jour effectuée", Response::HTTP_OK);

          }
            }catch (Exception $exception) {
              $_paiement  = NULL;
            }
         
          }



        /**
      * @Rest\Delete("/paiement/{id}")
      */
    public function deleteAction($id)
    {
       
        $em = $this->getDoctrine()->getManager();
        $paiement = $this->getDoctrine()->getRepository('AppBundle:Paiement')->find($id);
      if (empty($paiement)) {
        return new View("Paiement not found", Response::HTTP_NOT_FOUND);
      }
      else {
        $em->remove($paiement);
        $em->flush();
      }
        return new View("supprimé avec succès", Response::HTTP_OK);
      }
}
