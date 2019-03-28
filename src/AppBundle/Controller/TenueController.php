<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Tenue;

class TenueController extends FOSRestController
{
    /**
     * @Rest\Get("/tenue/list")
     */
    public function getAllAction()
    {
      $restresult = $this->getDoctrine()->getRepository('AppBundle:Tenue')->findAll();
        if (empty($restresult)) {
          return new View("pas de tenue(s)", Response::HTTP_NOT_FOUND);
     }else
        return $restresult;
    }


        /**
         * @Rest\Get("/tenue/{id}")
         */
        public function getOneAction($id)
        {
          $singleresult = $this->getDoctrine()->getRepository('AppBundle:Tenue')->findOneById($id);
          if (empty($singleresult)) {
          return new View("tenue non trouvé", Response::HTTP_NOT_FOUND);
          }
          else  return $singleresult;
        }




           /**
           * @Rest\Post("/tenue/new")
           */

          public function newAction(Request $request)
          { 

          $em = $this->getDoctrine()->getManager();
         
          $data = new Tenue();
          $prix = $request->get('prix');
          $photoPagne = $request->get('photoPagne');
          $dimension = $request->get('dimension');
          $detail = $request->get('detail');
          $dateReelLivraison = $request->get('dateReelLivraison');
          $dateFin = $request->get('dateFin');

          $dateLivraison = $request->get('dateLivraison');
          $commande = $request->get('commande');
          $modele = $request->get('modele');

          
          $epaule = $request->get('epaule');
          $lManche = $request->get('lManche');
          $tManche = $request->get('tManche');

          $lChemise = $request->get('lChemise');
          $tPoitrine = $request->get('tPoitrine');
          $ceinture = $request->get('ceinture');
          $bassin = $request->get('bassin');


          $lPatalon = $request->get('lPatalon');
          $tCheville = $request->get('tCheville');
          $encolure = $request->get('encolure');
          
          if (empty(empty($photoPagne) || empty($prix)||empty($dimension) || empty($detail)||empty($modele) || empty($commande))) {
            return new View("Valeur null non autorisée", Response::HTTP_NOT_ACCEPTABLE); 
          } else{
            $_modele = $this->getDoctrine()->getRepository('AppBundle:Modele')->findOneById($modele);
            $_commande = $this->getDoctrine()->getRepository('AppBundle:Commande')->findOneById($commande);

              if(!empty($_client)||!empty($_commande)){
                try {


                  $data->setDateFin($dateFin);
                  $data->setDateLivraison($dateLivraison);
                  $data->setDateReelLivraison($dateReelLivraison);

                  $data->setDimension($dimension);
                  $data->setDetail($detail);
                  $data->setPhotoPagne($photoPagne);
                  $data->setPrix($prix);
                  $data->setBassin($bassin);
                  $data->setCeinture($ceinture);
  
                  $data->setCuisse($cuisse);
                  $data->setEpaule($epaule);
                  $data->setEncolure($encolure);
  
                  $data->setLChemise($lChemise);
                  $data->setLManche($lManche);
                  $data->setLPatalon($lPatalon);
  
                  $data->setTCheville($tCheville);
                  $data->setTManche($tManche);
                  $data->setTPoitrine($tPoitrine);

                  $data->setCommande($commande);
                  $data->setModele($modele);
  
                $em->persist($data);
                $em->flush();
                return new View("Enregistrement ok", Response::HTTP_OK);
              }catch (Exception $exception) {
                return new View("Echec de la requête", Response::HTTP_BAD_REQUEST);
              }
              }else{
                return new View("commande ou modele non trouvé", Response::HTTP_NOT_FOUND);

              }
            
          }
         
         
          }




            /**
           * @Rest\Put("/{id}/info/tenue")
           */

          public function updateInfoTenueAction(Request $request)
          { 
            $prix = $request->get('prix');
            $photoPagne = $request->get('photoPagne');
            $dimension = $request->get('dimension');
            $detail = $request->get('detail');
            $dateReelLivraison = $request->get('dateReelLivraison');
            $dateFin = $request->get('dateFin');
  
            $dateLivraison = $request->get('dateLivraison');
            $commande = $request->get('commande');
            $modele = $request->get('modele');
  

            $_tenue = $this->getDoctrine()->getRepository('AppBundle:Tenue')->findOneById($request->getId());
            try {
            
          if (empty($_tenue)) {
            return new View("tenue non trouvé", Response::HTTP_NOT_FOUND);
          } else{
                  $_tenue->setDateFin($dateFin);
                  $_tenue->setDateLivraison($dateLivraison);
                  $_tenue->setDateReelLivraison($dateReelLivraison);

                  $_tenue->setDimension($dimension);
                  $_tenue->setDetail($detail);
                  $_tenue->setPhotoPagne($photoPagne);
                  $_tenue->setPrix($prix);
                  $_tenue->setCommande($commande);
                  $_tenue->setModele($modele);

            $this->getDoctrine()->getManager()->flush();
            return new View("Mise à jour effectuée", Response::HTTP_OK);

          }
            }catch (Exception $exception) {
              $_tenue  = NULL;
            }
          
         
          }



        /**
      * @Rest\Delete("/tenue/{id}")
      */
    public function deleteAction($id)
    {
       
        $em = $this->getDoctrine()->getManager();
        $tenue = $this->getDoctrine()->getRepository('AppBundle:Tenue')->find($id);
      if (empty($tenue)) {
        return new View("tenue not found", Response::HTTP_NOT_FOUND);
      }
      else {
        $em->remove($tenue);
        $em->flush();
      }
        return new View("supprimé avec succès", Response::HTTP_OK);
      }
}
