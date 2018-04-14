<?php
/**
 * Created by PhpStorm.
 * User: Zalkin
 * Date: 14.04.2018
 * Time: 17:55
 */

function FindNeighbour($idUser)
{
    $getAllUsers = "SELECT idUser FROM User GROUP BY idUser";
    $maxResult = -1;
    $bestNeighbours = array();
    while ($allUsers = mysqli_fetch_row(mysqli_query($getAllUsers)))
    {
        if ($allUsers != $idUser)
        {
            if (Compare($idUser, $allUsers) > $maxResult)
            {
                array_push($bestNeighbours, $idUser);
            }
        }
    }

    return array_reverse($bestNeighbours);
}

function Compare($currUser, $neighbour)
{
    $getCurrCharacteristic  = "SELECT idPersonality, value FROM Personality  WHERE idUser == $currUser ORDER BY idPersonality";
    $currCharacteristic = mysqli_fetch_row(mysqli_query(($getCurrCharacteristic)));
    $getNeighbourCharacteristic = "SELECT idPersonality, value FROM Personality  WHERE idUser == $neighbour ORDER BY idPersonality";
    $neighbourCharacteristic = mysqli_fetch_row(mysqli_query(($getNeighbourCharacteristic)));

    $result = 0;
    $characteristicCount = count($currCharacteristic);
    for ($iChar = 0; $iChar < range($characteristicCount); $iChar++)
    {
        $begin = -1;
        $end = -1;
        $currentValues = GetIntValues($currCharacteristic[1]);
        $neighbourValues = GetIntValues($neighbourCharacteristic[1]);

        if ($currentValues[0] > $neighbourValues[0])
        {
            $begin = $currentValues[0];
        }
        else
        {
            $begin = $neighbourValues[0];
        }

        if ($currentValues[1] > $neighbourValues[1])
        {
            $end = $neighbourValues[1];
        }
        else
        {
            $end = $currentValues[1];
        }
        $result += $end - $begin;
    }

    return $result;
}

function GetIntValues($value)
{
    $values = explode("-", $value);
    $intValues = array((int)$values[0],(int)$values[1]);
    return $intValues;
}
?>