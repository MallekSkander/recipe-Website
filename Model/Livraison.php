<?PHP
	class Livraison{
		private ?int $id = null;
		private ?string $nom = null;
		private ?string $prenom = null;
		private ?int $num_tel = null;
		private ?string $adresse = null;
		
		function __construct(string $nom, string $prenom, int $num_tel, string $adresse){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->num_tel=$num_tel;
			$this->adresse=$adresse;
		}
		
		function getIdLivraison(): int{
			return $this->id;
		}
		function getNomLivraison(): string{
			return $this->nom;
		}
		function getPrenomLivraison(): string{
			return $this->prenom;
		}
		
		function getNumeroTel(): int{
			return $this->num_tel;
		}
		
		function getAdresseLivraison(): string{
			return $this->adresse;
		}
		

		function setNomLivraison(string $nom): void{
			$this->nom=$nom;
		}
		function setPrenomLivraison(string $prenom): void{
			$this->prenom=$prenom;
		}
		
		function setNumeroTel(int $num_tel): void{
			$this->num_tel=$num_tel;
		}
		
		function setAdresseLivraison(string $adresse): void{
			$this->adresse=$adresse;
		}
	
		
	}
?>