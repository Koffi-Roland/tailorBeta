<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Commande;
use AppBundle\Entity\Client;


class CommandeController extends FOSRestController
{
    /**
     * @Rest\Get("/commande/list")
     */
    public function getAllAction()
    {
      $restresult = $this->getDoctrine()->getRepository('AppBundle:Commande')->findAll();
        if (empty($restresult)) {
          return new View("pas de commande(s)", Response::HTTP_NOT_FOUND);
     }else
        return $restresult;
    }


        /**
         * @Rest\Get("/commande/{id}")
         */
        public function getOneAction($id)
        {
          $singleresult = $this->getDoctrine()->getRepository('AppBundle:Commande')->findOneById($id);
          if (empty($singleresult)) {
          return new View("commande non trouvé", Response::HTTP_NOT_FOUND);
          }
          else  return $singleresult;
        }




           /**
           * @Rest\Post("/commande/new")
           */

          public function newAction(Request $request)
          { 

          $em = $this->getDoctrine()->getManager();
         
          $data = new Commande();
          $etatPayement = $request->get('etatPayement');
          $montant = $request->get('montant');
          $client = $request->get('client');
         
          
          if (empty(empty($montant) || empty($client))) {
            return new View("Valeur null non autorisée", Response::HTTP_NOT_ACCEPTABLE); 
          } else{
            $_client = $this->getDoctrine()->getRepository('AppBundle:Client')->findOneById($client);

              if(!empty($_client)){
                try {

                $data->setMontant($montant);
                $data->setEtatPayement(false);
                $data->setEtatCommande(false);
                $data->setClient($client);
                $em->persist($data);
                $em->flush();
                return new View("Enregistrement ok", Response::HTTP_OK);
              }catch (Exception $exception) {
                return new View("Echec de la requête", Response::HTTP_BAD_REQUEST);
              }
              }else{
                return new View("client non trouvé", Response::HTTP_NOT_FOUND);

              }
            
          }
         
          }




            /**
           * @Rest\Put("/{id}/commande")
           */

          public function updateAction(Request $request)
          { 

            $_commande = $this->getDoctrine()->getRepository('AppBundle:Commande')->findOneById($request->getId());
            try {
            
          if (empty($_commande)) {
            return new View("commande non trouvé", Response::HTTP_NOT_FOUND);
          } else{
            $_commande->setMontant($request->get('montant'));
            $_commande->setEtatPayement( $request->get('etatPayement'));
            $_commande->setEtatCommande( $request->get('etatCommande'));
            $_commande->setClient( $request->get('client'));
            $this->getDoctrine()->getManager()->flush();
            return new View("Mise à jour effectuée", Response::HTTP_OK);

          }
            }catch (Exception $exception) {
              $_paiement  = NULL;
            }
         
          }



        /**
      * @Rest\Delete("/commande/{id}")
      */
    public function deleteAction($id)
    {
        
      $em = $this->getDoctrine()->getManager();
        $commande = $this->getDoctrine()->getRepository('AppBundle:Commande')->find($id);
      if (empty($commande)) {
        return new View("commande not found", Response::HTTP_NOT_FOUND);
      }
      else {
        $em->remove($commande);
        $em->flush();
      }
        return new View("supprimé avec succès", Response::HTTP_OK);
      }
}
