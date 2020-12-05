<?php

function convert($roman)
{
	switch ($roman) {
		case 'I':
			return 1;
			break;
		case 'V':
			return 5;
			break;
		case 'X':
			return 10;
			break;
		case 'L':
			return 50;
			break;
		case 'C':
			return 100;
			break;
		case 'D':
			return 500;
			break;
		case 'M':
			return 1000;
			break;
		default:
			return -1;
			break;

	}
}

function romanToDecimal(&$str)
{
	$res = 0;
	for ($i = 0; $i < strlen($str); $i++)
	{
		$s1 = convert($str[$i]);
		if ($i+1 < strlen($str))
		{
			$s2 = convert($str[$i + 1]);
			if ($s1 >= $s2)
			{
				$res = $res + $s1;
			}
			else
			{
				$res = $res + $s2 - $s1;
				$i++;
			}
		}
		else
		{
			$res = $res + $s1;
			$i++;
		}
	}
	return $res;
}


$fragment = array('LXXXIV: HPR', 'LVIII: HUQ', 'XXXII: YYS', 'XLVIII: NXT', 'LXXVI: GTM', 'XVI: FUP', 'XXII: MOG', 'LII: WXZ', 'LI: KMI', 'XXVIII: RGU', 'LXVIII: WLD', 'LXVI: HQQ', 'XXXVI: DZU', 'LIX: SFZ', 'LXXX: GTD', 'LXI: LOA', 'XCV: OOI', 'XLVII: KUC', 'XCII: UWR', 'LX: HVR', 'XLVI: QPG', 'LXVII: CQH', 'XLIX: HWE', 'XCVII: YOY', 'LXII: MPN', 'XXXIV: BDJ', 'LIV: OKS', 'XC: CCQ', 'LXIII: HDR', 'XCVIII: DKT', 'LXXXI: ZBE', 'LXIV: VAQ', 'XIV: MWT', 'XII: ZAE', 'XCIX: VRM', 'XXIV: CNX', 'LXX: SAU', 'LXXV: MZP', 'LVI: WAT', 'L: SFM', 'III: TSF', 'LXXIX: PRZ', 'XI: MXV', 'XXXI: NEB', 'LXV: POR', 'XXIX: TFS', 'XIX: PYL', 'XVII: CVN', 'XCIV: LXP', 'XXX: PRI', 'X: TED', 'VIII: TYN', 'LXXXVI: WQG', 'XXI: SAB', 'XLV: MNO', 'XLIV: XTF', 'I: OGP', 'XCVI: VEV', 'LXXXVIII: PWL', 'LXXIV: DDJ', 'IV: VUJ', 'XXV: LKN', 'XXXVII: YKU', 'XLIII: RBL', 'XL: UHH', 'LXXXIII: TOL', 'XXXVIII: EGM', 'XLII: DQH', 'XXXV: AQX', 'LV: PJT', 'LXXI: RWF', 'LXXXVII: DMI', 'LXIX: AVJ', 'VII: GGH', 'II: TRU', 'XCI: EWC', 'XXXIX: ERF', 'XX: NQL', 'XVIII: BPC', 'LXXIII: ISW', 'XXXIII: JRO', 'XV: CKI', 'XXVI: KFS', 'XLI: XDF', 'LXXXIX: QIL', 'XXVII: ZNN', 'LXXXII: RCY', 'VI: POC', 'XCIII: MQD', 'XIII: TZE', 'V: SPZ', 'LXXII: RNN', 'LXXVII: PRR', 'LIII: EWO', 'LXXXV: WCV', 'LXXVIII: ZKI', 'IX: XYU', 'LVII: RKH', 'XXIII: LSR');

$key = array();

for($i=0;$i<99;$i++){
	$x=romanToDecimal(strtok($fragment[$i], ':'), "\n");
	$y=stristr($fragment[$i], " ");
	$key[$x] = trim($y);
};


ksort($key);

echo "Key:";
foreach($key as $dc => $frg) {
  echo $frg;
}

?>
