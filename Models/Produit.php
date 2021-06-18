<?PHP
	class Produit{
		private $id_produit = null;
		private $produit = null;
		private $prix = null;
		private $images = null;
		private $quantite = null;

		
		
	 function __construct( string $produit,  int $prix, string $images, int $quantite){
			
			$this->produit=$produit;
			$this->prix=$prix;
			$this->image=$image;
			$this->quantite=$quantite;
	
		}
		
        function getId(): int{
			return $this->$id_produit;
		}
	 function getproduit(): string{
			return $this->produit;
		}
		 function getprix(): int{
			return $this->prix;
		}	
		 function getimages(): string{
			return $this->images;
		}
		 function getquantite(): int{
			return $this->quantite;
		}


		function setnom(string $produit): void{
			$this->produit=$produit;
		}
		 function setprix( int $prix): void{
			$this->prix=$prix;
		}
		 function setimages(string $images): void{
			$this->images=$images;
		}
		 function setquantite(int $quantite): void{
			$this->quantite=$quantite;
        }
    }
	
	
?>