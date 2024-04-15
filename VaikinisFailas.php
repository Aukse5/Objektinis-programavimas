<?php
class Histograma extends Skaiciavimai
{
    public $histograma;
    public function __construct()
    {
        $this->histograma = array();
    }
    public function Histograma($pradzia, $pabaiga)
    {
        for ($i = $pradzia; $i <= $pabaiga; $i++) 
		{
            $iteracijos = $this->Iteracijos1($i);
            if (!isset($this->histograma[$iteracijos])) 
			{
                $this->histograma[$iteracijos] = 1;
            } 
			else 
			{
                $this->histograma[$iteracijos]++;
            }
        }

        return $this->histograma;
    }

    private function Iteracijos1($sk)
    {
        $iteracijos = 0;
        while ($sk > 1) 
		{
            if ($sk % 2 == 0) 
			{
                $sk = $sk / 2;
            } 
			else 
			{
                $sk = $sk * 3 + 1;
            }
            $iteracijos++;
        }
        return $iteracijos;
    }

    public function Rezultatai()
    {
        foreach ($this->histograma as $iteracija => $daznis) 
		{
            echo "Iteracija: $iteracija ; Dažnis: $daznis <br>";
        }
    }
}
?>
