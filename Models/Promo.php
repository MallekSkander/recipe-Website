<?PHP
	class Promotion{
		private $id = null;
		private $id_produit = null;
		private $pourcentage = null;
		private $nv_prix = null;

	
		
		
	 function __construct( int $id_produit,  int $pourcentage, int $nv_prix){
			
			$this->id_produit=$id_produit;
			$this->pourcentage=$pourcentage;
			$this->nv_prix=$nv_prix;
	
	
		}
		
        function getId(): int{
			return $this->id;
		}
	 function getid_produit(): int{
			return $this->id_produit;
		}
		 function getpourcentage(): int{
			return $this->pourcentage;
		}	

		 function getnv_prix(): int{
			return $this->nv_prix;
		}

	

		 function setid_produit(int $id_produit): void{
			$this->id_produit=$id_produit;
		}
		 function setpourcentage( int $pourcentage): void{
			$this->pourcentage=$pourcentage;
		}

		 function setnv_prix(int $nv_prix): void{
			$this->nv_prix=$nv_prix;
		}

		}
	
?>