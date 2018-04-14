<?php
/**
 * Created by PhpStorm.
 * User: Zalkin
 * Date: 14.04.2018
 * Time: 21:09
 */

function FindNeighbour($idUser)
{
    $getPersonalityTable = "SELECT idUser, idPersonality, value FROM Personality ORDER BY idUser, idPersonality";
    $personalityData = mysqli_fetch_row(mysqli_query($getPersonalityTable));

    $userCharacteristic = array();
    foreach($personalityData as $userRow)
    {
        if ($userRow[0] == $idUser)
        {
            $userCharacteristic[$userRow[1]] = $userRow[2];
        }
    }

    $bestNeighbours = array();
    foreach ($personalityData as $userRow)
    {
        if ($userRow[0] != $idUser)
        {
            $result = Compare($userCharacteristic[$userRow[1]][2], $userRow[2]);
            $bestNeighbours[$result] = $userRow[0];
        }
    }

    return array_slice($bestNeighbours, 0, 10);
}

function Compare($currentChar, $neighbourChar)
{
    $result = 0;
    if (strstr($currentChar,"-"))
    {
        CompareInterval($currentChar, $neighbourChar);
    }
    elseif (is_numeric($currentChar))
    {
        $result += 1;
    }
    elseif ($currentChar == $neighbourChar)
    {
        $result += 1;
    }
    return $result;
}

function CompareInterval($currentChar, $neighbourChar)
{
    $begin = -1;
    $end = -1;

    $currentValues = GetIntValues($currentChar);
    $neighbourValues = GetIntValues($neighbourChar[1]);

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
    $result = ($end - $begin)/($currentValues[0] - $currentValues[1]);
}

function GetIntValues($value)
{
    $values = explode("-", $value);
    $intValues = array();
    for ($i = 0; $i < range(count($values)); $i++)
    {
        array_push($intValues, (int)$values[i]);
    }

    return $intValues;
}
?>