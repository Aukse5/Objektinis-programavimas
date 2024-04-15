<?php
class Skaiciavimai
{
    public $v;
    public $pradzia;
    public $pabaiga;
	public $pirmas;
	public $skirtumas;
	public $nariai;

    public function Skaiciavimas1($v) 
    {
        $iteracijos1 = 0;
        echo "Gautos reikšmės: " . '<br>';
        while($v > 1)
        {
            if($v % 2 == 0)
            {
                $v = $v / 2;
                print $v . '<br>';
                $iteracijos1 = $iteracijos1 + 1;
            }
            else
            {
                $v = $v * 3 + 1;
               print $v . '<br>';
                $iteracijos1 = $iteracijos1 + 1;
            }
        }
        echo "Iteracijų kiekis: " . $iteracijos1 . "<br>";
    }
    public function Skaiciavimai($k, &$iteracijos, &$maks)
    {
		$iteracijos = 0;
        $maks = 0;
        while ($k > 1) 
		{
            if ($k % 2 == 0) 
			{
                $k = $k / 2;
                if ($k > $maks) 
				{
                    $maks = $k;
                }
            } 
			else 
			{
                $k = $k * 3 + 1;
                if ($k > $maks) 
				{
                    $maks = $k;
                }
            }
			$iteracijos = $iteracijos + 1;
        }
    }
    public function Maxi(&$Maxi, &$MaxSkaicius)
	{
		$Maxi = 0;
		$MaxSkaicius = 0;
		for ($i = $this->pradzia; $i <= $this->pabaiga; $i++) 
		{
			$iteracijos = 0;
			$maks = 0;
			$this->Skaiciavimai($i, $iteracijos, $maks);
			$Maxii[$i] = $maks;
			if ($Maxi < $maks) 
			{
				$Maxi = $maks;
				$MaxSkaicius = $i;
			}
		}
		echo "Skaičiai pasiekę didžiausią reikšmę: ";
		for($i = $this->pradzia; $i <= $this->pabaiga; $i++) 
		{ 
			if($Maxi == $Maxii[$i])
			{
				echo "$i ";
			}
		}
		print '<br>';
	}

	public function Iteracijos(&$MinIteracijos, &$MaxIteracijos)
	{
		$MinIteracijos = 999;
		$MaxIteracijos = 0;
		$MinSkaicius = $this->pradzia;
		$MaxSkaicius = $this->pradzia;
		for ($i = $this->pradzia; $i <= $this->pabaiga; $i++) 
		{
			$iteracijos = 0;
			$maks = 0;
			$this->Skaiciavimai($i, $iteracijos, $maks);
			$IteracijuKiekis[$i] = $iteracijos;
			if ($MinIteracijos > $iteracijos) 
			{
				$MinIteracijos = $iteracijos;
				$MinSkaicius = $i;
			}
			if ($MaxIteracijos < $iteracijos) 
			{
				$MaxIteracijos = $iteracijos;
				$MaxSkaicius = $i;
			}
		}
		echo "Skaičiai su daugiausiai iteracijų (" . $MaxIteracijos . "): ";
		for($i = $this->pradzia; $i <= $this->pabaiga; $i++) 
		{ 
			if($MaxIteracijos == $IteracijuKiekis[$i])
			{
				echo "$i ";
			}
		}
		print '<br>';
		echo "Skaičiai su mažiausiai iteracijų (" . $MinIteracijos . "): ";
		for($i = $this->pradzia; $i <= $this->pabaiga; $i++) 
		{ 
			if($MinIteracijos == $IteracijuKiekis[$i])
			{
				echo "$i ";
			}
		}
		print '<br>';
	}
	public function Progresija($pirmas, $skirtumas, $nariai)
	{
		$Nariai=array();
		$suma=0;
		echo " <br> Aritmetines progresijos nariai: <br>";
		for($i = 0; $i < $this->nariai; $i++)
		{
			if($i==0)
			{
				$Nariai[$i]=$this->pirmas;
				$suma=$this->pirmas;
				echo $Nariai[$i];
			}
			else
			{
				$Nariai[$i]=$Nariai[$i-1]+$this->skirtumas;
				$suma=$suma+$Nariai[$i];
				echo $Nariai[$i];
			}
			if($i < $this->nariai-1)
			{
				echo '<br>';
			}
			
		}
		echo "<br> Aritmetines progresijos suma :" .$suma;
		return $Nariai;
	}
}
?>