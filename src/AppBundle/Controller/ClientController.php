<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Client;

class ClientController extends FOSRestController
{
    /**
     * @Rest\Get("/client/list")
     */
    public function getAllAction()
    {
      $restresult = $this->getDoctrine()->getRepository('AppBundle:Client')->findAll();
        if (empty($restresult)) {
          return new View("pas de client(s)", Response::HTTP_NOT_FOUND);
     }else
        return $restresult;
    }


        /**
         * @Rest\Get("/client/{id}")
         */
        public function getOneAction($id)
        {
          $singleresult = $this->getDoctrine()->getRepository('AppBundle:Client')->findOneById($id);
          if (empty($singleresult)) {
          return new View("client non trouvé", Response::HTTP_NOT_FOUND);
          }
          else  return $singleresult;
        }




           /**
           * @Rest\Post("/client/new")
           */

          public function newAction(Request $request)
          { 

          $em = $this->getDoctrine()->getManager();
          $data = new Client();
          $nom = $request->get('nom');
          $prenom = $request->get('prenom');
          $sexe = $request->get('sexe');
          $telephone = $request->get('telephone');
          $email = $request->get('email');
          $adresse = $request->get('adresse');

          $profession = $request->get('profession');
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
          /*$bassin = $request->get('bassin');*/


          if (empty(empty($nom) || empty($prenom)|| empty($sexe)||empty($telephone))) {
            return new View("Valeur null non autorisée", Response::HTTP_NOT_ACCEPTABLE); 
          } else{

            
                try {

                $data->setNom($nom);
                $data->setPrenom($prenom);
                $data->setSexe($sexe);

                $data->setAdresse($adresse);
                $data->setTelephone($telephone);
                $data->setEmail($email);

                $data->setProfession($profession);
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

                $em->persist($data);
                $em->flush();
                return new View("Enregistrement ok", Response::HTTP_OK);
              }catch (Exception $exception) {
                return new View("Echec de la requête", Response::HTTP_BAD_REQUEST);
              }
                          
          }

          
         
          }




            /**
           * @Rest\Put("/{id}/personnel/client")
           */

          public function updateInfoPersonnelAction(Request $request)
          { 
            $_client = $this->getDoctrine()->getRepository('AppBundle:Client')->findOneById($request->getId());
            try {
            
          if (empty($_client)) {
            return new View("client non trouvé", Response::HTTP_NOT_FOUND);
          } else{
            $_client->setNom($request->get('nom'));
            $_client->setPrenom( $request->get('prenom'));
            $_client->setSexe( $request->get('sexe'));
            $_client->setTelephone( $request->get('telephone'));

            $_client->setAdresse( $request->get('adresse'));
            $_client->setEmail( $request->get('email'));
            $_client->setProfession( $request->get('profession'));


            $this->getDoctrine()->getManager()->flush();
            return new View("Mise à jour effectuée", Response::HTTP_OK);

          }
            }catch (Exception $exception) {
              $_client  = NULL;
            }
          
         
          }



        /**
      * @Rest\Delete("/client/{id}")
      */
    public function deleteAction($id)
    {
        
      $em = $this->getDoctrine()->getManager();
        $client = $this->getDoctrine()->getRepository('AppBundle:Client')->find($id);
      if (empty($client)) {
        return new View("client not found", Response::HTTP_NOT_FOUND);
      }
      else {
        $em->remove($client);
        $em->flush();
      }
        return new View("supprimé avec succès", Response::HTTP_OK);
      }
}
