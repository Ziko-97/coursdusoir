<?php
 namespace  App\Entity;
 class ProfesseurSearch{
     /**
      * @var string|null
      */
     private $nomProf;
     /**
      * @var string|null
      */
     private $prenomProf;
     /**
      * @var string|null
      */
     private $module;

     /**
      * @return string|null
      */
     public function getNomProf(): ?string
     {
         return $this->nomProf;
     }

     /**
      * @param string|null $nomProf
      */
     public function setNomProf(?string $nomProf): void
     {
         $this->nomProf = $nomProf;
     }

     /**
      * @return string|null
      */
     public function getPrenomProf(): ?string
     {
         return $this->prenomProf;
     }

     /**
      * @param string|null $prenomProf
      */
     public function setPrenomProf(?string $prenomProf): void
     {
         $this->prenomProf = $prenomProf;
     }

     /**
      * @return string|null
      */
     public function getModule(): ?string
     {
         return $this->module;
     }

     /**
      * @param string|null $module
      */
     public function setModule(?string $module): void
     {
         $this->module = $module;
     }

 }