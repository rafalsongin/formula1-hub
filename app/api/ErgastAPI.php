<?php
class ErgastAPI
{
    private string $baseUrl = 'https://ergast.com/api/f1';
    private string $year = '2023';

    public function getDrivers()
    {
        $url = $this->baseUrl . '/' . $this->year . '/1' . '/drivers.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $filteredDrivers = array_filter($data['MRData']['DriverTable']['Drivers'], function ($driver) {
            $lastName = strtolower($driver['familyName']);
            return $lastName !== 'de vries' && $lastName !== 'lawson';
        });

        return array_values($filteredDrivers);
    }

    public function getRaces()
    {
        $year = "2023";
        $url = $this->baseUrl . '/' . $year . '.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['MRData']['RaceTable']['Races'];
    }

    public function getConstructors()
    {
        $year = "2023";
        $url = $this->baseUrl . '/' . $year . '/constructors.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['MRData']['ConstructorTable']['Constructors'];
    }

    public function getDriverStandings()
    {
        $year = "2023";
        $url = $this->baseUrl . '/' . $year . '/driverStandings.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['MRData']['StandingsTable']['StandingsLists'][0]['DriverStandings'];
    }

    public function getConstructorStandings()
    {
        $year = "2023";
        $url = $this->baseUrl . '/' . $year . '/constructorStandings.json';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['MRData']['StandingsTable']['StandingsLists'][0]['ConstructorStandings'];
    }
}
